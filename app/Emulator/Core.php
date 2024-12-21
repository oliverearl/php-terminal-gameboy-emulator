<?php

declare(strict_types=1);

namespace App\Emulator;

use App\Emulator\Canvas\DrawContextInterface;
use App\Emulator\Cartridge\Cartridge;
use App\Emulator\Config\ConfigBladder;
use App\Emulator\Cpu\HandlesCbopcodes;
use App\Emulator\Cpu\HandlesOpcodes;
use App\Emulator\Cpu\ProvidesDataTables;
use App\Emulator\Cpu\ProvidesTickTables;
use App\Emulator\Debugger\Debugger;
use App\Emulator\Input\Input;
use App\Emulator\Memory\Memory;
use App\Exceptions\Core\AlreadyRunningException;
use App\Exceptions\Core\CoreNotInitializedException;
use App\Exceptions\Cpu\HaltOverrunException;
use Exception;

class Core
{
    use HandlesCbopcodes;
    use HandlesFlags;
    use HandlesOpcodes;
    use ProvidesDataTables;
    use ProvidesTickTables;

    //Whether we're in the GBC boot ROM.
    public bool $inBootstrap = true;

    // Accumulator (default is GB mode)
    public int $registerA = 0x01;

    // bit 7 - Zero
    public bool $FZero = true;

    // bit 6 - Sub
    public bool $FSubtract = false;

    // bit 5 - Half Carry
    public bool $FHalfCarry = true;

    // bit 4 - Carry
    public bool $FCarry = true;

    // Register B
    public int $registerB = 0x00;

    // Register C
    public int $registerC = 0x13;

    // Register D
    public int $registerD = 0x00;

    // Register E
    public int $registerE = 0xD8;

    // Registers H and L
    public int $registersHL = 0x014D;

    // Stack Pointer
    public int $stackPointer = 0xFFFE;

    // Program Counter
    public int $programCounter = 0x0100;

    //Has the CPU been suspended until the next interrupt?
    public bool $halt = false;

    //Did we trip the DMG Halt bug?
    public bool $skipPCIncrement = false;

    //Has the emulation been paused or a frame has ended?
    public int $stopEmulator = 3;

    //Are interrupts enabled?
    public bool $IME = true;

    //HDMA Transfer Flag - GBC only
    public bool $hdmaRunning = false;

    //The number of clock cycles emulated.
    public int $CPUTicks = 0;

    //GBC Speed Multiplier
    public int $multiplier = 1;

    //GameBoy Color detection.
    private bool $cGBC = false;

    public bool $gfxWindowY = false;

    public bool $gfxWindowDisplay = false;

    public bool $gfxSpriteShow = false;

    public bool $gfxSpriteDouble = false;

    public bool $gfxBackgroundY = false;

    public bool $gfxBackgroundX = false;

    public bool $TIMAEnabled = false;

    //
    //RTC:
    //
    public bool $RTCisLatched = true;

    public int $latchedSeconds = 0;

    public int $latchedMinutes = 0;

    public int $latchedHours = 0;

    public int $latchedLDays = 0;

    public int $latchedHDays = 0;

    public int $RTCSeconds = 0;

    public int $RTCMinutes = 0;

    public int $RTCHours = 0;

    public int $RTCDays = 0;

    public bool $RTCDayOverFlow = false;

    public bool $RTCHALT = false;

    //
    //Timing Variables
    //

    //Used to sample the audio system every x CPU instructions.
    public int $audioTicks = 0;

    //Times for how many instructions to execute before ending the loop.
    public int $emulatorTicks = 0;

    // DIV Ticks Counter (Invisible lower 8-bit)
    public int $DIVTicks = 14;

    // ScanLine Counter
    public int $LCDTicks = 15;

    // Timer Ticks Count
    public int $timerTicks = 0;

    // Timer Max Ticks
    public int $TACClocker = 256;

    //Are the interrupts on queue to be enabled?
    public int $untilEnable = 0;

    //The last time we iterated the main loop.
    public int $lastIteration = 0;

    //
    //Graphics Variables
    //

    //To prevent the repeating of drawing a blank screen.
    public int $drewBlank = 0;

    // tile data arrays
    public array $tileData = [];

    public array $frameBuffer = [];

    public array $canvasBuffer;

    public array $gbcRawPalette = [];

    //GB: 384, GBC: 384 * 2
    public int $tileCount = 384;

    public int $tileCountInvalidator;

    public int $colorCount = 12;

    public array $gbPalette = [];

    public array $gbColorizedPalette = [];

    public array $gbcPalette = [];

    // min "attrib" value where transparency can occur (Default is 4 (GB mode))
    public int $transparentCutoff = 4;

    public bool $bgEnabled = true;

    public bool $spritePriorityEnabled = true;

    // true if there are any images to be invalidated
    public array $tileReadState = [];

    public int $windowSourceLine = 0;

    //"Classic" GameBoy palette colors.
    public array $colors = [0x80EFFFDE, 0x80ADD794, 0x80529273, 0x80183442];

