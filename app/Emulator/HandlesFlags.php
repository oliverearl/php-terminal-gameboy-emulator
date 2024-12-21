<?php

declare(strict_types=1);

namespace App\Emulator;

/** @mixin \App\Emulator\Core */
trait HandlesFlags
{
    /**
     * Indicates if the cartridge uses an MBC1 controller.
     * MBC1 supports switching between multiple ROM and RAM banks.
     */
    private bool $cMBC1 = false;

    /**
     * Indicates if the cartridge uses an MBC2 controller.
     * MBC2 includes its own internal RAM and supports fewer banks than MBC1.
     */
    private bool $cMBC2 = false;

    /**
     * Indicates if the cartridge uses an MBC3 controller.
     * MBC3 supports ROM and RAM banking as well as a built-in RTC (Real-Time Clock).
     */
    private bool $cMBC3 = false;

    /**
     * Indicates if the cartridge uses an MBC5 controller.
     * MBC5 supports larger ROM sizes and more RAM banks than MBC1/MBC3.
     */
    private bool $cMBC5 = false;

    /**
     * Indicates if the cartridge requires battery-backed RAM.
     * This allows saving game progress after the system is turned off.
     */
    private bool $cBATT;

    /**
     * Indicates if the cartridge uses battery-backed SRAM (cSRAM).
     * cSRAM is external RAM that retains data when the system is off, thanks to a battery.
     */
    private bool $cSRAM = false;

    /**
     * Indicates if the cartridge uses the MMM01 memory controller.
     * MMM01 is a less common MBC type supporting multi-cart and some unique banking.
     */
    private bool $cMMMO1 = false;

    /**
     * Indicates if the cartridge uses a rumble feature.
     * MBC5 can be modified to include rumble support, activated by certain RAM writes.
     */
    private bool $cRUMBLE = false;

    /**
     * Indicates if the cartridge is a Game Boy Camera cartridge.
     * The Game Boy Camera includes unique hardware and memory layout.
     */
    private bool $cCamera = false;

    /**
     * Indicates if the cartridge uses TAMA5 memory controller (rare, includes RTC).
     */
    private bool $cTAMA5 = false;

    /**
     * Indicates if the cartridge uses the HuC3 memory controller.
     * HuC3 is found in certain Hudson Soft games with unique features.
     */
    private bool $cHuC3 = false;

    /**
     * Indicates if the cartridge uses the HuC1 memory controller.
     * HuC1 is another Hudson Soft MBC variant.
     */
    public bool $cHuC1 = false;

    /**
     * Return whether the MBC1 controller is being used.
     */
    public function usesMBC1(): bool
    {
        return $this->cMBC1;
    }

    /**
     * Toggle the MBC1 controller.
     */
    public function setMBC1(bool $mbc1): void
    {
        $this->cMBC1 = $mbc1;
    }

    /**
     * Return whether the MBC2 controller is being used.
     */
    public function usesMBC2(): bool
    {
        return $this->cMBC2;
    }

    /**
     * Toggle the MBC2 controller.
     */
    public function setMBC2(bool $mbc2): void
    {
        $this->cMBC2 = $mbc2;
    }

    /**
     * Return whether the MBC3 controller is being used.
     */
    public function usesMBC3(): bool
    {
        return $this->cMBC3;
    }

    /**
     * Toggle the MBC3 controller.
     */
    public function setMBC3(bool $mbc3): void
    {
        $this->cMBC3 = $mbc3;
    }

    /**
     * Return whether the MBC5 controller is being used.
     */
    public function usesMBC5(): bool
    {
        return $this->cMBC5;
    }

    /**
     * Toggle the MBC5 controller.
     */
    public function setMBC5(bool $mbc5): void
    {
        $this->cMBC5 = $mbc5;
    }

    /**
     * Return whether battery-backed RAM is being used.
     */
    public function usesBATT(): bool
    {
        return $this->cBATT;
    }

    /**
     * Toggle whether battery-backed RAM is being used.
     */
    public function setBATT(bool $batt): void
    {
        $this->cBATT = $batt;
    }

    /**
     * Return whether battery-backed SRAM is being used.
     */
    public function usesSRAM(): bool
    {
        return $this->cSRAM;
    }

    /**
     * Toggle whether battery-backed SRAM is being used.
     */
    public function setSRAM(bool $sram): void
    {
        $this->cSRAM = $sram;
    }

    /**
     * Return whether the MMMO1 memory controller is being used.
     */
    public function usesMMMO1(): bool
    {
        return $this->cMMMO1;
    }

    /**
     * Toggle whether the MMMO1 memory controller is being used.
     */
    public function setMMMO1(bool $mmmo1): void
    {
        $this->cMMMO1 = $mmmo1;
    }

    /**
     * Return whether rumble functionality is being used.
     */
    public function usesRumble(): bool
    {
        return $this->cRUMBLE;
    }

    /**
     * Toggle whether rumble functionality is being used.
     */
    public function setRumble(bool $rumble): void
    {
        $this->cRUMBLE = $rumble;
    }

    /**
     * Return whether the Game Boy Camera is currently in use.
     */
    public function usesCamera(): bool
    {
        return $this->cCamera;
    }

    /**
     * Toggle whether the Game Boy Camera is currently in use.
     */
    public function setCamera(bool $camera): void
    {
        $this->cCamera = $camera;
    }

    /**
     * Return whether the rare TAMA5 memory controller is in use.
     */
    public function usesTAMA5(): bool
    {
        return $this->cTAMA5;
    }

    /**
     * Toggle whether the rare TAMA5 memory controller is in use.
     */
    public function setTAMA5(bool $tama5): void
    {
        $this->cTAMA5 = $tama5;
    }

    /**
     * Return whether the HuC3 memory controller is in use.
     */
    public function usesHuC3(): bool
    {
        return $this->cHuC3;
    }

    /**
     * Toggle whether the HuC3 memory controller is in use.
     */
    public function setHuC3(bool $huc3): void
    {
        $this->cHuC3 = $huc3;
    }

    /**
     * Return whether the HuC1 memory controller is in use.
     */
    public function usesHuC1(): bool
    {
        return $this->cHuC1;
    }

    /**
     * Toggle whether the HuC1 memory controller is in use.
     */
    public function setHuC1(bool $huc1): void
    {
        $this->cHuC1 = $huc1;
    }

    // TODO: Add docblock.
    public function MBCRAMUtilized(): bool
    {
        return $this->usesMBC1() || $this->usesMBC2() || $this->usesMBC3() || $this->usesMBC5() || $this->usesRumble();
    }
}
