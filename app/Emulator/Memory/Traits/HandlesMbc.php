<?php

declare(strict_types=1);

namespace App\Emulator\Memory\Traits;

/** @mixin \App\Emulator\Memory\Memory */
trait HandlesMbc
{
    /**
     * Indicates the mode of MBC1 bank switching (4/32 RAM mode or 16/8 ROM mode).
     * If true, RAM banking mode is active; if false, ROM banking mode is active.
     */
    public bool $MBC1Mode = false;

    /**
     * Whether external MBC RAM banks are currently enabled for reading/writing.
     * Typically enabled by writing specific values to MBC registers.
     */
    public bool $MBCRAMBanksEnabled = false;

    /**
     * The currently selected MBC RAM bank, allowing access to different external RAM areas.
     * Used in conjunction with $currMBCRAMBankPosition for address calculations.
     */
    public int $currMBCRAMBank = 0;

    /**
     * The current position offset for the selected MBC RAM bank.
     * Computed based on $currMBCRAMBank, used to map logical addresses into the correct RAM bank region.
     */
    public int $currMBCRAMBankPosition = -0xA000;

    /**
     * The current VRAM bank in use (for GBC).
     * GBC can switch between VRAM banks to access extended tile and map data.
     */
    public int $currVRAMBank = 0;

    /**
     * The currently selected GBC WRAM bank.
     * GBC games can switch between different WRAM banks to access more working RAM.
     */
    public int $gbcRamBank = 1;

    /**
     * The offset into GBC WRAM for the currently active WRAM bank.
     * Combined with an address to map into the correct portion of GBCMemory.
     */
    public int $gbcRamBankPosition = -0xD000;

    /**
     * The offset for accessing the ECHO memory region of the currently selected GBC WRAM bank.
     * Echo memory is a mirrored region of WRAM and should be treated accordingly.
     */
    public int $gbcRamBankPositionECHO = -0xF000;

    /**
     * The offset value used for selecting the active ROM bank in MBC1/2/3/5.
     * Combined with $currentROMBank to determine, which 16KB ROM bank is currently in use.
     */
    public int $ROMBank1offs = 0;

    /**
     * The currently selected ROM bank offset (in bytes).
     * This indicates, which part of the cartridge ROM is mapped into 0x4000-0x7FFF.
     */
    public int $currentROMBank = 0;
}