    //Frame skip tracker
    public int $frameCount;

    public array $weaveLookup = [];

    public int $width = 160;

    public int $height = 144;

    public int $pixelCount;

    public int $rgbCount;

    //Pointer to the current palette we're using (Used for palette switches during boot or so it can be done anytime)
    public ?array $palette = null;

    // Added

    public ?bool $cTIMER = null;

    public readonly ConfigBladder $config;
    public readonly Cartridge $cartridge;
    public readonly LcdController $lcd;
    public readonly Memory $memory;
    public readonly Input $input;

    public function __construct(string $romPath, private readonly ?DrawContextInterface $drawContext)
    {
        // Some properties require initialization.
        $this->tileCountInvalidator = $this->tileCount * 4;
        $this->frameCount = 10;
        $this->pixelCount = $this->width * $this->height;
        $this->rgbCount = $this->pixelCount * 4;

        $this->config = resolve(ConfigBladder::class);
        $this->input = resolve(Input::class, ['core' => $this]);
        $this->cartridge = resolve(Cartridge::class, ['core' => $this, 'romPath' => $romPath]);
        $this->memory = resolve(Memory::class, ['core' => $this]);
        $this->lcd = resolve(LcdController::class, ['core' => $this]);

        $this->config->set('advanced.performance.frame_skip_amount', 0);
    }

    public function start(): void
    {
        $this->initPalettes();
        $this->initCartridge();
        $this->init();
        $this->initSkipBootstrap();
        $this->checkPaletteType();
        $this->initLcd();
        $this->run();
        $this->finalizeBootstrap();
    }

    /**
     * Loads cartridge into memory and sets flags.
     */
    private function initCartridge(): void
    {
        $data = $this->cartridge->load();

        $this->setMbc1($data['mbc1']);
        $this->setMbc2($data['mbc2']);
        $this->setMbc3($data['mbc3']);
        $this->setMbc5($data['mbc5']);
        $this->setRumble($data['rumble']);
        $this->setSram($data['sram']);
        $this->setBattery($data['batt']);
        $this->setMmmo1($data['mmmo1']);
        $this->setHuc3($data['huc3']);
        $this->setHuc1($data['huc1']);

        $this->cTIMER = $data['timer'];
        $this->setGameBoyColor($data['mode']);
    }

    public function isGameBoyColor(): bool
    {
        return $this->cGBC;
    }

    public function setGameBoyColor(bool $isGbc): void
    {
        $this->cGBC = $isGbc;
    }

    /**
     * Finalizes bootstrap and conducts sanity checks.
     *
     * @throws \App\Exceptions\Core\AlreadyRunningException
     * @throws \App\Exceptions\Core\CoreNotInitializedException
     */
    private function finalizeBootstrap(): void
    {
        $state = $this->stopEmulator & 2;

        if ($state === 0) {
            throw new AlreadyRunningException();
        }

        if ($state !== 2) {
            throw new CoreNotInitializedException();
        }

        $this->stopEmulator &= 1;
        $this->lastIteration = (int) (microtime(true) * 1000);
        $this->inBootstrap = false;
    }

    public function initPalettes(): void
    {
        $this->frameBuffer = Helpers::getPreinitializedArray(23040, 0x00FFFFFF);
        $this->gbPalette = Helpers::getPreinitializedArray(12, 0); //32-bit signed
        $this->gbColorizedPalette = Helpers::getPreinitializedArray(12, 0); //32-bit signed
        $this->gbcRawPalette = Helpers::getPreinitializedArray(0x80, -1000); //32-bit signed
        $this->gbcPalette = [0x40]; //32-bit signed
        //Initialize the GBC Palette:
        $address = 0x3F;

        while ($address >= 0) {
            $this->gbcPalette[$address] = ($address < 0x20) ? -1 : 0;
            --$address;
        }
    }

    public function initSkipBootstrap(): void
    {
        $this->programCounter = 0x100;
        $this->stackPointer = 0xFFFE;
        $this->IME = true;
        $this->LCDTicks = 15;
        $this->DIVTicks = 14;
        $this->registerA = ($this->isGameBoyColor()) ? 0x11 : 0x1;
        $this->registerB = 0;
        $this->registerC = 0x13;
        $this->registerD = 0;
        $this->registerE = 0xD8;
        $this->FZero = true;
        $this->FSubtract = false;
        $this->FHalfCarry = true;
        $this->FCarry = true;
        $this->registersHL = 0x014D;

        //Fill in the boot ROM set register values
        //Default values to the GB boot ROM values, then fill in the GBC boot ROM values after ROM loading
        $address = 0xFF;

        while ($address >= 0) {
            if ($address >= 0x30 && $address < 0x40) {
                $this->memory->writeMemory(0xFF00 + $address, self::POST_BOOT_IO_REGISTER_STATE_TABLE[$address]);
            } else {
                switch ($address) {
                    case 0x00:
                    case 0x01:
                    case 0x02:
                    case 0x07:
                    case 0x0F:
                    case 0x40:
                    case 0xFF:
                        $this->memory->writeMemory(0xFF00 + $address, self::POST_BOOT_IO_REGISTER_STATE_TABLE[$address]);
                        break;
                    default:
                        $this->memory->pokeMemory(0xFF00 + $address, self::POST_BOOT_IO_REGISTER_STATE_TABLE[$address]);
                }
            }

            --$address;
        }
    }

