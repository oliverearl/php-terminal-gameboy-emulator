<?php

declare(strict_types=1);

namespace App\Emulator\Cartridge;

use App\Emulator\Core;
use App\Emulator\Debugger\Debugger;
use App\Exceptions\Cartridge\BadCartridgeTypeException;
use App\Exceptions\Cartridge\RomMissingOrBadException;
use SplFixedArray;

class CartridgeLoader
{
    /**
     * ROM banks. 1 Bank = 16 KBytes = 256 Kbits.
     *
     * @var array<int, int>
     */
    private static array $romBanks = [
        2, 4, 8, 16, 32, 64, 128, 256, 512,
    ];

    /**
     * The raw game data in memory.
     */
    private string $raw;

    /**
     * The length of the raw game data.
     */
    private int $rawLength;

    /**
     * Cartridge data unpacked into memory.
     */
    private readonly SplFixedArray $rom;

    /**
     * CartridgeLoader constructor.
     *
     * @param null|string $romPath File path to the ROM file.
     *
     * @throws \App\Exceptions\Cartridge\BadCartridgeTypeException
     * @throws \App\Exceptions\Cartridge\RomMissingOrBadException
     */
    public function __construct(private readonly Core $core, ?string $romPath)
    {
        if (empty($romPath) || ! file_exists($romPath)) {
            throw new RomMissingOrBadException();
        }

        // TODO: Not sure whether this is needed at all.
        self::$romBanks[0x52] = 72;
        self::$romBanks[0x53] = 80;
        self::$romBanks[0x54] = 96;

        $this->raw = file_get_contents($romPath);
        $this->rawLength = strlen($this->raw);
        $this->rom = new SplFixedArray(size: $this->rawLength);
    }

    /**
     * Loads game data from a ROM image into the emulator.
     */
    public function load(): void
    {
        // Load the first two ROM banks (0x0000 - 0x7FFF) into regular Game Boy memory:
        for ($romIndex = 0; $romIndex < $this->rawLength; ++$romIndex) {
            $this->rom[$romIndex] = (ord($this->raw[$romIndex]) & 0xFF);

            if ($romIndex < 0x8000) {
                // Copy into memory:
                $this->core->memory[$romIndex] = $this->rom[$romIndex];
            }
        }

        $this->parseGameMetadata();
        $this->processCartridgeType();
        $this->processRomBanks();
        $this->setGameBoyMode();
        $this->readLicenseCode();

        unset($this->raw, $this->rawLength);
    }

    /**
     * Provide direct access to the ROM image.
     */
    public function getRom(): SplFixedArray
    {
        return $this->rom;
    }

    /**
     * Parses and prints the game name and code.
     */
    private function parseGameMetadata(): void
    {
        $gameName = '';
        $gameCode = '';

        for ($address = 0x134; $address < 0x13F; ++$address) {
            if (ord($this->raw[$address]) > 0) {
                $gameName .= $this->raw[$address];
            }
        }

        for ($address = 0x13F; $address < 0x143; ++$address) {
            if (ord($this->raw[$address]) > 0) {
                $gameCode .= $this->raw[$address];
            }
        }

        Debugger::print("Game Title: {$gameName}[{$gameCode}][{$this->raw[0x143]}]");
        Debugger::print("Game Code: $gameCode");
    }

