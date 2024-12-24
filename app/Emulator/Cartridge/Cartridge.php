<?php

declare(strict_types=1);

namespace App\Emulator\Cartridge;

use App\Emulator\Core;
use App\Emulator\Debugger\Debugger;
use App\Exceptions\Cartridge\BadCartridgeTypeException;
use App\Exceptions\Cartridge\RomMissingOrBadException;
use SplFixedArray;

class Cartridge
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
     * Cartridge constructor.
     *
     * @param null|string $romPath File path to the ROM file.
     */
    public function __construct(private readonly Core $core, ?string $romPath)
    {
        $this->init($romPath);
    }

    /**
     * Initializes the cartridge.
     *
     * @throws \App\Exceptions\Cartridge\BadCartridgeTypeException
     * @throws \App\Exceptions\Cartridge\RomMissingOrBadException
     */
    public function init(?string $romPath): void
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
     *
     * @return array<string, bool|array<string, bool|string>>
     */
    public function load(): array
    {
        // Load the first two ROM banks (0x0000 - 0x7FFF) into regular Game Boy memory:
        for ($romIndex = 0; $romIndex < $this->rawLength; ++$romIndex) {
            $this->rom[$romIndex] = (ord($this->raw[$romIndex]) & 0xFF);

            if ($romIndex < 0x8000) {
                // Copy into memory:
                $this->core->memory->memory[$romIndex] = $this->rom[$romIndex];
            }
        }

        $this->parseGameMetadata();
        $this->processRomBanks();
        $this->readLicenseCode();

        unset($this->raw, $this->rawLength);

        return array_merge(
            $this->processCartridgeType(),
            ['mode' => $this->detectGameBoyMode()],
        );
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
     *
     * @return array<string, bool>
     */
    private function processCartridgeType(): array
    {
        $cartridgeType = $this->rom[0x147];
        Debugger::print("Cartridge type #{$cartridgeType}");

        // TODO: Refactor to object.
        $data = [
            'type' => $cartridgeType,
            'mbc_type' => null,
            'mbc1' => false,
            'mbc2' => false,
            'mbc3' => false,
            'mbc5' => false,
            'mmmo1' => false,
            'rumble' => false,
            'camera' => false,
            'tama5' => false,
            'huc3' => false,
            'huc1' => false,
            'sram' => false,
            'batt' => false,
            'timer' => false,
        ];

        switch ($cartridgeType) {
            case 0x00:
                // ROM without bank switching.
                if (! $this->core->config->getBoolean('emulation.override_mbc_1')) {
                    $data['mbc_type'] = 'ROM';
                    break;
                }
                // no break
            case 0x01:
                $data['mbc1'] = true;
                $data['mbc_type'] = 'MBC1';
                break;
            case 0x02:
                $data['mbc1'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'MBC1 + SRAM';
                break;
            case 0x03:
                $data['mbc1'] = true;
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MBC1 + SRAM + BATT';
                break;
            case 0x05:
                $data['mbc2'] = true;
                $data['mbc_type'] = 'MBC2';
                break;
            case 0x06:
                $data['mbc2'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MBC2 + BATT';
                break;
            case 0x08:
                $data['sram'] = true;
                $data['mbc_type'] = 'ROM + SRAM';
                break;
            case 0x09:
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'ROM + SRAM + BATT';
                break;
            case 0x0B:
                $data['mmmo1'] = true;
                $data['mbc_type'] = 'MMMO1';
                break;
            case 0x0C:
                $data['mmmo1'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'MMMO1 + SRAM';
                break;
            case 0x0D:
                $data['mmmo1'] = true;
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MMMO1 + SRAM + BATT';
                break;
            case 0x0F:
                $data['mbc3'] = true;
                $data['timer'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MBC3 + TIMER + BATT';
                break;
            case 0x10:
                $data['mbc3'] = true;
                $data['type'] = true;
                $data['batt'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'MBC3 + TIMER + BATT + SRAM';
                break;
            case 0x11:
                $data['mbc3'] = true;
                $data['mbc_type'] = 'MBC3';
                break;
            case 0x12:
                $data['mbc3'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'MBC3 + SRAM';
                break;
            case 0x13:
                $data['mbc3'] = true;
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MBC3 + SRAM + BATT';
                break;
            case 0x19:
                $data['mbc5'] = true;
                $data['mbc_type'] = 'MBC5';
                break;
            case 0x1A:
                $data['mbc5'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'MBC5 + SRAM';
                break;
            case 0x1B:
                $data['mbc5'] = true;
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'MBC5 + SRAM + BATT';
                break;
            case 0x1C:
                $data['rumble'] = true;
                $data['mbc_type'] = 'RUMBLE';
                break;
            case 0x1D:
                $data['rumble'] = true;
                $data['sram'] = true;
                $data['mbc_type'] = 'RUMBLE + SRAM';
                break;
            case 0x1E:
                $data['rumble'] = true;
                $data['sram'] = true;
                $data['batt'] = true;
                $data['mbc_type'] = 'RUMBLE + SRAM + BATT';
                break;
            case 0x1F:
                $data['camera'] = true;
                $data['mbc_type'] = 'Game Boy Camera';
                break;
            case 0xFD:
                $data['tama5'] = true;
                $data['mbc_type'] = 'TAMA5';
                break;
            case 0xFE:
                $data['huc3'] = true;
                $data['mbc_type'] = 'HuC3';
                break;
            case 0xFF:
                $data['huc1'] = true;
                $data['mbc_type'] = 'HuC1';
                break;
            default:
                throw new BadCartridgeTypeException();
        }

        Debugger::print("Cartridge Type: {$data['mbc_type']}");

        return $data;
    }

    /**
     * Process ROM/RAM banks.
     */
    private function processRomBanks(): void
    {
        $numberOfRomBanks = self::$romBanks[$this->rom[0x148]];

        Debugger::print("{$numberOfRomBanks} ROM banks.");
        Debugger::print(match ($this->core->memory->RAMBanks[$this->rom[0x149]]) {
            0 => 'No RAM banking requested for allocation or MBC is of type 2.',
            2 => '1 RAM bank requested for allocation.',
            3 => '4 RAM banks requested for allocation.',
            4 => '16 RAM banks requested for allocation.',
            default => 'RAM bank amount requested is unknown, will use maximum allowed by specified MBC type.',
        });
    }

    /**
     * Determines the emulator's Game Boy mode based on the cartridge type.
     */
    private function detectGameBoyMode(): bool
    {
        $isGameBoyColor = false;

        switch ($this->rom[0x143]) {
            case 0x00:
                $prompt = 'Only GB mode detected.';
                break;
            case 0x80:
                $isGameBoyColor = ! $this->core->config->getBoolean('emulation.prioritize_gb_mode');
                $prompt = 'GB and GBC mode detected.';
                break;
            case 0xC0:
                $isGameBoyColor = true;
                $prompt = 'Only GBC mode detected.';
                break;
            default:
                $prompt = "Unknown Game Boy game type code #{$this->rom[0x143]}, defaulting to GB mode (Old games don't have a type code).";
                break;
        }

        Debugger::print($prompt);

        return $isGameBoyColor;
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