    public function disableBootROM(): void
    {
        //Remove any traces of the boot ROM from ROM memory.
        for ($address = 0; $address < 0x900; ++$address) {
            //Skip the already loaded in ROM header.
            if ($address < 0x100 || $address >= 0x200) {
                // Replace the Game Boy Color boot ROM with the game ROM.
                $this->memory->pokeMemory($address, $this->cartridge->getRom()[$address]);
            }
        }

        $this->checkPaletteType();

        if (!$this->isGameBoyColor()) {
            //Clean up the post-boot (GB mode only) state:
            echo 'Stepping down from GBC mode.' . PHP_EOL;
            $this->tileCount /= 2;
            $this->tileCountInvalidator = $this->tileCount * 4;
            if (! $this->config->getBoolean('enable_gb_colorize')) {
                $this->transparentCutoff = 4;
            }

            $this->colorCount = 12;

            // @TODO
            // $this->tileData.length = $this->tileCount * $this->colorCount;

            unset($this->memory->VRAM);
            unset($this->memory->GBCMemory);
            //Possible Extra: shorten some gfx arrays to the length that we need (Remove the unused indices)
        }
    }

    public function init(): void
    {
        //Setup the auxilliary/switchable RAM to their maximum possible size (Bad headers can lie).
        if ($this->usesMbc2()) {
            $this->memory->numRAMBanks = 1 / 16;
        } elseif ($this->usesMbc1() || $this->usesRumble() || $this->usesMbc3() || $this->usesHuc3()) {
            $this->memory->numRAMBanks = 4;
        } elseif ($this->usesMbc5()) {
            $this->memory->numRAMBanks = 16;
        } elseif ($this->usesSram()) {
            $this->memory->numRAMBanks = 1;
        }

        if ($this->memory->numRAMBanks > 0) {
            if (!$this->isMbcRamUtilized()) {
                //For ROM and unknown MBC cartridges using the external RAM:
                $this->memory->MBCRAMBanksEnabled = true;
            }

            //Switched RAM Used
            $this->memory->MBCRam = Helpers::getPreinitializedArray($this->memory->numRAMBanks * 0x2000, 0);
        }

        echo 'Actual bytes of MBC RAM allocated: ' . ($this->memory->numRAMBanks * 0x2000) . PHP_EOL;

        //Setup the RAM for GBC mode.
        if ($this->isGameBoyColor()) {
            $this->memory->VRAM = Helpers::getPreinitializedArray(0x2000, 0);
            $this->memory->GBCMemory = Helpers::getPreinitializedArray(0x7000, 0);
            $this->tileCount *= 2;
            $this->tileCountInvalidator = $this->tileCount * 4;
            $this->colorCount = 64;
            $this->transparentCutoff = 32;
        }

        $this->tileData = Helpers::getPreinitializedArray($this->tileCount * $this->colorCount, null);
        $this->tileReadState = Helpers::getPreinitializedArray($this->tileCount, 0);
    }

    public function initLcd(): void
    {
        $this->transparentCutoff = ($this->config->getBoolean('enable_gb_colorize') || $this->isGameBoyColor()) ? 32 : 4;
        if (count($this->weaveLookup) === 0) {
            //Setup the image decoding lookup table:
            $this->weaveLookup = Helpers::getPreinitializedArray(256, 0);
            for ($i_ = 0x1; $i_ <= 0xFF; ++$i_) {
                for ($d_ = 0; $d_ < 0x8; ++$d_) {
                    $this->weaveLookup[$i_] += (($i_ >> $d_) & 1) << ($d_ * 2);
                }
            }
        }

        $this->width = 160;
        $this->height = 144;

        //Get a CanvasPixelArray buffer:
        //Create a white screen

        if ($this->drawContext->isColorEnabled()) {
            $this->canvasBuffer = array_fill(0, 4 * $this->width * $this->height, 255);

            $address = $this->pixelCount;
            $address2 = $this->rgbCount;

            while ($address > 0) {
                $this->frameBuffer[--$address] = 0x00FFFFFF;
                $this->canvasBuffer[$address2 -= 4] = 0xFF;
                $this->canvasBuffer[$address2 + 1] = 0xFF;
                $this->canvasBuffer[$address2 + 2] = 0xFF;
                $this->canvasBuffer[$address2 + 3] = 0xFF;
            }
        } else {
            $this->canvasBuffer = array_fill(0, 4 * $this->width * $this->height, false);
            $this->frameBuffer = array_fill(0, $this->pixelCount, 0x00FFFFFF);
        }

        $this->drawContext->draw($this->canvasBuffer);
    }

