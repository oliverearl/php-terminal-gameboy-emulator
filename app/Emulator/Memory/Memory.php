<?php

declare(strict_types=1);

namespace App\Emulator\Memory;

use App\Emulator\Core;
use App\Emulator\Helpers;
use App\Exports\MemoryExporter;

class Memory
{
    use HandlesFlags;
    use HandlesMbc;
    use HighLevelAccess;
    use LowLevelAccess;

    /**
     * The main system memory (0x0000-0xFFFF).
     * This array stores all accessible memory bytes not handled by specific MBC logic.
     *
     * @var array<int, null|int>
     */
    public array $memory;

    /**
     * External MBC RAM banks, accessed when the cartridge supports additional RAM.
     * Size and usage depend on the MBC type and the current RAM bank enabled.
     *
     * @var array<int, int>
     */
    public array $MBCRam = [];

    /**
     * Video RAM (VRAM), used to store tile data and background maps.
     * For GBC, this can have multiple banks, indexed by $currVRAMBank.
     *
     * @var array<int, int>
     */
    public array $VRAM = [];

    /**
     * GBC work RAM extension banks beyond the default 8KB WRAM.
     * Bank switching is controlled by $gbcRamBank.
     *
     * @var array<int, int>
     */
    public array $GBCMemory = [];

    /**
     * Maps the header value to the number of RAM banks supported by the cartridge.
     * Used to determine how many banks of external RAM to allocate and manage.
     *
     * @var array<int, int>
     */
    public array $RAMBanks = [0, 1, 2, 4, 16];

    public function __construct(public readonly Core $core)
    {
        // TODO: We can make this an SplFixedArray once we remove direct access shenanigans.
        $this->memory = Helpers::getPreinitializedArray(0x10000, 0);
    }

    public function init(): void
    {
        //Setup the auxilliary/switchable RAM to their maximum possible size (Bad headers can lie).
        if ($this->cMBC2) {
            $this->numRAMBanks = 1 / 16;
        } elseif ($this->cMBC1 || $this->cRUMBLE || $this->cMBC3 || $this->cHuC3) {
            $this->numRAMBanks = 4;
        } elseif ($this->cMBC5) {
            $this->numRAMBanks = 16;
        } elseif ($this->cSRAM) {
            $this->numRAMBanks = 1;
        }

        if ($this->numRAMBanks > 0) {
            if (!$this->core->MBCRAMUtilized()) {
                //For ROM and unknown MBC cartridges using the external RAM:
                $this->MBCRAMBanksEnabled = true;
            }

            //Switched RAM Used
            $this->MBCRam = Helpers::getPreinitializedArray($this->numRAMBanks * 0x2000, 0);
        }

        echo 'Actual bytes of MBC RAM allocated: ' . ($this->numRAMBanks * 0x2000) . PHP_EOL;
        //Setup the RAM for GBC mode.
        if ($this->core->cGBC) {
            $this->VRAM = Helpers::getPreinitializedArray(0x2000, 0);
            $this->GBCMemory = Helpers::getPreinitializedArray(0x7000, 0);
            $this->core->tileCount *= 2;
            $this->core->tileCountInvalidator = $this->core->tileCount * 4;
            $this->core->colorCount = 64;
            $this->core->transparentCutoff = 32;
        }

        $this->core->tileData = Helpers::getPreinitializedArray($this->core->tileCount * $this->core->colorCount, null);
        $this->core->tileReadState = Helpers::getPreinitializedArray($this->core->tileCount, 0);
    }

    public function VRAMReadGFX(int $address, bool $gbcBank): int
    {
        //Graphics Side Reading The VRAM
        return ($gbcBank) ? $this->VRAM[$address] : $this->memory[0x8000 + $address];
    }

    public function setCurrentMBC1ROMBank(): void
    {
        $romSize = $this->cartridge->getRom()->count();

        // Read the cartridge ROM data from RAM memory:
        $this->memory->currentROMBank = match ($this->memory->ROMBank1offs) {
            //Bank calls for 0x00, 0x20, 0x40, and 0x60 are really for 0x01, 0x21, 0x41, and 0x61.
            0x00, 0x20, 0x40, 0x60 => $this->memory->ROMBank1offs * 0x4000,
            default => ($this->memory->ROMBank1offs - 1) * 0x4000,
        };

        while ($this->memory->currentROMBank + 0x4000 >= $romSize) {
            $this->memory->currentROMBank -= $romSize;
        }
    }

    public function setCurrentMBC2AND3ROMBank(): void
    {
        $romSize = $this->core->cartridge->getRom()->count();

        // Read the cartridge ROM data from RAM memory:
        // Only map bank 0 to bank 1 here (MBC2 is like MBC1, but can only do 16 banks, so only the bank 0 quirk appears for MBC2):
        $this->currentROMBank = max($this->ROMBank1offs - 1, 0) * 0x4000;

        while ($this->currentROMBank + 0x4000 >= $romSize) {
            $this->currentROMBank -= $romSize;
        }
    }

    public function setCurrentMBC5ROMBank(): void
    {
        $romSize = $this->core->cartridge->getRom()->count();

        // Read the cartridge ROM data from RAM memory:
        $this->currentROMBank = ($this->ROMBank1offs - 1) * 0x4000;

        while ($this->currentROMBank + 0x4000 >= $romSize) {
            $this->currentROMBank -= $romSize;
        }
    }

    /**
     * Dumps memory to CSV.
     */
    public function dump(?string $filename = null): void
    {
        $exporter = resolve(MemoryExporter::class);
        $exporter->export($this->memory, $filename);
    }
}