    /**
     * Processes the cartridge type and processes its features into the emulator.
     * TODO: This modifies a lot of core state. Can we do this a different way?
     *
     * @throws \App\Exceptions\Cartridge\BadCartridgeTypeException
     */
    private function processCartridgeType(): void
    {
        $cartridgeType = $this->rom[0x147];
        Debugger::print("Cartridge type #{$cartridgeType}");

        switch ($cartridgeType) {
            case 0x00:
                // ROM without bank switching.
                if (! $this->core->config->getBoolean('emulation.override_mbc_1')) {
                    $mbcType = 'ROM';
                    break;
                }
                // no break
            case 0x01:
                $this->core->cMBC1 = true;
                $mbcType = 'MBC1';
                break;
            case 0x02:
                $this->core->cMBC1 = true;
                $this->core->cSRAM = true;
                $mbcType = 'MBC1 + SRAM';
                break;
            case 0x03:
                $this->core->cMBC1 = true;
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'MBC1 + SRAM + BATT';
                break;
            case 0x05:
                $this->core->cMBC2 = true;
                $mbcType = 'MBC2';
                break;
            case 0x06:
                $this->core->cMBC2 = true;
                $this->core->cBATT = true;
                $mbcType = 'MBC2 + BATT';
                break;
            case 0x08:
                $this->core->cSRAM = true;
                $mbcType = 'ROM + SRAM';
                break;
            case 0x09:
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'ROM + SRAM + BATT';
                break;
            case 0x0B:
                $this->core->cMMMO1 = true;
                $mbcType = 'MMMO1';
                break;
            case 0x0C:
                $this->core->cMMMO1 = true;
                $this->core->cSRAM = true;
                $mbcType = 'MMMO1 + SRAM';
                break;
            case 0x0D:
                $this->core->cMMMO1 = true;
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'MMMO1 + SRAM + BATT';
                break;
            case 0x0F:
                $this->core->cMBC3 = true;
                $this->core->cTIMER = true;
                $this->core->cBATT = true;
                $mbcType = 'MBC3 + TIMER + BATT';
                break;
            case 0x10:
                $this->core->cMBC3 = true;
                $this->core->cTIMER = true;
                $this->core->cBATT = true;
                $this->core->cSRAM = true;
                $mbcType = 'MBC3 + TIMER + BATT + SRAM';
                break;
            case 0x11:
                $this->core->cMBC3 = true;
                $mbcType = 'MBC3';
                break;
            case 0x12:
                $this->core->cMBC3 = true;
                $this->core->cSRAM = true;
                $mbcType = 'MBC3 + SRAM';
                break;
            case 0x13:
                $this->core->cMBC3 = true;
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'MBC3 + SRAM + BATT';
                break;
            case 0x19:
                $this->core->cMBC5 = true;
                $mbcType = 'MBC5';
                break;
            case 0x1A:
                $this->core->cMBC5 = true;
                $this->core->cSRAM = true;
                $mbcType = 'MBC5 + SRAM';
                break;
            case 0x1B:
                $this->core->cMBC5 = true;
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'MBC5 + SRAM + BATT';
                break;
            case 0x1C:
                $this->core->cRUMBLE = true;
                $mbcType = 'RUMBLE';
                break;
            case 0x1D:
                $this->core->cRUMBLE = true;
                $this->core->cSRAM = true;
                $mbcType = 'RUMBLE + SRAM';
                break;
            case 0x1E:
                $this->core->cRUMBLE = true;
                $this->core->cSRAM = true;
                $this->core->cBATT = true;
                $mbcType = 'RUMBLE + SRAM + BATT';
                break;
            case 0x1F:
                $this->core->cCamera = true;
                $mbcType = 'Game Boy Camera';
                break;
            case 0xFD:
                $this->core->cTAMA5 = true;
                $mbcType = 'TAMA5';
                break;
            case 0xFE:
                $this->core->cHuC3 = true;
                $mbcType = 'HuC3';
                break;
            case 0xFF:
                $this->core->cHuC1 = true;
                $mbcType = 'HuC1';
                break;
            default:
                throw new BadCartridgeTypeException();
        }

        Debugger::print("Cartridge Type: {$mbcType}");
    }

    /**
     * Process ROM/RAM banks.
     */
    private function processRomBanks(): void
    {
        $numberOfRomBanks = self::$romBanks[$this->rom[0x148]];

        Debugger::print("$numberOfRomBanks ROM banks.");
        Debugger::print(match ($this->core->RAMBanks[$this->rom[0x149]]) {
            0 => 'No RAM banking requested for allocation or MBC is of type 2.',
            2 => '1 RAM bank requested for allocation.',
            3 => '4 RAM banks requested for allocation.',
            4 => '16 RAM banks requested for allocation.',
            default => 'RAM bank amount requested is unknown, will use maximum allowed by specified MBC type.',
        });
    }

    /**
     * Sets the emulator's Game Boy mode based on the cartridge type.
     */
    private function setGameBoyMode(): void
    {
        switch ($this->rom[0x143]) {
            case 0x00:
                $this->core->cGBC = false;
                $prompt = 'Only GB mode detected.';
                break;
            case 0x80:
                $this->core->cGBC = ! $this->core->config->getBoolean('emulation.prioritize_gb_mode');
                $prompt = 'GB and GBC mode detected.';
                break;
            case 0xC0:
                $this->core->cGBC = true;
                $prompt = 'Only GBC mode detected.';
                break;
            default:
                $this->core->cGBC = false;
                $prompt = "Unknown Game Boy game type code #{$this->rom[0x143]}, defaulting to GB mode (Old games don't have a type code).";
                break;
        }

        Debugger::print($prompt);
    }

    /**
     * Reads and prints game license.
     */
    private function readLicenseCode(): void
    {
        $oldLicense = $this->rom[0x14B];
        $newLicense = ($this->rom[0x144] & 0xFF00) | ($this->rom[0x145] & 0xFF);

        if ($oldLicense !== 0x33) {
            $prompt = "Old style license code: {$oldLicense}";
        } else {
            $prompt = "New style license code: {$newLicense}";
        }

        Debugger::print($prompt);
    }
}