    public function run(): void
    {
        //The preprocessing before the actual iteration loop:
        try {
            if (($this->stopEmulator & 2) === 0) {
                if (($this->stopEmulator & 1) === 1) {
                    $this->stopEmulator = 0;
                    $this->clockUpdate(); //Frame skip and RTC code.

                    //If no HALT... Execute normally
                    if (!$this->halt) {
                        $this->executeIteration();
                        //If we bailed out of a halt because the iteration ran down its timing.
                    } else {
                        $this->CPUTicks = 1;
                        $this->halt();
                        //Execute Interrupt:
                        $this->runInterrupt();
                        //Timing:
                        $this->updateCore();
                        $this->executeIteration();
                    }

                    //We can only get here if there was an internal error, but the loop was restarted.
                } else {
                    Debugger::warning('Iterator restarted a faulted core.');
                    // pause here
                }
            }
        } catch (HaltOverrunException) {
            // Intentionally do nothing
        } catch (Exception $exception) {
            Debugger::warning($exception->getMessage());
            // pause
        }

        $this->input->check();
    }

    public function executeIteration(): void
    {
        //Iterate the interpreter loop:
        $op = 0;

        while ($this->stopEmulator === 0) {
            //Fetch the current opcode.
            $op = $this->memory->readMemory($this->programCounter);
            if (!$this->skipPCIncrement) {
                //Increment the program counter to the next instruction:
                $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
            }

            $this->skipPCIncrement = false;
            //Get how many CPU cycles the current op code counts for:
            $this->CPUTicks = self::PRIMARY_TABLE[$op];
            //Execute the OP code instruction:
            $this->runOpcode($op);
            //Interrupt Arming:
            switch ($this->untilEnable) {
                case 1:
                    $this->IME = true;
                    // no break
                case 2:
                    $this->untilEnable--;
            }

            //Execute Interrupt:
            if ($this->IME) {
                $this->runInterrupt();
            }

            //Timing:
            $this->updateCore();
        }
    }

    public function runInterrupt(): void
    {
        $bitShift = 0;
        $testbit = 1;
        $interrupts = $this->memory->peekMemory(0xFFFF) & $this->memory->peekMemory(0xFF0F);

        while ($bitShift < 5) {
            //Check to see if an interrupt is enabled AND requested.
            if (($testbit & $interrupts) === $testbit) {
                $this->IME = false; //Reset the interrupt enabling.
                //Reset the interrupt request.
                $this->memory->pokeMemory(0xFF0F, $this->memory->peekMemory(0xFF0F) & ~$testbit);
                //Set the stack pointer to the current program counter value:
                $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
                $this->memory->writeMemory($this->stackPointer, $this->programCounter >> 8);
                $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
                $this->memory->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
                //Set the program counter to the interrupt's address:
                $this->programCounter = 0x0040 + ($bitShift * 0x08);
                //Interrupts have a certain clock cycle length:
                $this->CPUTicks += 5; //People say it's around 5.
                break; //We only want the highest priority interrupt.
            }

            $testbit = 1 << ++$bitShift;
        }
    }

    public function updateCore(): void
    {
        // DIV control
        $this->DIVTicks += $this->CPUTicks;
        if ($this->DIVTicks >= 0x40) {
            $this->DIVTicks -= 0x40;
            $this->memory->memory[0xFF04] = ($this->memory->memory[0xFF04] + 1) & 0xFF; // inc DIV
        }

        //LCD Controller Ticks
        $timedTicks = $this->CPUTicks / $this->multiplier;
        // LCD Timing
        $this->LCDTicks += $timedTicks; //LCD timing
        $this->lcd->scanLine($this->lcd->actualScanLine); //Scan Line and STAT Mode Control

        //Audio Timing
        $this->audioTicks += $timedTicks; //Not the same as the LCD timing (Cannot be altered by display on/off changes!!!).

        //Are we past the granularity setting?
        if ($this->audioTicks >= $this->config->getInteger('advanced.performance.audio_granularity')) {
            //Emulator Timing (Timed against audio for optimization):
            $this->emulatorTicks += $this->audioTicks;
            if ($this->emulatorTicks >= $this->config->getInteger('advanced.performance.machine_cycles_per_loop')) {
                //Make sure we don't overdo the audio.
                //LCD off takes at least 2 frames.
                if (($this->stopEmulator & 1) === 0 && $this->drewBlank === 0) {
                    //Display frame
                    $this->drawToCanvas();
                }

                $this->stopEmulator |= 1; //End current loop.
                $this->emulatorTicks = 0;
            }

            $this->audioTicks = 0;
        }

        // Internal Timer
        if ($this->TIMAEnabled) {
            $this->timerTicks += $this->CPUTicks;
            while ($this->timerTicks >= $this->TACClocker) {
                $this->timerTicks -= $this->TACClocker;
                if ($this->memory->memory[0xFF05] === 0xFF) {
                    $this->memory->memory[0xFF05] = $this->memory->memory[0xFF06];
                    $this->memory->memory[0xFF0F] |= 0x4; // set IF bit 2
                } else {
                    ++$this->memory->memory[0xFF05];
                }
            }
        }
    }

