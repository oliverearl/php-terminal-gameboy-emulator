<?php

declare(strict_types=1);

namespace App\Emulator\Memory;

use App\Emulator\Helpers;

/** @mixin \App\Emulator\Memory\Memory */
trait HighLevelAccess
{
    public function readMemory(int $address): ?int
    {
        if ($address < 0x4000) {
            return $this->peekMemory($address);
        } elseif ($address < 0x8000) {
            return $this->core->cartridge->getRom()[$this->currentROMBank + $address];
        } elseif ($address >= 0x8000 && $address < 0xA000) {
            if ($this->core->cGBC) {
                //CPU Side Reading The VRAM (Optimized for GameBoy Color)
                return ($this->core->lcd->modeSTAT > 2) ? 0xFF : (($this->currVRAMBank === 0) ? $this->memory[$address] : $this->VRAM[$address - 0x8000]);
            }

            //CPU Side Reading The VRAM (Optimized for classic GameBoy)
            return ($this->core->lcd->modeSTAT > 2) ? 0xFF : $this->memory[$address];
        } elseif ($address >= 0xA000 && $address < 0xC000) {
            if (($this->numRAMBanks === 1 / 16 && $address < 0xA200) || $this->numRAMBanks >= 1) {
                $overrideMbc = $this->core->config->getBoolean('advanced.performance.emulation.override_mbc');

                if (!$this->cMBC3) {
                    //memoryReadMBC
                    //Switchable RAM
                    if ($this->MBCRAMBanksEnabled || $overrideMbc) {
                        return $this->MBCRam[$address + $this->currMBCRAMBankPosition];
                    }

                    //cout("Reading from disabled RAM.", 1);
                    return 0xFF;
                } else {
                    //MBC3 RTC + RAM:
                    //memoryReadMBC3
                    //Switchable RAM
                    if ($this->MBCRAMBanksEnabled || $overrideMbc) {
                        switch ($this->currMBCRAMBank) {
                            case 0x00:
                            case 0x01:
                            case 0x02:
                            case 0x03:
                                return $this->MBCRam[$address + $this->currMBCRAMBankPosition];
                            case 0x08:
                                return $this->core->latchedSeconds;
                            case 0x09:
                                return $this->core->latchedMinutes;
                            case 0x0A:
                                return $this->core->latchedHours;
                            case 0x0B:
                                return $this->core->latchedLDays;
                            case 0x0C:
                                return ((($this->core->RTCDayOverFlow) ? 0x80 : 0) + (($this->core->RTCHALT) ? 0x40 : 0)) + $this->core->latchedHDays;
                        }
                    }

                    //cout("Reading from invalid or disabled RAM.", 1);
                    return 0xFF;
                }
            } else {
                return 0xFF;
            }
        } elseif ($address >= 0xC000 && $address < 0xE000) {
            if (!$this->core->cGBC || $address < 0xD000) {
                return $this->memory[$address];
            } else {
                //memoryReadGBCMemory
                return $this->GBCMemory[$address + $this->gbcRamBankPosition];
            }
        } elseif ($address >= 0xE000 && $address < 0xFE00) {
            if (!$this->core->cGBC || $address < 0xF000) {
                //memoryReadECHONormal
                return $this->memory[$address - 0x2000];
            } else {
                //memoryReadECHOGBCMemory
                return $this->GBCMemory[$address + $this->gbcRamBankPositionECHO];
            }
        } elseif ($address < 0xFEA0) {
            //memoryReadOAM
            return ($this->core->lcd->modeSTAT > 1) ? 0xFF : $this->memory[$address];
        } elseif ($this->core->cGBC && $address >= 0xFEA0 && $address < 0xFF00) {
            //memoryReadNormal
            return $this->memory[$address];
        } elseif ($address >= 0xFF00) {
            switch ($address) {
                case 0xFF00:
                    return 0xC0 | $this->memory[0xFF00];
                case 0xFF01:
                    return (($this->memory[0xFF02] & 0x1) === 0x1) ? 0xFF : $this->memory[0xFF01];
                case 0xFF02:
                    if ($this->core->cGBC) {
                        return 0x7C | $this->memory[0xFF02];
                    }

                    return 0x7E | $this->memory[0xFF02];
                case 0xFF07:
                    return 0xF8 | $this->memory[0xFF07];
                case 0xFF0F:
                    return 0xE0 | $this->memory[0xFF0F];
                case 0xFF10:
                    return 0x80 | $this->memory[0xFF10];
                case 0xFF11:
                    return 0x3F | $this->memory[0xFF11];
                case 0xFF14:
                    return 0xBF | $this->memory[0xFF14];
                case 0xFF16:
                    return 0x3F | $this->memory[0xFF16];
                case 0xFF19:
                    return 0xBF | $this->memory[0xFF19];
                case 0xFF1A:
                    return 0x7F | $this->memory[0xFF1A];
                case 0xFF1B:
                case 0xFF20:
                    return 0xFF;
                case 0xFF1C:
                    return 0x9F | $this->memory[0xFF1C];
                case 0xFF1E:
                    return 0xBF | $this->memory[0xFF1E];
                case 0xFF23:
                    return 0xBF | $this->memory[0xFF23];
                case 0xFF26:
                    return 0x70 | $this->memory[0xFF26];
                case 0xFF30:
                case 0xFF31:
                case 0xFF32:
                case 0xFF33:
                case 0xFF34:
                case 0xFF35:
                case 0xFF36:
                case 0xFF37:
                case 0xFF38:
                case 0xFF39:
                case 0xFF3A:
                case 0xFF3B:
                case 0xFF3C:
                case 0xFF3D:
                case 0xFF3E:
                case 0xFF3F:
                    return (($this->memory[0xFF26] & 0x4) === 0x4) ? 0xFF : $this->memory[$address];
                case 0xFF41:
                    return 0x80 | $this->memory[0xFF41] | $this->core->lcd->modeSTAT;
                case 0xFF44:
                    return ($this->core->lcd->LCDisOn) ? $this->memory[0xFF44] : 0;
                case 0xFF4F:
                    return $this->currVRAMBank;
                default:
                    //memoryReadNormal
                    return $this->peekMemory($address);
            }
        } else {
            //memoryReadBAD
            return 0xFF;
        }
    }

