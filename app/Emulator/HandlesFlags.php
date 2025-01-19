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
    private bool $mbc1 = false;

    /**
     * Indicates if the cartridge uses an MBC2 controller.
     * MBC2 includes its own internal RAM and supports fewer banks than MBC1.
     */
    private bool $mbc2 = false;

    /**
     * Indicates if the cartridge uses an MBC3 controller.
     * MBC3 supports ROM and RAM banking as well as a built-in RTC (Real-Time Clock).
     */
    private bool $mbc3 = false;

    /**
     * Indicates if the cartridge uses an MBC5 controller.
     * MBC5 supports larger ROM sizes and more RAM banks than MBC1/MBC3.
     */
    private bool $mbc5 = false;

    /**
     * Indicates if the cartridge requires battery-backed RAM.
     * This allows saving game progress after the system is turned off.
     */
    private bool $battery;

    /**
     * Indicates if the cartridge uses battery-backed SRAM (cSRAM).
     * cSRAM is external RAM that retains data when the system is off, thanks to a battery.
     */
    private bool $sram = false;

    /**
     * Indicates if the cartridge uses the MMM01 memory controller.
     * MMM01 is a less common MBC type supporting multi-cart and some unique banking.
     */
    private bool $mmmo1 = false;

    /**
     * Indicates if the cartridge uses a rumble feature.
     * MBC5 can be modified to include rumble support, activated by certain RAM writes.
     */
    private bool $rumble = false;

    /**
     * Indicates if the cartridge is a Game Boy Camera cartridge.
     * The Game Boy Camera includes unique hardware and memory layout.
     */
    private bool $camera = false;

    /**
     * Indicates if the cartridge uses TAMA5 memory controller (rare, includes RTC).
     */
    private bool $tama5 = false;

    /**
     * Indicates if the cartridge uses the HuC3 memory controller.
     * HuC3 is found in certain Hudson Soft games with unique features.
     */
    private bool $huc3 = false;

    /**
     * Indicates if the cartridge uses the HuC1 memory controller.
     * HuC1 is another Hudson Soft MBC variant.
     */
    public bool $huc1 = false;

    /**
     * Return whether the MBC1 controller is being used.
     */
    public function usesMbc1(): bool
    {
        return $this->mbc1;
    }

    /**
     * Toggle the MBC1 controller.
     */
    public function setMbc1(bool $mbc1): void
    {
        $this->mbc1 = $mbc1;
    }

    /**
     * Return whether the MBC2 controller is being used.
     */
    public function usesMbc2(): bool
    {
        return $this->mbc2;
    }

    /**
     * Toggle the MBC2 controller.
     */
    public function setMbc2(bool $mbc2): void
    {
        $this->mbc2 = $mbc2;
    }

    /**
     * Return whether the MBC3 controller is being used.
     */
    public function usesMbc3(): bool
    {
        return $this->mbc3;
    }

    /**
     * Toggle the MBC3 controller.
     */
    public function setMbc3(bool $mbc3): void
    {
        $this->mbc3 = $mbc3;
    }

    /**
     * Return whether the MBC5 controller is being used.
     */
    public function usesMbc5(): bool
    {
        return $this->mbc5;
    }

    /**
     * Toggle the MBC5 controller.
     */
    public function setMbc5(bool $mbc5): void
    {
        $this->mbc5 = $mbc5;
    }

    /**
     * Return whether battery-backed RAM is being used.
     */
    public function usesBattery(): bool
    {
        return $this->battery;
    }

    /**
     * Toggle whether battery-backed RAM is being used.
     */
    public function setBattery(bool $battery): void
    {
        $this->battery = $battery;
    }

    /**
     * Return whether battery-backed SRAM is being used.
     */
    public function usesSram(): bool
    {
        return $this->sram;
    }

    /**
     * Toggle whether battery-backed SRAM is being used.
     */
    public function setSram(bool $sram): void
    {
        $this->sram = $sram;
    }

    /**
     * Return whether the MMMO1 memory controller is being used.
     */
    public function usesMmmo1(): bool
    {
        return $this->mmmo1;
    }

    /**
     * Toggle whether the MMMO1 memory controller is being used.
     */
    public function setMmmo1(bool $mmmo1): void
    {
        $this->mmmo1 = $mmmo1;
    }

    /**
     * Return whether rumble functionality is being used.
     */
    public function usesRumble(): bool
    {
        return $this->rumble;
    }

    /**
     * Toggle whether rumble functionality is being used.
     */
    public function setRumble(bool $rumble): void
    {
        $this->rumble = $rumble;
    }

    /**
     * Return whether the Game Boy Camera is currently in use.
     */
    public function usesCamera(): bool
    {
        return $this->camera;
    }

    /**
     * Toggle whether the Game Boy Camera is currently in use.
     */
    public function setCamera(bool $camera): void
    {
        $this->camera = $camera;
    }

    /**
     * Return whether the rare TAMA5 memory controller is in use.
     */
    public function usesTama5(): bool
    {
        return $this->tama5;
    }

    /**
     * Toggle whether the rare TAMA5 memory controller is in use.
     */
    public function setTama5(bool $tama5): void
    {
        $this->tama5 = $tama5;
    }

    /**
     * Return whether the HuC3 memory controller is in use.
     */
    public function usesHuc3(): bool
    {
        return $this->huc3;
    }

    /**
     * Toggle whether the HuC3 memory controller is in use.
     */
    public function setHuc3(bool $huc3): void
    {
        $this->huc3 = $huc3;
    }

    /**
     * Return whether the HuC1 memory controller is in use.
     */
    public function usesHuc1(): bool
    {
        return $this->huc1;
    }

    /**
     * Toggle whether the HuC1 memory controller is in use.
     */
    public function setHuc1(bool $huc1): void
    {
        $this->huc1 = $huc1;
    }

    /**
     * Return whether any MBC or rumble functionality is being used.
     */
    public function isMbcRamUtilized(): bool
    {
        return $this->usesMbc1() || $this->usesMbc2() || $this->usesMbc3() || $this->usesMbc5() || $this->usesRumble();
    }
}