    /**
     * Shows the emulator menu.
     */
    public function toggleMenu(): void
    {
        Debugger::print('Toggles emulator menu. Not yet implemented.');
    }

    /*
     * Dumps the current state of the emulator.
     */
    public function dumpState(): void
    {
        Debugger::print(sprintf('Dumping state to files in %s!', getcwd()));

        // TODO: Dump other areas of state.
        $this->memory->dump();
    }

    public function displayShowOff(): void
    {
        if ($this->drewBlank === 0) {
            if ($this->drawContext->isColorEnabled()) {
                $this->canvasBuffer = array_fill(0, 4 * $this->width * $this->height, 255);
            } else {
                $this->canvasBuffer = array_fill(0, 4 * $this->width * $this->height, false);
            }

            $this->drawContext->draw($this->canvasBuffer);
            $this->drewBlank = 2;
        }
    }

    public function performHdma(): void
    {
        $this->CPUTicks += 1 + (8 * $this->multiplier);

        $dmaSrc = ($this->memory->memory[0xFF51] << 8) + $this->memory->memory[0xFF52];
        $dmaDstRelative = ($this->memory->memory[0xFF53] << 8) + $this->memory->memory[0xFF54];
        $dmaDstFinal = $dmaDstRelative + 0x10;
        $tileRelative = count($this->tileData) - $this->tileCount;

        if ($this->memory->currVRAMBank === 1) {
            while ($dmaDstRelative < $dmaDstFinal) {
                // Bkg Tile data area
                if ($dmaDstRelative < 0x1800) {
                    $tileIndex = ($dmaDstRelative >> 4) + 384;
                    if ($this->tileReadState[$tileIndex] === 1) {
                        $r = $tileRelative + $tileIndex;
                        do {
                            $this->tileData[$r] = null;
                            $r -= $this->tileCount;
                        } while ($r >= 0);

                        $this->tileReadState[$tileIndex] = 0;
                    }
                }

                $this->memory->VRAM[$dmaDstRelative++] = $this->memory->readMemory($dmaSrc++);
            }
        } else {
            while ($dmaDstRelative < $dmaDstFinal) {
                // Bkg Tile data area
                if ($dmaDstRelative < 0x1800) {
                    $tileIndex = $dmaDstRelative >> 4;
                    if ($this->tileReadState[$tileIndex] === 1) {
                        $r = $tileRelative + $tileIndex;

                        do {
                            $this->tileData[$r] = null;
                            $r -= $this->tileCount;
                        } while ($r >= 0);

                        $this->tileReadState[$tileIndex] = 0;
                    }
                }

                $this->memory->memory[0x8000 + $dmaDstRelative++] = $this->memory->readMemory($dmaSrc++);
            }
        }

        $this->memory->memory[0xFF51] = (($dmaSrc & 0xFF00) >> 8);
        $this->memory->memory[0xFF52] = ($dmaSrc & 0x00F0);
        $this->memory->memory[0xFF53] = (($dmaDstFinal & 0x1F00) >> 8);
        $this->memory->memory[0xFF54] = ($dmaDstFinal & 0x00F0);
        if ($this->memory->memory[0xFF55] === 0) {
            $this->hdmaRunning = false;
            $this->memory->memory[0xFF55] = 0xFF; //Transfer completed ("Hidden last step," since some ROMs don't imply this, but most do).
        } else {
            --$this->memory->memory[0xFF55];
        }
    }

    public function clockUpdate(): void
    {
        $autoFrameSkip = $this->config->getBoolean('advanced.performance.auto_frame_skip');

        //We're tying in the same timer for RTC and frame skipping, since we can and this reduces load.
        if ($autoFrameSkip || $this->cTIMER) {
            $timeElapsed = ((int) (microtime(true) * 1000)) - $this->lastIteration; //Get the numnber of milliseconds since this last executed.
            if ($this->cTIMER && !$this->RTCHALT) {
                //Update the MBC3 RTC:
                $this->RTCSeconds += $timeElapsed / 1000;
                //System can stutter, so the seconds difference can get large, thus the "while".
                while ($this->RTCSeconds >= 60) {
                    $this->RTCSeconds -= 60;
                    ++$this->RTCMinutes;
                    if ($this->RTCMinutes >= 60) {
                        $this->RTCMinutes -= 60;
                        ++$this->RTCHours;
                        if ($this->RTCHours >= 24) {
                            $this->RTCHours -= 24;
                            ++$this->RTCDays;
                            if ($this->RTCDays >= 512) {
                                $this->RTCDays -= 512;
                                $this->RTCDayOverFlow = true;
                            }
                        }
                    }
                }
            }

            if ($autoFrameSkip) {
                //Auto Frame Skip:
                $frameSkipAmount = $this->config->getInteger('advanced.performance.frame_skip_amount');
                if ($timeElapsed > $this->config->getBoolean('advanced.performance.loop_interval')) {
                    //Did not finish in time...
                    if ($frameSkipAmount < $this->config->getInteger('advanced.performance.frame_skip_maximum')) {
                        $this->config->set('advanced.performance.loop_interval', ++$frameSkipAmount);
                    }
                } elseif ($frameSkipAmount > 0) {
                    //We finished on time, decrease frame skipping (throttle to somewhere just below full speed)...
                    $this->config->set('advanced.performance.loop_interval', --$frameSkipAmount);
                }
            }

            $this->lastIteration = (int) (microtime(true) * 1000);
            $this->config->tick();
        }
    }

