<?php

declare(strict_types=1);

namespace App\Emulator\Memory;

use App\Emulator\Core;
use App\Emulator\Helpers;
use App\Emulator\Memory\Traits\HandlesMbc;
use App\Emulator\Memory\Traits\HighLevelAccess;
use App\Emulator\Memory\Traits\LowLevelAccess;
use App\Exports\MemoryExporter;

class Memory
{
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

    /**
     * Number of RAM banks the cartridge supports.
     * Determined by the cartridge header and used to allocate $MBCRam arrays.
     */
    public int $numRAMBanks = 0;

    public function __construct(public readonly Core $core)
    {
        // TODO: We can make this an SplFixedArray once we remove direct access shenanigans.
        $this->memory = Helpers::getPreinitializedArray(0x10000, 0);
    }

    public function VRAMReadGFX(int $address, bool $gbcBank): int
    {
        //Graphics Side Reading The VRAM
        return ($gbcBank) ? $this->VRAM[$address] : $this->memory[0x8000 + $address];
    }

    public function setCurrentMBC1ROMBank(): void
    {
        $romSize = $this->core->cartridge->getRom()->count();

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