    /**
     * Handles memory writes in the emulator, implementing bank-switching logic,
     * special address-specific behaviours, and memory protection mechanisms.
     *
     * This method differs from directly writing to memory by incorporating
     * memory banking logic, hardware behaviour emulation, and access control.
     * It interprets the provided address and data to perform actions specific
     * to the memory region and any active memory banking controller (MBC).
     *
     * Depending on the address range, this method:
     * - Enables or disables RAM banks.
     * - Switches ROM or RAM banks for various MBC types (MBC1, MBC2, MBC3, MBC5, etc.).
     * - Handles real-time clock (RTC) updates for MBC3.
     * - Updates special-purpose memory areas such as VRAM, OAM, and I/O registers.
     * - Emulates restricted memory access during specific modes (e.g., VRAM access during LCD mode 3).
     * - Handles hardware-specific quirks, like boot ROM handling and GBC palette operations.
     *
     * The method relies on various emulator properties to track the current
     * state of memory controllers, display modes, and hardware features.
     *
     * @param int      $address The memory address to write to.
     *                          Addresses are mapped to specific memory regions, including:
     *                          - ROM banks (0x0000-0x7FFF)
     *                          - VRAM (0x8000-0x9FFF)
     *                          - External RAM (0xA000-0xBFFF)
     *                          - Working RAM (0xC000-0xDFFF)
     *                          - Echo RAM (0xE000-0xFDFF)
     *                          - OAM (0xFE00-0xFE9F)
     *                          - I/O registers (0xFF00-0xFF7F)
     *                          - High RAM (0xFF80-0xFFFE)
     *                          - Interrupt Enable register (0xFFFF)
     *
     * @param int|null $data    The value to write to the given address.
     *
     * @note This method is central to the emulator's operation, managing interactions between
     *       the CPU, memory, and hardware components. Future refactoring could benefit from
     *       modularising memory region-specific behaviours into dedicated classes or methods.
     */
    public function writeMemory(int $address, ?int $data): void
    {
        if ($address < 0x8000) {
            if ($this->cMBC1) {
                if ($address < 0x2000) {
                    //MBC RAM Bank Enable/Disable:
                    $this->MBCRAMBanksEnabled = (($data & 0x0F) === 0x0A); //If lower nibble is 0x0A, then enable, otherwise disable.
                } elseif ($address < 0x4000) {
                    // MBC1WriteROMBank
                    //MBC1 ROM bank switching:
                    $this->ROMBank1offs = ($this->ROMBank1offs & 0x60) | ($data & 0x1F);
                    $this->setCurrentMBC1ROMBank();
                } elseif ($address < 0x6000) {
                    //MBC1WriteRAMBank
                    //MBC1 RAM bank switching
                    if ($this->MBC1Mode) {
                        //4/32 Mode
                        $this->currMBCRAMBank = $data & 0x3;
                        $this->currMBCRAMBankPosition = ($this->currMBCRAMBank << 13) - 0xA000;
                    } else {
                        //16/8 Mode
                        $this->ROMBank1offs = (($data & 0x03) << 5) | ($this->ROMBank1offs & 0x1F);
                        $this->setCurrentMBC1ROMBank();
                    }
                } else {
                    //MBC1WriteType
                    //MBC1 mode setting:
                    $this->MBC1Mode = (($data & 0x1) === 0x1);
                }
            } elseif ($this->cMBC2) {
                if ($address < 0x1000) {
                    //MBC RAM Bank Enable/Disable:
                    $this->MBCRAMBanksEnabled = (($data & 0x0F) === 0x0A); //If lower nibble is 0x0A, then enable, otherwise disable.
                } elseif ($address >= 0x2100 && $address < 0x2200) {
                    //MBC2WriteROMBank
                    //MBC2 ROM bank switching:
                    $this->ROMBank1offs = $data & 0x0F;
                    $this->setCurrentMBC2AND3ROMBank();
                } else {
                    //We might have encountered illegal RAM writing or such, so just do nothing...
                }
            } elseif ($this->cMBC3) {
                if ($address < 0x2000) {
                    //MBC RAM Bank Enable/Disable:
                    $this->MBCRAMBanksEnabled = (($data & 0x0F) === 0x0A); //If lower nibble is 0x0A, then enable, otherwise disable.
                } elseif ($address < 0x4000) {
                    //MBC3 ROM bank switching:
                    $this->ROMBank1offs = $data & 0x7F;
                    $this->setCurrentMBC2AND3ROMBank();
                } elseif ($address < 0x6000) {
                    //MBC3WriteRAMBank
                    $this->currMBCRAMBank = $data;
                    if ($data < 4) {
                        //MBC3 RAM bank switching
                        $this->currMBCRAMBankPosition = ($this->currMBCRAMBank << 13) -   0xA000;
                    }
                } elseif ($data === 0) {
                    //MBC3WriteRTCLatch
                    $this->core->RTCisLatched = false;
                } elseif (!$this->core->RTCisLatched) {
                    //Copy over the current RTC time for reading.
                    $this->core->RTCisLatched = true;
                    $this->core->latchedSeconds = (int) floor($this->core->RTCSeconds);
                    $this->core->latchedMinutes = $this->core->RTCMinutes;
                    $this->core->latchedHours = $this->core->RTCHours;
                    $this->core->latchedLDays = ($this->core->RTCDays & 0xFF);
                    $this->core->latchedHDays = $this->core->RTCDays >> 8;
                }
            } elseif ($this->cMBC5 || $this->cRUMBLE) {
                if ($address < 0x2000) {
                    //MBC RAM Bank Enable/Disable:
                    $this->MBCRAMBanksEnabled = (($data & 0x0F) === 0x0A); //If lower nibble is 0x0A, then enable, otherwise disable.
                } elseif ($address < 0x3000) {
                    //MBC5WriteROMBankLow
                    //MBC5 ROM bank switching:
                    $this->ROMBank1offs = ($this->ROMBank1offs & 0x100) | $data;
                    $this->setCurrentMBC5ROMBank();
                } elseif ($address < 0x4000) {
                    //MBC5WriteROMBankHigh
                    //MBC5 ROM bank switching (by least significant bit):
                    $this->ROMBank1offs = (($data & 0x01) << 8) | ($this->ROMBank1offs & 0xFF);
                    $this->setCurrentMBC5ROMBank();
                } elseif ($address < 0x6000) {
                    if ($this->cRUMBLE) {
                        //MBC5 RAM bank switching
                        //Like MBC5, but bit 3 of the lower nibble is used for rumbling and bit 2 is ignored.
                        $this->currMBCRAMBank = $data & 0x3;
                        $this->currMBCRAMBankPosition = ($this->currMBCRAMBank << 13) - 0xA000;
                    } else {
                        //MBC5 RAM bank switching
                        $this->currMBCRAMBank = $data & 0xF;
                        $this->currMBCRAMBankPosition = ($this->currMBCRAMBank << 13) - 0xA000;
                    }
                } else {
                    //We might have encountered illegal RAM writing or such, so just do nothing...
                }
            } elseif ($this->cHuC3) {
                if ($address < 0x2000) {
                    //MBC RAM Bank Enable/Disable:
                    $this->MBCRAMBanksEnabled = (($data & 0x0F) === 0x0A); //If lower nibble is 0x0A, then enable, otherwise disable.
                } elseif ($address < 0x4000) {
                    //MBC3 ROM bank switching:
                    $this->ROMBank1offs = $data & 0x7F;
                    $this->setCurrentMBC2AND3ROMBank();
                } elseif ($address < 0x6000) {
                    //HuC3WriteRAMBank
                    //HuC3 RAM bank switching
                    $this->currMBCRAMBank = $data & 0x03;
                    $this->currMBCRAMBankPosition = ($this->currMBCRAMBank << 13) - 0xA000;
                } else {
                    //We might have encountered illegal RAM writing or such, so just do nothing...
                }
            } else {
                //We might have encountered illegal RAM writing or such, so just do nothing...
            }
        } elseif ($address < 0xA000) {
            // VRAMWrite
            //VRAM cannot be written to during mode 3
            if ($this->core->lcd->modeSTAT < 3) {
                // Bkg Tile data area
                if ($address < 0x9800) {
                    $tileIndex = (($address - 0x8000) >> 4) + (384 * $this->currVRAMBank);
                    if ($this->core->tileReadState[$tileIndex] === 1) {
                        $r = count($this->core->tileData) - $this->core->tileCount + $tileIndex;
                        do {
                            $this->core->tileData[$r] = null;
                            $r -= $this->core->tileCount;
                        } while ($r >= 0);

                        $this->core->tileReadState[$tileIndex] = 0;
                    }
                }

                if ($this->currVRAMBank === 0) {
                    $this->memory[$address] = $data;
                } else {
                    $this->VRAM[$address - 0x8000] = $data;
                }
            }
        } elseif ($address < 0xC000) {
            if (($this->numRAMBanks === 1 / 16 && $address < 0xA200) || $this->numRAMBanks >= 1) {
                $overrideMbc = $this->core->config->getBoolean('advanced.performance.emulation.override_mbc');

                if (!$this->cMBC3) {
                    //memoryWriteMBCRAM
                    if ($this->MBCRAMBanksEnabled || $overrideMbc) {
                        $this->MBCRam[$address + $this->currMBCRAMBankPosition] = $data;
                    }
                } elseif ($this->MBCRAMBanksEnabled || $overrideMbc) {
                    //MBC3 RTC + RAM:
                    //memoryWriteMBC3RAM
                    switch ($this->currMBCRAMBank) {
                        case 0x00:
                        case 0x01:
                        case 0x02:
                        case 0x03:
                            $this->MBCRam[$address + $this->currMBCRAMBankPosition] = $data;
                            break;
                        case 0x08:
                            if ($data < 60) {
                                $this->core->RTCSeconds = $data;
                            } else {
                                echo '(Bank #' . $this->currMBCRAMBank . ') RTC write out of range: ' . $data . PHP_EOL;
                            }

                            break;
                        case 0x09:
                            if ($data < 60) {
                                $this->core->RTCMinutes = $data;
                            } else {
                                echo '(Bank #' . $this->currMBCRAMBank . ') RTC write out of range: ' . $data . PHP_EOL;
                            }

                            break;
                        case 0x0A:
                            if ($data < 24) {
                                $this->core->RTCHours = $data;
                            } else {
                                echo '(Bank #' . $this->currMBCRAMBank . ') RTC write out of range: ' . $data . PHP_EOL;
                            }

                            break;
                        case 0x0B:
                            $this->core->RTCDays = ($data & 0xFF) | ($this->core->RTCDays & 0x100);
                            break;
                        case 0x0C:
                            $this->core->RTCDayOverFlow = ($data & 0x80) === 0x80;
                            $this->core->RTCHALT = ($data & 0x40) == 0x40;
                            $this->core->RTCDays = (($data & 0x1) << 8) | ($this->core->RTCDays & 0xFF);
                            break;
                        default:
                            echo 'Invalid MBC3 bank address selected: ' . $this->currMBCRAMBank . PHP_EOL;
                    }
                }
            } else {
                //We might have encountered illegal RAM writing or such, so just do nothing...
            }
        } elseif ($address < 0xE000) {
            if ($this->core->cGBC && $address >= 0xD000) {
                //memoryWriteGBCRAM
                $this->GBCMemory[$address + $this->gbcRamBankPosition] = $data;
            } else {
                //memoryWriteNormal
                $this->memory[$address] = $data;
            }
        } elseif ($address < 0xFE00) {
            if ($this->core->cGBC && $address >= 0xF000) {
                //memoryWriteECHOGBCRAM
                $this->GBCMemory[$address + $this->gbcRamBankPositionECHO] = $data;
            } else {
                //memoryWriteECHONormal
                $this->memory[$address - 0x2000] = $data;
            }
        } elseif ($address <= 0xFEA0) {
            //memoryWriteOAMRAM
            //OAM RAM cannot be written to in mode 2 & 3
            if ($this->core->lcd->modeSTAT < 2) {
                $this->memory[$address] = $data;
            }
        } elseif ($address < 0xFF00) {
            //Only GBC has access to this RAM.
            if ($this->core->cGBC) {
                //memoryWriteNormal
                $this->memory[$address] = $data;
            } else {
                //We might have encountered illegal RAM writing or such, so just do nothing...
            }

            //I/O Registers (GB + GBC):
        } elseif ($address === 0xFF00) {
            $inputState = $this->core->input->getInputState();
            $this->memory[0xFF00] = ($data & 0x30) | (((($data & 0x20) === 0) ? ($inputState >> 4) : 0xF) & ((($data & 0x10) === 0) ? ($inputState & 0xF) : 0xF));
        } elseif ($address === 0xFF02) {
            if ((($data & 0x1) === 0x1)) {
                //Internal clock:
                $this->memory[0xFF02] = ($data & 0x7F);
                $this->memory[0xFF0F] |= 0x8; //Get this time delayed...
            } else {
                //External clock:
                $this->memory[0xFF02] = $data;
                //No connected serial device, so don't trigger interrupt...
            }
        } elseif ($address === 0xFF04) {
            $this->memory[0xFF04] = 0;
        } elseif ($address === 0xFF07) {
            $this->memory[0xFF07] = $data & 0x07;
            $this->core->TIMAEnabled = ($data & 0x04) === 0x04;
            $this->core->TACClocker = 4 ** (($data & 0x3) !== 0) ? ($data & 0x3) : 4; //TODO: Find a way to not make a conditional in here...
        } elseif ($address === 0xFF40) {
            if ($this->core->cGBC) {
                $temp_var = ($data & 0x80) === 0x80;
                if ($temp_var !== $this->core->lcd->LCDisOn) {
                    //When the display mode changes...
                    $this->core->lcd->LCDisOn = $temp_var;
                    $this->memory[0xFF41] &= 0xF8;
                    $this->core->lcd->STATTracker = $this->core->lcd->modeSTAT = $this->core->LCDTicks = $this->core->lcd->actualScanLine = $this->memory[0xFF44] = 0;
                    if ($this->core->lcd->LCDisOn) {
                        $this->core->lcd->matchLYC(); //Get the compare of the first scan line.
                    } else {
                        $this->core->displayShowOff();
                    }

                    $this->memory[0xFF0F] &= 0xFD;
                }

                $this->core->gfxWindowY = ($data & 0x40) === 0x40;
                $this->core->gfxWindowDisplay = ($data & 0x20) === 0x20;
                $this->core->gfxBackgroundX = ($data & 0x10) === 0x10;
                $this->core->gfxBackgroundY = ($data & 0x08) === 0x08;
                $this->core->gfxSpriteDouble = ($data & 0x04) === 0x04;
                $this->core->gfxSpriteShow = ($data & 0x02) === 0x02;
                $this->core->spritePriorityEnabled = ($data & 0x01) === 0x01;
                $this->memory[0xFF40] = $data;
            } else {
                $temp_var = ($data & 0x80) === 0x80;
                if ($temp_var !== $this->core->lcd->LCDisOn) {
                    //When the display mode changes...
                    $this->core->lcd->LCDisOn = $temp_var;
                    $this->memory[0xFF41] &= 0xF8;
                    $this->core->lcd->STATTracker = $this->core->lcd->modeSTAT = $this->core->LCDTicks = $this->core->lcd->actualScanLine = $this->memory[0xFF44] = 0;
                    if ($this->core->lcd->LCDisOn) {
                        $this->core->lcd->matchLYC(); //Get the compare of the first scan line.
                    } else {
                        $this->core->displayShowOff();
                    }

                    $this->memory[0xFF0F] &= 0xFD;
                }

                $this->core->gfxWindowY = ($data & 0x40) === 0x40;
                $this->core->gfxWindowDisplay = ($data & 0x20) === 0x20;
                $this->core->gfxBackgroundX = ($data & 0x10) === 0x10;
                $this->core->gfxBackgroundY = ($data & 0x08) === 0x08;
                $this->core->gfxSpriteDouble = ($data & 0x04) === 0x04;
                $this->core->gfxSpriteShow = ($data & 0x02) === 0x02;
                if (($data & 0x01) === 0) {
                    // this emulates the gbc-in-gb-mode, not the original gb-mode
                    $this->core->bgEnabled = false;
                    $this->core->gfxWindowDisplay = false;
                } else {
                    $this->core->bgEnabled = true;
                }

                $this->memory[0xFF40] = $data;
            }
        } elseif ($address === 0xFF41) {
            if ($this->core->cGBC) {
                $this->core->lcd->LYCMatchTriggerSTAT = (($data & 0x40) === 0x40);
                $this->core->lcd->mode2TriggerSTAT = (($data & 0x20) === 0x20);
                $this->core->lcd->mode1TriggerSTAT = (($data & 0x10) === 0x10);
                $this->core->lcd->mode0TriggerSTAT = (($data & 0x08) === 0x08);
                $this->memory[0xFF41] = ($data & 0xF8);
            } else {
                $this->core->lcd->LYCMatchTriggerSTAT = (($data & 0x40) === 0x40);
                $this->core->lcd->mode2TriggerSTAT = (($data & 0x20) === 0x20);
                $this->core->lcd->mode1TriggerSTAT = (($data & 0x10) === 0x10);
                $this->core->lcd->mode0TriggerSTAT = (($data & 0x08) === 0x08);
                $this->memory[0xFF41] = ($data & 0xF8);
                if ($this->core->lcd->LCDisOn && $this->core->lcd->modeSTAT < 2) {
                    $this->memory[0xFF0F] |= 0x2;
                }
            }
        } elseif ($address === 0xFF45) {
            $this->memory[0xFF45] = $data;
            if ($this->core->lcd->LCDisOn) {
                $this->core->lcd->matchLYC(); //Get the compare of the first scan line.
            }
        } elseif ($address === 0xFF46) {
            $this->memory[0xFF46] = $data;
            //DMG cannot DMA from the ROM banks.
            if ($this->core->cGBC || $data > 0x7F) {
                $data <<= 8;
                $address = 0xFE00;
                while ($address < 0xFEA0) {
                    $this->memory[$address++] = $this->readMemory($data++);
                }
            }
        } elseif ($address === 0xFF47) {
            $this->core->decodePalette(0, $data);
            if ($this->memory[0xFF47] !== $data) {
                $this->memory[0xFF47] = $data;
                $this->core->invalidateAll(0);
            }
        } elseif ($address === 0xFF48) {
            $this->core->decodePalette(4, $data);
            if ($this->memory[0xFF48] !== $data) {
                $this->memory[0xFF48] = $data;
                $this->core->invalidateAll(1);
            }
        } elseif ($address === 0xFF49) {
            $this->core->decodePalette(8, $data);
            if ($this->memory[0xFF49] !== $data) {
                $this->memory[0xFF49] = $data;
                $this->core->invalidateAll(2);
            }
        } elseif ($address === 0xFF4D) {
            $this->memory[0xFF4D] = $this->core->cGBC ? ($data & 0x7F) + ($this->memory[0xFF4D] & 0x80) : $data;
        } elseif ($address === 0xFF4F) {
            if ($this->core->cGBC) {
                $this->currVRAMBank = $data & 0x01;
                //Only writable by GBC.
            }
        } elseif ($address === 0xFF50) {
            if ($this->core->inBootstrap) {
                echo 'Boot ROM reads blocked: Bootstrap process has ended.' . PHP_EOL;
                $this->core->inBootstrap = false;
                $this->core->disableBootROM(); //Fill in the boot ROM ranges with ROM  bank 0 ROM ranges
                $this->memory[0xFF50] = $data; //Bits are sustained in memory?
            }
        } elseif ($address === 0xFF51) {
            if ($this->core->cGBC && !$this->core->hdmaRunning) {
                $this->memory[0xFF51] = $data;
            }
        } elseif ($address === 0xFF52) {
            if ($this->core->cGBC && !$this->core->hdmaRunning) {
                $this->memory[0xFF52] = $data & 0xF0;
            }
        } elseif ($address === 0xFF53) {
            if ($this->core->cGBC && !$this->core->hdmaRunning) {
                $this->memory[0xFF53] = $data & 0x1F;
            }
        } elseif ($address === 0xFF54) {
            if ($this->core->cGBC && !$this->core->hdmaRunning) {
                $this->memory[0xFF54] = $data & 0xF0;
            }
        } elseif ($address === 0xFF55) {
            if ($this->core->cGBC) {
                if (!$this->core->hdmaRunning) {
                    if (($data & 0x80) === 0) {
                        //DMA
                        $this->core->CPUTicks += 1 + ((8 * (($data & 0x7F) + 1)) * $this->core->multiplier);
                        $dmaSrc = ($this->memory[0xFF51] << 8) + $this->memory[0xFF52];
                        $dmaDst = 0x8000 + ($this->memory[0xFF53] << 8) + $this->memory[0xFF54];
                        $endAmount = ((($data & 0x7F) * 0x10) + 0x10);
                        for ($loopAmount = 0; $loopAmount < $endAmount; ++$loopAmount) {
                            $this->writeMemory($dmaDst++, $this->readMemory($dmaSrc++));
                        }

                        $this->memory[0xFF51] = (($dmaSrc & 0xFF00) >> 8);
                        $this->memory[0xFF52] = ($dmaSrc & 0x00F0);
                        $this->memory[0xFF53] = (($dmaDst & 0x1F00) >> 8);
                        $this->memory[0xFF54] = ($dmaDst & 0x00F0);
                        $this->memory[0xFF55] = 0xFF;
                        //Transfer completed.
                    } elseif ($data > 0x80) {
                        //H-Blank DMA
                        $this->core->hdmaRunning = true;
                        $this->memory[0xFF55] = $data & 0x7F;
                    } else {
                        $this->memory[0xFF55] = 0xFF;
                    }
                } elseif (($data & 0x80) === 0) {
                    //Stop H-Blank DMA
                    $this->core->hdmaRunning = false;
                    $this->memory[0xFF55] |= 0x80;
                }
            } else {
                $this->memory[0xFF55] = $data;
            }
        } elseif ($address === 0xFF68) {
            if ($this->core->cGBC) {
                $this->memory[0xFF69] = 0xFF & $this->core->gbcRawPalette[$data & 0x3F];
                $this->memory[0xFF68] = $data;
            } else {
                $this->memory[0xFF68] = $data;
            }
        } elseif ($address === 0xFF69) {
            if ($this->core->cGBC) {
                $this->core->setGBCPalette($this->memory[0xFF68] & 0x3F, $data);
                // high bit = autoincrement
                if (Helpers::usbtsb($this->memory[0xFF68]) < 0) {
                    $next = ((Helpers::usbtsb($this->memory[0xFF68]) + 1) & 0x3F);
                    $this->memory[0xFF68] = ($next | 0x80);
                    $this->memory[0xFF69] = 0xFF & $this->core->gbcRawPalette[$next];
                } else {
                    $this->memory[0xFF69] = $data;
                }
            } else {
                $this->memory[0xFF69] = $data;
            }
        } elseif ($address === 0xFF6A) {
            if ($this->core->cGBC) {
                $this->memory[0xFF6B] = 0xFF & $this->core->gbcRawPalette[($data & 0x3F) | 0x40];
                $this->memory[0xFF6A] = $data;
            } else {
                $this->memory[0xFF6A] = $data;
            }
        } elseif ($address === 0xFF6B) {
            if ($this->core->cGBC) {
                $this->core->setGBCPalette(($this->memory[0xFF6A] & 0x3F) + 0x40, $data);
                // high bit = autoincrement
                if (Helpers::usbtsb($this->memory[0xFF6A]) < 0) {
                    $next = (($this->memory[0xFF6A] + 1) & 0x3F);
                    $this->memory[0xFF6A] = ($next | 0x80);
                    $this->memory[0xFF6B] = 0xFF & $this->core->gbcRawPalette[$next | 0x40];
                } else {
                    $this->memory[0xFF6B] = $data;
                }
            } else {
                $this->memory[0xFF6B] = $data;
            }
        } elseif ($address === 0xFF6C) {
            if ($this->core->inBootstrap) {
                if ($this->core->inBootstrap) {
                    $this->core->cGBC = ($data === 0x80);
                    echo 'Booted to GBC Mode: ' . $this->core->cGBC . PHP_EOL;
                }

                $this->memory[0xFF6C] = $data;
            }
        } elseif ($address === 0xFF70) {
            if ($this->core->cGBC) {
                $addressCheck = ($this->memory[0xFF51] << 8) | $this->memory[0xFF52]; //Cannot change the RAM bank while WRAM is the source of a running HDMA.
                if (!$this->core->hdmaRunning || $addressCheck < 0xD000 || $addressCheck >= 0xE000) {
                    $this->gbcRamBank = max($data & 0x07, 1); //Bank range is from 1-7
                    $this->gbcRamBankPosition = (($this->gbcRamBank - 1) * 0x1000) - 0xD000;
                    $this->gbcRamBankPositionECHO = (($this->gbcRamBank - 1) * 0x1000) - 0xF000;
                }

                $this->memory[0xFF70] = ($data | 0x40); //Bit 6 cannot be written to.
            } else {
                $this->memory[0xFF70] = $data;
            }
        } else {
            //Start the I/O initialization by filling in the slots as normal memory:
            //memoryWriteNormal
            $this->pokeMemory($address, $data);
        }
    }
}