    public function drawToCanvas(): void
    {
        $frameSkipAmount = $this->config->getInteger('advanced.performance.frame_skip_amount');
        //Draw the frame buffer to the canvas:
        if ($frameSkipAmount === 0 || $this->frameCount > 0) {
            //Copy and convert the framebuffer data to the CanvasPixelArray format.
            $bufferIndex = $this->pixelCount;
            $canvasIndex = $this->rgbCount;

            if ($this->drawContext->isColorEnabled()) {
                // Generate colored CanvasBuffer Version
                while ($canvasIndex > 3) {
                    //Red
                    $this->canvasBuffer[$canvasIndex -= 4] = ($this->frameBuffer[--$bufferIndex] >> 16) & 0xFF;
                    //Green
                    $this->canvasBuffer[$canvasIndex + 1] = ($this->frameBuffer[$bufferIndex] >> 8) & 0xFF;
                    //Blue
                    $this->canvasBuffer[$canvasIndex + 2] = $this->frameBuffer[$bufferIndex] & 0xFF;
                }
            } else {
                // Generate black&white CanvasBuffer Version
                while ($bufferIndex > 0) {
                    $r = ($this->frameBuffer[--$bufferIndex] >> 16) & 0xFF;
                    $g = ($this->frameBuffer[$bufferIndex] >> 8) & 0xFF;
                    $b = $this->frameBuffer[$bufferIndex] & 0xFF;

                    // 350 is a good threshold for black and white
                    $this->canvasBuffer[$bufferIndex] = $r + $g + $b > 350;
                }
            }

            //Draw out the CanvasPixelArray data:
            $this->drawContext->draw($this->canvasBuffer);

            if ($frameSkipAmount > 0) {
                //Decrement the frameskip counter:
                $this->frameCount -= $frameSkipAmount;
            }
        } else {
            //Reset the frameskip counter:
            $this->frameCount += $frameSkipAmount;
        }
    }

    public function invalidateAll($pal): void
    {
        $stop = ($pal + 1) * $this->tileCountInvalidator;
        for ($r = $pal * $this->tileCountInvalidator; $r < $stop; ++$r) {
            $this->tileData[$r] = null;
        }
    }

    public function setGBCPalettePre($address_, $data): void
    {
        if ($this->gbcRawPalette[$address_] === $data) {
            return;
        }

        $this->gbcRawPalette[$address_] = $data;
        if ($address_ >= 0x40 && ($address_ & 0x6) === 0) {
            // stay transparent
            return;
        }

        $value = ($this->gbcRawPalette[$address_ | 1] << 8) + $this->gbcRawPalette[$address_ & -2];
        $this->gbcPalette[$address_ >> 1] = 0x80000000 + (($value & 0x1F) << 19) + (($value & 0x3E0) << 6) + (($value & 0x7C00) >> 7);
        $this->invalidateAll($address_ >> 3);
    }

    public function setGBCPalette($address_, $data): void
    {
        $this->setGBCPalettePre($address_, $data);
        if (($address_ & 0x6) === 0) {
            $this->gbcPalette[$address_ >> 1] &= 0x00FFFFFF;
        }
    }

    public function decodePalette($startIndex, $data): void
    {
        if (!$this->isGameBoyColor()) {
            $this->gbPalette[$startIndex] = $this->colors[$data & 0x03] & 0x00FFFFFF; // color 0: transparent
            $this->gbPalette[$startIndex + 1] = $this->colors[($data >> 2) & 0x03];
            $this->gbPalette[$startIndex + 2] = $this->colors[($data >> 4) & 0x03];
            $this->gbPalette[$startIndex + 3] = $this->colors[$data >> 6];

            //@PHP - Need to copy the new palette
            $this->checkPaletteType();
        }
    }

