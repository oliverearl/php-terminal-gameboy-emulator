<?php

declare(strict_types=1);

namespace App\Emulator\Memory;

/** @mixin \App\Emulator\Memory\Memory */
trait HandlesFlags
{
    /**
     * Indicates if the cartridge uses an MBC1 controller.
     * MBC1 supports switching between multiple ROM and RAM banks.
     */
    public bool $cMBC1 = false;

    /**
     * Indicates if the cartridge uses an MBC2 controller.
     * MBC2 includes its own internal RAM and supports fewer banks than MBC1.
     */
    public bool $cMBC2 = false;

    /**
     * Indicates if the cartridge uses an MBC3 controller.
     * MBC3 supports ROM and RAM banking as well as a built-in RTC (Real-Time Clock).
     */
    public bool $cMBC3 = false;

    /**
     * Indicates if the cartridge uses an MBC5 controller.
     * MBC5 supports larger ROM sizes and more RAM banks than MBC1/MBC3.
     */
    public bool $cMBC5 = false;

    /**
     * Indicates if the cartridge requires battery-backed RAM.
     * This allows saving game progress after the system is turned off.
     */
    public bool $cBATT;

    /**
     * Indicates if the cartridge uses battery-backed SRAM (cSRAM).
     * cSRAM is external RAM that retains data when the system is off, thanks to a battery.
     */
    public bool $cSRAM = false;

    /**
     * Indicates if the cartridge uses the MMM01 memory controller.
     * MMM01 is a less common MBC type supporting multi-cart and some unique banking.
     */
    public bool $cMMMO1 = false;

    /**
     * Indicates if the cartridge uses a rumble feature.
     * MBC5 can be modified to include rumble support, activated by certain RAM writes.
     */
    public bool $cRUMBLE = false;

    /**
     * Indicates if the cartridge is a Game Boy Camera cartridge.
     * The Game Boy Camera includes unique hardware and memory layout.
     */
    public bool $cCamera = false;

    /**
     * Indicates if the cartridge uses TAMA5 memory controller (rare, includes RTC).
     */
    public bool $cTAMA5 = false;

    /**
     * Indicates if the cartridge uses the HuC3 memory controller.
     * HuC3 is found in certain Hudson Soft games with unique features.
     */
    public bool $cHuC3 = false;

    /**
     * Indicates if the cartridge uses the HuC1 memory controller.
     * HuC1 is another Hudson Soft MBC variant.
     */
    public bool $cHuC1 = false;

    /**
     * Number of RAM banks the cartridge supports.
     * Determined by the cartridge header and used to allocate $MBCRam arrays.
     */
    public int $numRAMBanks = 0;
}