    public function drawBackgroundForLine($line, $windowLeft, $priority)
    {
        $skippedTile = false;
        $tileNum = 0;
        $tileXCoord = 0;
        $tileAttrib = 0;
        $sourceY = $line + $this->memory->memory[0xFF42];
        $sourceImageLine = $sourceY & 0x7;
        $tileX = $this->memory->memory[0xFF43] >> 3;
        $memStart = (($this->gfxBackgroundY) ? 0x1C00 : 0x1800) + (($sourceY & 0xF8) << 2);
        $screenX = -($this->memory->memory[0xFF43] & 7);

        for (; $screenX < $windowLeft; $tileX++, $screenX += 8) {
            $tileXCoord = ($tileX & 0x1F);
            $baseaddr = $this->memory->memory[0x8000 + $memStart + $tileXCoord];
            $tileNum = ($this->gfxBackgroundX) ? $baseaddr : (($baseaddr > 0x7F) ? (($baseaddr & 0x7F) + 0x80) : ($baseaddr + 0x100));
            if ($this->isGameBoyColor()) {
                $mapAttrib = $this->memory->VRAM[$memStart + $tileXCoord];
                if (($mapAttrib & 0x80) !== $priority) {
                    $skippedTile = true;
                    continue;
                }

                $tileAttrib = (($mapAttrib & 0x07) << 2) + (($mapAttrib >> 5) & 0x03);
                $tileNum += 384 * (($mapAttrib >> 3) & 0x01); // tile vram bank
            }

            $this->drawPartCopy($tileNum, $screenX, $line, $sourceImageLine, $tileAttrib);
        }

        if ($windowLeft < 160) {
            // window!
            $windowStartAddress = ($this->gfxWindowY) ? 0x1C00 : 0x1800;
            $windowSourceTileY = $this->windowSourceLine >> 3;
            $tileAddress = $windowStartAddress + ($windowSourceTileY * 0x20);
            $windowSourceTileLine = $this->windowSourceLine & 0x7;
            for ($screenX = $windowLeft; $screenX < 160; $tileAddress++, $screenX += 8) {
                $baseaddr = $this->memory->memory[0x8000 + $tileAddress];
                $tileNum = ($this->gfxBackgroundX) ? $baseaddr : (($baseaddr > 0x7F) ? (($baseaddr & 0x7F) + 0x80) : ($baseaddr + 0x100));
                if ($this->isGameBoyColor()) {
                    $mapAttrib = $this->memory->VRAM[$tileAddress];
                    if (($mapAttrib & 0x80) !== $priority) {
                        $skippedTile = true;
                        continue;
                    }

                    $tileAttrib = (($mapAttrib & 0x07) << 2) + (($mapAttrib >> 5) & 0x03); // mirroring
                    $tileNum += 384 * (($mapAttrib >> 3) & 0x01); // tile vram bank
                }

                $this->drawPartCopy($tileNum, $screenX, $line, $windowSourceTileLine, $tileAttrib);
            }
        }

        return $skippedTile;
    }

    public function drawPartCopy($tileIndex, $x, $y, $sourceLine, $attribs): void
    {
        $image = $this->tileData[$tileIndex + $this->tileCount * $attribs] ?: $this->updateImage($tileIndex, $attribs);
        $dst = $x + $y * 160;
        $src = $sourceLine * 8;
        $dstEnd = ($x > 152) ? (($y + 1) * 160) : ($dst + 8);
        // adjust left
        if ($x < 0) {
            $dst -= $x;
            $src -= $x;
        }

        while ($dst < $dstEnd) {
            $this->frameBuffer[$dst++] = $image[$src++];
        }
    }

    public function checkPaletteType(): void
    {
        //Reference the correct palette ahead of time...
        $this->palette = ($this->isGameBoyColor()) ? $this->gbcPalette : (($this->config->getBoolean('enable_gb_colorize')) ? $this->gbColorizedPalette : $this->gbPalette);
    }

    public function updateImage($tileIndex, $attribs)
    {
        $address_ = $tileIndex + $this->tileCount * $attribs;
        $otherBank = ($tileIndex >= 384);
        $offset = $otherBank ? (($tileIndex - 384) << 4) : ($tileIndex << 4);
        $paletteStart = $attribs & 0xFC;
        $transparent = $attribs >= $this->transparentCutoff;
        $pixix = 0;
        $pixixdx = 1;
        $pixixdy = 0;
        $tempPix = Helpers::getPreinitializedArray(64, 0);
        if (($attribs & 2) !== 0) {
            $pixixdy = -16;
            $pixix = 56;
        }

        if (($attribs & 1) === 0) {
            $pixixdx = -1;
            $pixix += 7;
            $pixixdy += 16;
        }

        for ($y = 8; --$y >= 0;) {
            $num = $this->weaveLookup[$this->memory->VRAMReadGFX($offset++, $otherBank)] + ($this->weaveLookup[$this->memory->VRAMReadGFX($offset++, $otherBank)] << 1);
            if ($num !== 0) {
                $transparent = false;
            }

            for ($x = 8; --$x >= 0;) {
                $tempPix[$pixix] = $this->palette[$paletteStart + ($num & 3)] & -1;
                $pixix += $pixixdx;
                $num >>= 2;
            }

            $pixix += $pixixdy;
        }

        $this->tileData[$address_] = ($transparent) ? true : $tempPix;

        $this->tileReadState[$tileIndex] = 1;

        return $this->tileData[$address_];
    }

    public function drawSpritesForLine($line): void
    {
        if (!$this->gfxSpriteShow) {
            return;
        }

        $minSpriteY = $line - (($this->gfxSpriteDouble) ? 15 : 7);
        // either only do priorityFlag === 0 (all foreground),
        // or first 0x80 (background) and then 0 (foreground)
        $priorityFlag = $this->spritePriorityEnabled ? 0x80 : 0;
        for (; $priorityFlag >= 0; $priorityFlag -= 0x80) {
            $oamIx = 159;
            while ($oamIx >= 0) {
                $attributes = 0xFF & $this->memory->memory[0xFE00 + $oamIx--];
                if (($attributes & 0x80) === $priorityFlag || !$this->spritePriorityEnabled) {
                    $tileNum = (0xFF & $this->memory->memory[0xFE00 + $oamIx--]);
                    $spriteX = (0xFF & $this->memory->memory[0xFE00 + $oamIx--]) - 8;
                    $spriteY = (0xFF & $this->memory->memory[0xFE00 + $oamIx--]) - 16;
                    $offset = $line - $spriteY;
                    if ($spriteX >= 160 || $spriteY < $minSpriteY || $offset < 0) {
                        continue;
                    }

                    if ($this->gfxSpriteDouble) {
                        $tileNum &= 0xFE;
                    }

                    $spriteAttrib = ($attributes >> 5) & 0x03; // flipx: from bit 0x20 to 0x01, flipy: from bit 0x40 to 0x02
                    if ($this->isGameBoyColor()) {
                        $spriteAttrib += 0x20 + (($attributes & 0x07) << 2); // palette
                        $tileNum += (384 >> 3) * ($attributes & 0x08); // tile vram bank
                    } else {
                        // attributes 0x10: 0x00 = OBJ1 palette, 0x10 = OBJ2 palette
                        // spriteAttrib: 0x04: OBJ1 palette, 0x08: OBJ2 palette
                        $spriteAttrib += 0x4 + (($attributes & 0x10) >> 2);
                    }

                    if ($priorityFlag === 0x80) {
                        // background
                        if ($this->gfxSpriteDouble) {
                            if (($spriteAttrib & 2) !== 0) {
                                $this->drawPartBgSprite(($tileNum | 1) - ($offset >> 3), $spriteX, $line, $offset & 7, $spriteAttrib);
                            } else {
                                $this->drawPartBgSprite(($tileNum & -2) + ($offset >> 3), $spriteX, $line, $offset & 7, $spriteAttrib);
                            }
                        } else {
                            $this->drawPartBgSprite($tileNum, $spriteX, $line, $offset, $spriteAttrib);
                        }
                    } elseif ($this->gfxSpriteDouble) {
                        // foreground
                        if (($spriteAttrib & 2) !== 0) {
                            $this->drawPartFgSprite(($tileNum | 1) - ($offset >> 3), $spriteX, $line, $offset & 7, $spriteAttrib);
                        } else {
                            $this->drawPartFgSprite(($tileNum & -2) + ($offset >> 3), $spriteX, $line, $offset & 7, $spriteAttrib);
                        }
                    } else {
                        $this->drawPartFgSprite($tileNum, $spriteX, $line, $offset, $spriteAttrib);
                    }
                } else {
                    $oamIx -= 3;
                }
            }
        }
    }

    public function drawPartFgSprite($tileIndex, $x, $y, $sourceLine, $attribs): void
    {
        $im = $this->tileData[$tileIndex + $this->tileCount * $attribs] ?: $this->updateImage($tileIndex, $attribs);
        if ($im === true) {
            return;
        }

        $dst = $x + $y * 160;
        $src = $sourceLine * 8;
        $dstEnd = ($x > 152) ? (($y + 1) * 160) : ($dst + 8);
        // adjust left
        if ($x < 0) {
            $dst -= $x;
            $src -= $x;
        }

        while ($dst < $dstEnd) {
            $this->frameBuffer[$dst] = $im[$src];
            ++$dst;
            ++$src;
        }
    }

    public function drawPartBgSprite($tileIndex, $x, $y, $sourceLine, $attribs): void
    {
        $im = $this->tileData[$tileIndex + $this->tileCount * $attribs] ?: $this->updateImage($tileIndex, $attribs);
        if ($im === true) {
            return;
        }

        $dst = $x + $y * 160;
        $src = $sourceLine * 8;
        $dstEnd = ($x > 152) ? (($y + 1) * 160) : ($dst + 8);
        // adjust left
        if ($x < 0) {
            $dst -= $x;
            $src -= $x;
        }

        while ($dst < $dstEnd) {
            //if ($im[$src] < 0 && $this->frameBuffer[$dst] >= 0) {
            $this->frameBuffer[$dst] = $im[$src];
            // }
            ++$dst;
            ++$src;
        }
    }
}
