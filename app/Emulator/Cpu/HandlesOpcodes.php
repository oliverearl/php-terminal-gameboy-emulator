<?php

namespace App\Emulator\Cpu;

use App\Emulator\Helpers;
use App\Exceptions\Cpu\HaltOverrunException;
use Exception;

/** @mixin \App\Emulator\Cpu\Cpu */
trait HandlesOpcodes
{
    /**
     * Runs a given opcode.
     *
     * @throws \Exception
     */
    public function runOpcode(int $address): void
    {
        match ($address) {
            1 => $this->opcode1(), 2 => $this->opcode2(), 3 => $this->opcode3(),
            4 => $this->opcode4(), 5 => $this->opcode5(), 6 => $this->opcode6(),
            7 => $this->opcode7(), 8 => $this->opcode8(), 9 => $this->opcode9(),
            10 => $this->opcode10(), 11 => $this->opcode11(), 12 => $this->opcode12(),
            13 => $this->opcode13(), 14 => $this->opcode14(), 15 => $this->opcode15(),
            16 => $this->opcode16(), 17 => $this->opcode17(), 18 => $this->opcode18(),
            19 => $this->opcode19(), 20 => $this->opcode20(), 21 => $this->opcode21(),
            22 => $this->opcode22(), 23 => $this->opcode23(), 24 => $this->opcode24(),
            25 => $this->opcode25(), 26 => $this->opcode26(), 27 => $this->opcode27(),
            28 => $this->opcode28(), 29 => $this->opcode29(), 30 => $this->opcode30(),
            31 => $this->opcode31(), 32 => $this->opcode32(), 33 => $this->opcode33(),
            34 => $this->opcode34(), 35 => $this->opcode35(), 36 => $this->opcode36(),
            37 => $this->opcode37(), 38 => $this->opcode38(), 39 => $this->opcode39(),
            40 => $this->opcode40(), 41 => $this->opcode41(), 42 => $this->opcode42(),
            43 => $this->opcode43(), 44 => $this->opcode44(), 45 => $this->opcode45(),
            46 => $this->opcode46(), 47 => $this->opcode47(), 48 => $this->opcode48(),
            49 => $this->opcode49(), 50 => $this->opcode50(), 51 => $this->opcode51(),
            52 => $this->opcode52(), 53 => $this->opcode53(), 54 => $this->opcode54(),
            55 => $this->opcode55(), 56 => $this->opcode56(), 57 => $this->opcode57(),
            58 => $this->opcode58(), 59 => $this->opcode59(), 60 => $this->opcode60(),
            61 => $this->opcode61(), 62 => $this->opcode62(), 63 => $this->opcode63(),
            64 => $this->opcode64(), 65 => $this->opcode65(), 66 => $this->opcode66(),
            67 => $this->opcode67(), 68 => $this->opcode68(), 69 => $this->opcode69(),
            70 => $this->opcode70(), 71 => $this->opcode71(), 72 => $this->opcode72(),
            73 => $this->opcode73(), 74 => $this->opcode74(), 75 => $this->opcode75(),
            76 => $this->opcode76(), 77 => $this->opcode77(), 78 => $this->opcode78(),
            79 => $this->opcode79(), 80 => $this->opcode80(), 81 => $this->opcode81(),
            82 => $this->opcode82(), 83 => $this->opcode83(), 84 => $this->opcode84(),
            85 => $this->opcode85(), 86 => $this->opcode86(), 87 => $this->opcode87(),
            88 => $this->opcode88(), 89 => $this->opcode89(), 90 => $this->opcode90(),
            91 => $this->opcode91(), 92 => $this->opcode92(), 93 => $this->opcode93(),
            94 => $this->opcode94(), 95 => $this->opcode95(), 96 => $this->opcode96(),
            97 => $this->opcode97(), 98 => $this->opcode98(), 99 => $this->opcode99(),
            100 => $this->opcode100(), 101 => $this->opcode101(), 102 => $this->opcode102(),
            103 => $this->opcode103(), 104 => $this->opcode104(), 105 => $this->opcode105(),
            106 => $this->opcode106(), 107 => $this->opcode107(), 108 => $this->opcode108(),
            109 => $this->opcode109(), 110 => $this->opcode110(), 111 => $this->opcode111(),
            112 => $this->opcode112(), 113 => $this->opcode113(), 114 => $this->opcode114(),
            115 => $this->opcode115(), 116 => $this->opcode116(), 117 => $this->opcode117(),
            118 => $this->opcode118(), 119 => $this->opcode119(), 120 => $this->opcode120(),
            121 => $this->opcode121(), 122 => $this->opcode122(), 123 => $this->opcode123(),
            124 => $this->opcode124(), 125 => $this->opcode125(), 126 => $this->opcode126(),
            127 => $this->opcode127(), 128 => $this->opcode128(), 129 => $this->opcode129(),
            130 => $this->opcode130(), 131 => $this->opcode131(), 132 => $this->opcode132(),
            133 => $this->opcode133(), 134 => $this->opcode134(), 135 => $this->opcode135(),
            136 => $this->opcode136(), 137 => $this->opcode137(), 138 => $this->opcode138(),
            139 => $this->opcode139(), 140 => $this->opcode140(), 141 => $this->opcode141(),
            142 => $this->opcode142(), 143 => $this->opcode143(), 144 => $this->opcode144(),
            145 => $this->opcode145(), 146 => $this->opcode146(), 147 => $this->opcode147(),
            148 => $this->opcode148(), 149 => $this->opcode149(), 150 => $this->opcode150(),
            151 => $this->opcode151(), 152 => $this->opcode152(), 153 => $this->opcode153(),
            154 => $this->opcode154(), 155 => $this->opcode155(), 156 => $this->opcode156(),
            157 => $this->opcode157(), 158 => $this->opcode158(), 159 => $this->opcode159(),
            160 => $this->opcode160(), 161 => $this->opcode161(), 162 => $this->opcode162(),
            163 => $this->opcode163(), 164 => $this->opcode164(), 165 => $this->opcode165(),
            166 => $this->opcode166(), 167 => $this->opcode167(), 168 => $this->opcode168(),
            169 => $this->opcode169(), 170 => $this->opcode170(), 171 => $this->opcode171(),
            172 => $this->opcode172(), 173 => $this->opcode173(), 174 => $this->opcode174(),
            175 => $this->opcode175(), 176 => $this->opcode176(), 177 => $this->opcode177(),
            178 => $this->opcode178(), 179 => $this->opcode179(), 180 => $this->opcode180(),
            181 => $this->opcode181(), 182 => $this->opcode182(), 183 => $this->opcode183(),
            184 => $this->opcode184(), 185 => $this->opcode185(), 186 => $this->opcode186(),
            187 => $this->opcode187(), 188 => $this->opcode188(), 189 => $this->opcode189(),
            190 => $this->opcode190(), 191 => $this->opcode191(), 192 => $this->opcode192(),
            193 => $this->opcode193(), 194 => $this->opcode194(), 195 => $this->opcode195(),
            196 => $this->opcode196(), 197 => $this->opcode197(), 198 => $this->opcode198(),
            199 => $this->opcode199(), 200 => $this->opcode200(), 201 => $this->opcode201(),
            202 => $this->opcode202(), 203 => $this->opcode203(), 204 => $this->opcode204(),
            205 => $this->opcode205(), 206 => $this->opcode206(), 207 => $this->opcode207(),
            208 => $this->opcode208(), 209 => $this->opcode209(), 210 => $this->opcode210(),
            211 => $this->opcode211(), 212 => $this->opcode212(), 213 => $this->opcode213(),
            214 => $this->opcode214(), 215 => $this->opcode215(), 216 => $this->opcode216(),
            217 => $this->opcode217(), 218 => $this->opcode218(), 219 => $this->opcode219(),
            220 => $this->opcode220(), 221 => $this->opcode221(), 222 => $this->opcode222(),
            223 => $this->opcode223(), 224 => $this->opcode224(), 225 => $this->opcode225(),
            226 => $this->opcode226(), 227 => $this->opcode227(), 228 => $this->opcode228(),
            229 => $this->opcode229(), 230 => $this->opcode230(), 231 => $this->opcode231(),
            232 => $this->opcode232(), 233 => $this->opcode233(), 234 => $this->opcode234(),
            235 => $this->opcode235(), 236 => $this->opcode236(), 237 => $this->opcode237(),
            238 => $this->opcode238(), 239 => $this->opcode239(), 240 => $this->opcode240(),
            241 => $this->opcode241(), 242 => $this->opcode242(), 243 => $this->opcode243(),
            244 => $this->opcode244(), 245 => $this->opcode245(), 246 => $this->opcode246(),
            247 => $this->opcode247(), 248 => $this->opcode248(), 249 => $this->opcode249(),
            250 => $this->opcode250(), 251 => $this->opcode251(), 252 => $this->opcode252(),
            253 => $this->opcode253(), 254 => $this->opcode254(), 255 => $this->opcode255(),
            default => $this->opcode0(),
        };
    }

    /**
     * Opcode #0x00.
     *
     * NOP
     */
    private function opcode0(): void
    {
        // Do Nothing...
    }

    /**
     * Opcode #0x01.
     *
     * LD BC, nn
     */
    private function opcode1(): void
    {
        $this->registerC = $this->memoryRead($this->programCounter);
        $this->registerB = $this->memoryRead(($this->programCounter + 1) & 0xFFFF);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x02.
     *
     * LD (BC), A
     */
    private function opcode2(): void
    {
        $this->writeMemory(($this->registerB << 8) + $this->registerC, $this->registerA);
    }

    /**
     * Opcode #0x03.
     *
     * INC BC
     */
    private function opcode3(): void
    {
        $temp_var = ((($this->registerB << 8) + $this->registerC) + 1);
        $this->registerB = (($temp_var >> 8) & 0xFF);
        $this->registerC = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x04.
     *
     * INC B
     */
    private function opcode4(): void
    {
        $this->registerB = (($this->registerB + 1) & 0xFF);
        $this->FZero = ($this->registerB === 0);
        $this->FHalfCarry = (($this->registerB & 0xF) === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x05.
     *
     * DEC B
     */
    private function opcode5(): void
    {
        $this->registerB = Helpers::unsbtub($this->registerB - 1);
        $this->FZero = ($this->registerB === 0);
        $this->FHalfCarry = (($this->registerB & 0xF) === 0xF);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x06.
     *
     * LD B, n
     */
    private function opcode6(): void
    {
        $this->registerB = $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x07.
     *
     * RCLA
     */
    private function opcode7(): void
    {
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) | ($this->registerA >> 7);
        $this->FZero = false;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x08
     *
     * LD (nn), SP
     */
    private function opcode8(): void
    {
        $temp_var = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
        $this->writeMemory($temp_var, $this->stackPointer & 0xFF);
        $this->writeMemory(($temp_var + 1) & 0xFFFF, $this->stackPointer >> 8);

        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x09.
     *
     * ADD HL, BC
     */
    private function opcode9(): void
    {
        $n2 = ($this->registerB << 8) + $this->registerC;
        $dirtySum = $this->registersHL + $n2;
        $this->FHalfCarry = (($this->registersHL & 0xFFF) + ($n2 & 0xFFF) > 0xFFF);
        $this->FCarry = ($dirtySum > 0xFFFF);
        $this->registersHL = ($dirtySum & 0xFFFF);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x0A.
     *
     * LD A, (BC)
     */
    private function opcode10(): void
    {
        $this->registerA = $this->memoryRead(($this->registerB << 8) + $this->registerC);
    }

    /**
     * Opcode #0x0B.
     *
     * DEC BC
     */
    private function opcode11(): void
    {
        $temp_var = Helpers::unswtuw((($this->registerB << 8) + $this->registerC) - 1);
        $this->registerB = ($temp_var >> 8);
        $this->registerC = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x0C
     *
     * INC C
     */
    private function opcode12(): void
    {
        $this->registerC = (($this->registerC + 1) & 0xFF);
        $this->FZero = ($this->registerC === 0);
        $this->FHalfCarry = (($this->registerC & 0xF) === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x0D.
     *
     * DEC C
     */
    private function opcode13(): void
    {
        $this->registerC = Helpers::unsbtub($this->registerC - 1);
        $this->FZero = ($this->registerC === 0);
        $this->FHalfCarry = (($this->registerC & 0xF) === 0xF);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x0E.
     *
     * LD C, n
     */
    private function opcode14(): void
    {
        $this->registerC = $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x0F.
     *
     * RRCA
     */
    private function opcode15(): void
    {
        $this->FCarry = (($this->registerA & 1) === 1);
        $this->registerA = ($this->registerA >> 1) + (($this->registerA & 1) << 7);
        $this->FZero = false;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x10.
     *
     * STOP
     */
    private function opcode16(): void
    {
        /*TODO: Emulate the speed switch delay:
          Delay Amount:
          16 ms when going to double-speed.
          32 ms when going to single-speed.
          Also, bits 4 and 5 of 0xFF00 should read as set (1), while the switch is in process.
           */
        // Speed change requested.
        if ($this->cGBC && ($this->memory[0xFF4D] & 0x01) === 0x01) {
            //Go back to single speed mode.
            if (($this->memory[0xFF4D] & 0x80) === 0x80) {
                // cout("Going into single clock speed mode.", 0);
                $this->multiplier = 1; //TODO: Move this into the delay done code.
                $this->memory[0xFF4D] &= 0x7F; //Clear the double speed mode flag.
                //Go to double speed mode.
            } else {
                // cout("Going into double clock speed mode.", 0);
                $this->multiplier = 2; //TODO: Move this into the delay done code.
                $this->memory[0xFF4D] |= 0x80; //Set the double speed mode flag.
            }

            $this->memory[0xFF4D] &= 0xFE;
            //Reset the request bit.
        }
    }

    /**
     * Opcode #0x11.
     *
     * LD DE, nn
     */
    private function opcode17(): void
    {
        $this->registerE = $this->memoryRead($this->programCounter);
        $this->registerD = $this->memoryRead(($this->programCounter + 1) & 0xFFFF);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x12.
     *
     * LD (DE), A
     */
    private function opcode18(): void
    {
        $this->writeMemory(($this->registerD << 8) + $this->registerE, $this->registerA);
    }

    /**
     * Opcode #0x13.
     *
     * INC DE
     */
    private function opcode19(): void
    {
        $temp_var = ((($this->registerD << 8) + $this->registerE) + 1);
        $this->registerD = (($temp_var >> 8) & 0xFF);
        $this->registerE = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x14.
     *
     * INC D
     */
    private function opcode20(): void
    {
        $this->registerD = (($this->registerD + 1) & 0xFF);
        $this->FZero = ($this->registerD === 0);
        $this->FHalfCarry = (($this->registerD & 0xF) === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x15.
     *
     * DEC D
     */
    private function opcode21(): void
    {
        $this->registerD = Helpers::unsbtub($this->registerD - 1);
        $this->FZero = ($this->registerD === 0);
        $this->FHalfCarry = (($this->registerD & 0xF) === 0xF);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x16.
     *
     * LD D, n
     */
    private function opcode22(): void
    {
        $this->registerD = $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x17.
     *
     * RLA
     */
    private function opcode23(): void
    {
        $carry_flag = ($this->FCarry) ? 1 : 0;
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) | $carry_flag;
        $this->FZero = false;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x18.
     *
     * JR n
     */
    private function opcode24(): void
    {
        $this->programCounter = Helpers::nswtuw($this->programCounter + Helpers::usbtsb($this->memoryRead($this->programCounter)) + 1);
    }

    /**
     * Opcode #0x19.
     *
     * ADD HL, DE
     */
    private function opcode25(): void
    {
        $n2 = ($this->registerD << 8) + $this->registerE;
        $dirtySum = $this->registersHL + $n2;
        $this->FHalfCarry = (($this->registersHL & 0xFFF) + ($n2 & 0xFFF) > 0xFFF);
        $this->FCarry = ($dirtySum > 0xFFFF);
        $this->registersHL = ($dirtySum & 0xFFFF);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x1A.
     *
     * LD A, (DE)
     */
    private function opcode26(): void
    {
        $this->registerA = $this->memoryRead(($this->registerD << 8) + $this->registerE);
    }

    /**
     * Opcode #0x1B.
     *
     * DEC DE
     */
    private function opcode27(): void
    {
        $temp_var = Helpers::unswtuw((($this->registerD << 8) + $this->registerE) - 1);
        $this->registerD = ($temp_var >> 8);
        $this->registerE = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x1C.
     *
     * INC E
     */
    private function opcode28(): void
    {
        $this->registerE = (($this->registerE + 1) & 0xFF);
        $this->FZero = ($this->registerE === 0);
        $this->FHalfCarry = (($this->registerE & 0xF) === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x1D.
     *
     * DEC E
     */
    private function opcode29(): void
    {
        $this->registerE = Helpers::unsbtub($this->registerE - 1);
        $this->FZero = ($this->registerE === 0);
        $this->FHalfCarry = (($this->registerE & 0xF) === 0xF);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x1E.
     *
     * LD E, n
     */
    private function opcode30(): void
    {
        $this->registerE = $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x1F.
     *
     * RRA
     */
    private function opcode31(): void
    {
        $carry_flag = ($this->FCarry) ? 0x80 : 0;
        $this->FCarry = (($this->registerA & 1) === 1);
        $this->registerA = ($this->registerA >> 1) + $carry_flag;
        $this->FZero = false;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x20.
     *
     * JR cc, n
     */
    private function opcode32(): void
    {
        if (!$this->FZero) {
            $this->programCounter = Helpers::nswtuw($this->programCounter + Helpers::usbtsb($this->memoryRead($this->programCounter)) + 1);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x21.
     *
     * LD HL, nn
     */
    private function opcode33(): void
    {
        $this->registersHL = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x22.
     *
     * LDI (HL), A
     */
    private function opcode34(): void
    {
        $this->writeMemory($this->registersHL, $this->registerA);
        $this->registersHL = (($this->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x23.
     *
     * INC HL
     */
    private function opcode35(): void
    {
        $this->registersHL = (($this->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x24.
     *
     * INC H
     */
    private function opcode36(): void
    {
        $H = ((($this->registersHL >> 8) + 1) & 0xFF);
        $this->FZero = ($H === 0);
        $this->FHalfCarry = (($H & 0xF) === 0);
        $this->FSubtract = false;
        $this->registersHL = ($H << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x25.
     *
     * DEC H
     */
    private function opcode37(): void
    {
        $H = Helpers::unsbtub(($this->registersHL >> 8) - 1);
        $this->FZero = ($H === 0);
        $this->FHalfCarry = (($H & 0xF) === 0xF);
        $this->FSubtract = true;
        $this->registersHL = ($H << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x26.
     *
     * LD H, n
     */
    private function opcode38(): void
    {
        $this->registersHL = ($this->memoryRead($this->programCounter) << 8) + ($this->registersHL & 0xFF);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x27.
     *
     * DAA
     */
    private function opcode39(): void
    {
        $temp_var = $this->registerA;
        if ($this->FCarry) {
            $temp_var |= 0x100;
        }

        if ($this->FHalfCarry) {
            $temp_var |= 0x200;
        }

        if ($this->FSubtract) {
            $temp_var |= 0x400;
        }

        $this->registerA = ($temp_var = self::DAA_TABLE[$temp_var]) >> 8;
        $this->FZero = (($temp_var & 0x80) === 0x80);
        $this->FSubtract = (($temp_var & 0x40) === 0x40);
        $this->FHalfCarry = (($temp_var & 0x20) === 0x20);
        $this->FCarry = (($temp_var & 0x10) === 0x10);
    }

    /**
     * Opcode #0x28.
     *
     * JR cc, n
     */
    private function opcode40(): void
    {
        if ($this->FZero) {
            $this->programCounter = Helpers::nswtuw($this->programCounter + Helpers::usbtsb($this->memoryRead($this->programCounter)) + 1);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x29.
     *
     * ADD HL, HL
     */
    private function opcode41(): void
    {
        ;
        $this->FHalfCarry = (($this->registersHL & 0xFFF) > 0x7FF);
        $this->FCarry = ($this->registersHL > 0x7FFF);
        $this->registersHL = ((2 * $this->registersHL) & 0xFFFF);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x2A.
     *
     * LDI A, (HL)
     */
    private function opcode42(): void
    {
        $this->registerA = $this->memoryRead($this->registersHL);
        $this->registersHL = (($this->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x2B.
     *
     * DEC HL
     */
    private function opcode43(): void
    {
        $this->registersHL = Helpers::unswtuw($this->registersHL - 1);
    }

    /**
     * Opcode #0x2C.
     *
     * INC L
     */
    private function opcode44(): void
    {
        $L = (($this->registersHL + 1) & 0xFF);
        $this->FZero = ($L === 0);
        $this->FHalfCarry = (($L & 0xF) === 0);
        $this->FSubtract = false;
        $this->registersHL = ($this->registersHL & 0xFF00) + $L;
    }

    /**
     * Opcode #0x2D.
     *
     * DEC L
     */
    private function opcode45(): void
    {
        $L = Helpers::unsbtub(($this->registersHL & 0xFF) - 1);
        $this->FZero = ($L === 0);
        $this->FHalfCarry = (($L & 0xF) === 0xF);
        $this->FSubtract = true;
        $this->registersHL = ($this->registersHL & 0xFF00) + $L;
    }

    /**
     * Opcode #0x2E.
     *
     * LD L, n
     */
    private function opcode46(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x2F.
     *
     * CPL
     */
    private function opcode47(): void
    {
        $this->registerA ^= 0xFF;
        $this->FSubtract = true;
        $this->FHalfCarry = true;
    }

    /**
     * Opcode #0x30.
     *
     * JR cc, n
     */
    private function opcode48(): void
    {
        if (!$this->FCarry) {
            $this->programCounter = Helpers::nswtuw($this->programCounter + Helpers::usbtsb($this->memoryRead($this->programCounter)) + 1);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x31.
     *
     * LD SP, nn
     */
    private function opcode49(): void
    {
        $this->stackPointer = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x32.
     *
     * LDD (HL), A
     */
    private function opcode50(): void
    {
        $this->writeMemory($this->registersHL, $this->registerA);
        $this->registersHL = Helpers::unswtuw($this->registersHL - 1);
    }

    /**
     * Opcode #0x33.
     *
     * INC SP
     */
    private function opcode51(): void
    {
        $this->stackPointer = ($this->stackPointer + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x34.
     *
     * INC (HL)
     */
    private function opcode52(): void
    {
        $temp_var = (($this->memoryRead($this->registersHL) + 1) & 0xFF);
        $this->FZero = ($temp_var === 0);
        $this->FHalfCarry = (($temp_var & 0xF) === 0);
        $this->FSubtract = false;
        $this->writeMemory($this->registersHL, $temp_var);
    }

    /**
     * Opcode #0x35.
     *
     * DEC (HL)
     */
    private function opcode53(): void
    {
        $temp_var = Helpers::unsbtub($this->memoryRead($this->registersHL) - 1);
        $this->FZero = ($temp_var === 0);
        $this->FHalfCarry = (($temp_var & 0xF) === 0xF);
        $this->FSubtract = true;
        $this->writeMemory($this->registersHL, $temp_var);
    }

    /**
     * Opcode #0x36.
     *
     * LD (HL), n
     */
    private function opcode54(): void
    {
        $this->writeMemory($this->registersHL, $this->memoryRead($this->programCounter));
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x37.
     *
     * SCF
     */
    private function opcode55(): void
    {
        $this->FCarry = true;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x38.
     *
     * JR cc, n
     */
    private function opcode56(): void
    {
        if ($this->FCarry) {
            $this->programCounter = Helpers::nswtuw($this->programCounter + Helpers::usbtsb($this->memoryRead($this->programCounter)) + 1);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x39.
     *
     * ADD HL, SP
     */
    private function opcode57(): void
    {
        $dirtySum = $this->registersHL + $this->stackPointer;
        $this->FHalfCarry = (($this->registersHL & 0xFFF) + ($this->stackPointer & 0xFFF) > 0xFFF);
        $this->FCarry = ($dirtySum > 0xFFFF);
        $this->registersHL = ($dirtySum & 0xFFFF);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x3A.
     *
     *  LDD A, (HL)
     */
    private function opcode58(): void
    {
        $this->registerA = $this->memoryRead($this->registersHL);
        $this->registersHL = Helpers::unswtuw($this->registersHL - 1);
    }

    /**
     * Opcode #0x3B.
     *
     * DEC SP
     */
    private function opcode59(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
    }

    /**
     * Opcode #0x3C.
     *
     * INC A
     */
    private function opcode60(): void
    {
        $this->registerA = (($this->registerA + 1) & 0xFF);
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = (($this->registerA & 0xF) === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x3D.
     *
     * DEC A
     */
    private function opcode61(): void
    {
        $this->registerA = Helpers::unsbtub($this->registerA - 1);
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = (($this->registerA & 0xF) === 0xF);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x3E.
     *
     * LD A, n
     */
    private function opcode62(): void
    {
        $this->registerA = $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x3F.
     *
     * CCF
     */
    private function opcode63(): void
    {
        $this->FCarry = !$this->FCarry;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0x40.
     *
     * LD B, B
     */
    private function opcode64(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x41.
     *
     * LD B, C
     */
    private function opcode65(): void
    {
        $this->registerB = $this->registerC;
    }

    /**
     * Opcode #0x42.
     *
     * LD B, D
     */
    private function opcode66(): void
    {
        $this->registerB = $this->registerD;
    }

    /**
     * Opcode #0x43.
     *
     * LD B, E
     */
    private function opcode67(): void
    {
        $this->registerB = $this->registerE;
    }

    /**
     * Opcode #0x44.
     *
     * LD B, H
     */
    private function opcode68(): void
    {
        $this->registerB = ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x45.
     *
     * LD B, L
     */
    private function opcode69(): void
    {
        $this->registerB = ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x46.
     *
     * LD B, (HL)
     */
    private function opcode70(): void
    {
        $this->registerB = $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x47.
     *
     * LD B, A
     */
    private function opcode71(): void
    {
        $this->registerB = $this->registerA;
    }

    /**
     * Opcode #0x48.
     *
     * LD C, B
     */
    private function opcode72(): void
    {
        $this->registerC = $this->registerB;
    }

    /**
     * Opcode #0x49.
     *
     * LD C, C
     */
    private function opcode73(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x4A.
     *
     * LD C, D
     */
    private function opcode74(): void
    {
        $this->registerC = $this->registerD;
    }

    /**
     * Opcode #0x4B.
     *
     * LD C, E
     */
    private function opcode75(): void
    {
        $this->registerC = $this->registerE;
    }

    /**
     * Opcode #0x4C.
     *
     * LD C, H
     */
    private function opcode76(): void
    {
        $this->registerC = ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x4D.
     *
     * LD C, L
     */
    private function opcode77(): void
    {
        $this->registerC = ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x4E.
     *
     * LD C, (HL)
     */
    private function opcode78(): void
    {
        $this->registerC = $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x4F.
     *
     * LD C, A
     */
    private function opcode79(): void
    {
        $this->registerC = $this->registerA;
    }

    /**
     * Opcode #0x50.
     *
     * LD D, B
     */
    private function opcode80(): void
    {
        $this->registerD = $this->registerB;
    }

    /**
     * Opcode #0x51.
     *
     * LD D, C
     */
    private function opcode81(): void
    {
        $this->registerD = $this->registerC;
    }

    /**
     * Opcode #0x52.
     *
     * LD D, D
     */
    private function opcode82(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x53.
     *
     * LD D, E
     */
    private function opcode83(): void
    {
        $this->registerD = $this->registerE;
    }

    /**
     * Opcode #0x54.
     *
     * LD D, H
     */
    private function opcode84(): void
    {
        $this->registerD = ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x55.
     *
     * LD D, L
     */
    private function opcode85(): void
    {
        $this->registerD = ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x56.
     *
     * LD D, (HL)
     */
    private function opcode86(): void
    {
        $this->registerD = $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x57.
     *
     * LD D, A
     */
    private function opcode87(): void
    {
        $this->registerD = $this->registerA;
    }

    /**
     * Opcode #0x58.
     *
     * LD E, B
     */
    private function opcode88(): void
    {
        $this->registerE = $this->registerB;
    }

    /**
     * Opcode #0x59.
     *
     * LD E, C
     */
    private function opcode89(): void
    {
        $this->registerE = $this->registerC;
    }

    /**
     * Opcode #0x5A.
     *
     * LD E, D
     */
    private function opcode90(): void
    {
        $this->registerE = $this->registerD;
    }

    /**
     * Opcode #0x5B.
     *
     * LD E, E
     */
    private function opcode91(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x5C.
     *
     * LD E, H
     */
    private function opcode92(): void
    {
        $this->registerE = ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x5D.
     *
     * LD E, L
     */
    private function opcode93(): void
    {
        $this->registerE = ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x5E.
     *
     * LD E, (HL)
     */
    private function opcode94(): void
    {
        $this->registerE = $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x5F.
     *
     * LD E, A
     */
    private function opcode95(): void
    {
        $this->registerE = $this->registerA;
    }

    /**
     * Opcode #0x60.
     *
     * LD H, B
     */
    private function opcode96(): void
    {
        $this->registersHL = ($this->registerB << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x61.
     *
     * LD H, C
     */
    private function opcode97(): void
    {
        $this->registersHL = ($this->registerC << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x62.
     *
     * LD H, D
     */
    private function opcode98(): void
    {
        $this->registersHL = ($this->registerD << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x63.
     *
     * LD H, E
     */
    private function opcode99(): void
    {
        $this->registersHL = ($this->registerE << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x64.
     *
     * LD H, H
     */
    private function opcode100(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x65.
     *
     * LD H, L
     */
    private function opcode101(): void
    {
        $this->registersHL = (($this->registersHL & 0xFF) << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x66.
     *
     * LD H, (HL)
     */
    private function opcode102(): void
    {
        $this->registersHL = ($this->memoryRead($this->registersHL) << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x67.
     *
     * LD H, A
     */
    private function opcode103(): void
    {
        $this->registersHL = ($this->registerA << 8) + ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x68.
     *
     * LD L, B
     */
    private function opcode104(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->registerB;
    }

    /**
     * Opcode #0x69.
     *
     * LD L, C
     */
    private function opcode105(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->registerC;
    }

    /**
     * Opcode #0x6A.
     *
     * LD L, D
     */
    private function opcode106(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->registerD;
    }

    /**
     * Opcode #0x6B.
     *
     * LD L, E
     */
    private function opcode107(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->registerE;
    }

    /**
     * Opcode #0x6C.
     *
     * LD L, H
     */
    private function opcode108(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x6D.
     *
     * LD L, L
     */
    private function opcode109(): void
    {
        //Do nothing...
    }

    /**
     * Opcode #0x6E.
     *
     * LD L, (HL)
     */
    private function opcode110(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x6F.
     *
     * LD L, A
     */
    private function opcode111(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + $this->registerA;
    }

    /**
     * Opcode #0x70.
     *
     * LD (HL), B
     */
    private function opcode112(): void
    {
        $this->writeMemory($this->registersHL, $this->registerB);
    }

    /**
     * Opcode #0x71.
     *
     * LD (HL), C
     */
    private function opcode113(): void
    {
        $this->writeMemory($this->registersHL, $this->registerC);
    }

    /**
     * Opcode #0x72.
     *
     * LD (HL), D
     */
    private function opcode114(): void
    {
        $this->writeMemory($this->registersHL, $this->registerD);
    }

    /**
     * Opcode #0x73.
     *
     * LD (HL), E
     */
    private function opcode115(): void
    {
        $this->writeMemory($this->registersHL, $this->registerE);
    }

    /**
     * Opcode #0x74.
     *
     * LD (HL), H
     */
    private function opcode116(): void
    {
        $this->writeMemory($this->registersHL, ($this->registersHL >> 8));
    }

    /**
     * Opcode #0x75.
     *
     * LD (HL), L
     */
    private function opcode117(): void
    {
        $this->writeMemory($this->registersHL, ($this->registersHL & 0xFF));
    }

    private function halt(): void
    {
        $this->opcode118();
    }

    /**
     * Opcode #0x76.
     *
     * HALT
     *
     * @throws Exception
     */
    private function opcode118(): void
    {
        if ($this->untilEnable === 1) {
            /*VBA-M says this fixes Torpedo Range (Seems to work):
            Involves an edge case where an EI is placed right before a HALT.
            EI in this case actually is immediate, so we adjust (Hacky?).*/
            $this->programCounter = Helpers::nswtuw($this->programCounter - 1);
        } else {
            if (!$this->halt && !$this->IME && !$this->cGBC && ($this->memory[0xFF0F] & $this->memory[0xFFFF] & 0x1F) > 0) {
                $this->skipPCIncrement = true;
            }

            $this->halt = true;
            while ($this->halt && ($this->stopEmulator & 1) === 0) {
                /*We're hijacking the main interpreter loop to do this dirty business
                in order to not slow down the main interpreter loop code with halt state handling.*/
                $bitShift = 0;
                $testbit = 1;
                $interrupts = $this->memory[0xFFFF] & $this->memory[0xFF0F];
                while ($bitShift < 5) {
                    //Check to see if an interrupt is enabled AND requested.
                    if (($testbit & $interrupts) === $testbit) {
                        $this->halt = false; //Get out of halt state if in halt state.
                        return; //Let the main interrupt handler compute the interrupt.
                    }

                    $testbit = 1 << ++$bitShift;
                }

                $this->CPUTicks = 1; //1 machine cycle under HALT...
                //Timing:
                $this->updateCore();
            }

            //Throw an error on purpose to exit out of the loop.
            throw new HaltOverrunException();
        }
    }

    /**
     * Opcode #0x77.
     *
     * LD (HL), A
     */
    private function opcode119(): void
    {
        $this->writeMemory($this->registersHL, $this->registerA);
    }

    /**
     * Opcode #0x78.
     *
     * LD A, B
     */
    private function opcode120(): void
    {
        $this->registerA = $this->registerB;
    }

    /**
     * Opcode #0x79.
     *
     * LD A, C
     */
    private function opcode121(): void
    {
        $this->registerA = $this->registerC;
    }

    /**
     * Opcode #0x7A.
     *
     * LD A, D
     */
    private function opcode122(): void
    {
        $this->registerA = $this->registerD;
    }

    /**
     * Opcode #0x7B.
     *
     * LD A, E
     */
    private function opcode123(): void
    {
        $this->registerA = $this->registerE;
    }

    /**
     * Opcode #0x7C.
     *
     * LD A, H
     */
    private function opcode124(): void
    {
        $this->registerA = ($this->registersHL >> 8);
    }

    /**
     * Opcode #0x7D.
     *
     * LD A, L
     */
    private function opcode125(): void
    {
        $this->registerA = ($this->registersHL & 0xFF);
    }

    /**
     * Opcode #0x7E.
     *
     * LD, A, (HL)
     */
    private function opcode126(): void
    {
        $this->registerA = $this->memoryRead($this->registersHL);
    }

    /**
     * Opcode #0x7F.
     *
     * LD A, A
     */
    private function opcode127(): void
    {
        //Do Nothing...
    }

    /**
     * Opcode #0x80.
     *
     * ADD A, B
     */
    private function opcode128(): void
    {
        $dirtySum = $this->registerA + $this->registerB;
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x81.
     *
     * ADD A, C
     */
    private function opcode129(): void
    {
        $dirtySum = $this->registerA + $this->registerC;
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x82.
     *
     * ADD A, D
     */
    private function opcode130(): void
    {
        $dirtySum = $this->registerA + $this->registerD;
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x83.
     *
     * ADD A, E
     */
    private function opcode131(): void
    {
        $dirtySum = $this->registerA + $this->registerE;
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x84.
     *
     * ADD A, H
     */
    private function opcode132(): void
    {
        $dirtySum = $this->registerA + ($this->registersHL >> 8);
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x85.
     *
     * ADD A, L
     */
    private function opcode133(): void
    {
        $dirtySum = $this->registerA + ($this->registersHL & 0xFF);
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x86.
     *
     * ADD A, (HL)
     */
    private function opcode134(): void
    {
        $dirtySum = $this->registerA + $this->memoryRead($this->registersHL);
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x87.
     *
     * ADD A, A
     */
    private function opcode135(): void
    {
        $dirtySum = $this->registerA * 2;
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x88.
     *
     * ADC A, B
     */
    private function opcode136(): void
    {
        $dirtySum = $this->registerA + $this->registerB + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($this->registerB & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x89.
     *
     * ADC A, C
     */
    private function opcode137(): void
    {
        $dirtySum = $this->registerA + $this->registerC + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($this->registerC & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8A.
     *
     * ADC A, D
     */
    private function opcode138(): void
    {
        $dirtySum = $this->registerA + $this->registerD + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($this->registerD & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8B.
     *
     * ADC A, E
     */
    private function opcode139(): void
    {
        $dirtySum = $this->registerA + $this->registerE + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($this->registerE & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8C.
     *
     * ADC A, H
     */
    private function opcode140(): void
    {
        $tempValue = ($this->registersHL >> 8);
        $dirtySum = $this->registerA + $tempValue + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($tempValue & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8D.
     *
     * ADC A, L
     */
    private function opcode141(): void
    {
        $tempValue = ($this->registersHL & 0xFF);
        $dirtySum = $this->registerA + $tempValue + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($tempValue & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8E.
     *
     * ADC A, (HL)
     */
    private function opcode142(): void
    {
        $tempValue = $this->memoryRead($this->registersHL);
        $dirtySum = $this->registerA + $tempValue + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($tempValue & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x8F.
     *
     * ADC A, A
     */
    private function opcode143(): void
    {
        $dirtySum = ($this->registerA * 2) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($this->registerA & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
    }

    /**
     * Opcode #0x90.
     *
     * SUB A, B
     */
    private function opcode144(): void
    {
        $dirtySum = $this->registerA - $this->registerB;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($this->registerB & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x91.
     *
     * SUB A, C
     */
    private function opcode145(): void
    {
        $dirtySum = $this->registerA - $this->registerC;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($this->registerC & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x92.
     *
     * SUB A, D
     */
    private function opcode146(): void
    {
        $dirtySum = $this->registerA - $this->registerD;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($this->registerD & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x93.
     *
     * SUB A, E
     */
    private function opcode147(): void
    {
        $dirtySum = $this->registerA - $this->registerE;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($this->registerE & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x94.
     *
     * SUB A, H
     */
    private function opcode148(): void
    {
        $temp_var = $this->registersHL >> 8;
        $dirtySum = $this->registerA - $temp_var;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($temp_var & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x95.
     *
     * SUB A, L
     */
    private function opcode149(): void
    {
        $dirtySum = $this->registerA - ($this->registersHL & 0xFF);
        $this->FHalfCarry = ($this->registerA & 0xF) < ($this->registersHL & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x96.
     *
     * SUB A, (HL)
     */
    private function opcode150(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $dirtySum = $this->registerA - $temp_var;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($temp_var & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x97.
     *
     * SUB A, A
     */
    private function opcode151(): void
    {
        //number - same number === 0
        $this->registerA = 0;
        $this->FHalfCarry = false;
        $this->FCarry = false;
        $this->FZero = true;
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x98.
     *
     * SBC A, B
     */
    private function opcode152(): void
    {
        $dirtySum = $this->registerA - $this->registerB - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($this->registerB & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x99.
     *
     * SBC A, C
     */
    private function opcode153(): void
    {
        $dirtySum = $this->registerA - $this->registerC - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($this->registerC & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9A.
     *
     * SBC A, D
     */
    private function opcode154(): void
    {
        $dirtySum = $this->registerA - $this->registerD - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($this->registerD & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9B.
     *
     * SBC A, E
     */
    private function opcode155(): void
    {
        $dirtySum = $this->registerA - $this->registerE - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($this->registerE & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9C.
     *
     * SBC A, H
     */
    private function opcode156(): void
    {
        $temp_var = $this->registersHL >> 8;
        $dirtySum = $this->registerA - $temp_var - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($temp_var & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9D.
     *
     * SBC A, L
     */
    private function opcode157(): void
    {
        $dirtySum = $this->registerA - ($this->registersHL & 0xFF) - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($this->registersHL & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9E.
     *
     * SBC A, (HL)
     */
    private function opcode158(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $dirtySum = $this->registerA - $temp_var - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($temp_var & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0x9F.
     *
     * SBC A, A
     */
    private function opcode159(): void
    {
        //Optimized SBC A:
        if ($this->FCarry) {
            $this->FZero = false;
            $this->FSubtract = true;
            $this->FHalfCarry = true;
            $this->FCarry = true;
            $this->registerA = 0xFF;
        } else {
            $this->FHalfCarry = false;
            $this->FCarry = false;
            $this->FSubtract = true;
            $this->FZero = true;
            $this->registerA = 0;
        }
    }

    /**
     * Opcode #0xA0.
     *
     * AND B
     */
    private function opcode160(): void
    {
        $this->registerA &= $this->registerB;
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA1.
     *
     * AND C
     */
    private function opcode161(): void
    {
        $this->registerA &= $this->registerC;
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA2.
     *
     * AND D
     */
    private function opcode162(): void
    {
        $this->registerA &= $this->registerD;
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA3.
     *
     * AND E
     */
    private function opcode163(): void
    {
        $this->registerA &= $this->registerE;
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA4.
     *
     * AND H
     */
    private function opcode164(): void
    {
        $this->registerA &= ($this->registersHL >> 8);
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA5.
     *
     * AND L
     */
    private function opcode165(): void
    {
        $this->registerA &= ($this->registersHL & 0xFF);
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA6.
     *
     * AND (HL)
     */
    private function opcode166(): void
    {
        $this->registerA &= $this->memoryRead($this->registersHL);
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA7.
     *
     * AND A
     */
    private function opcode167(): void
    {
        //number & same number = same number
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA8.
     *
     * XOR B
     */
    private function opcode168(): void
    {
        $this->registerA ^= $this->registerB;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xA9.
     *
     * XOR C
     */
    private function opcode169(): void
    {
        $this->registerA ^= $this->registerC;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAA.
     *
     * XOR D
     */
    private function opcode170(): void
    {
        $this->registerA ^= $this->registerD;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAB.
     *
     * XOR E
     */
    private function opcode171(): void
    {
        $this->registerA ^= $this->registerE;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAC.
     *
     * XOR H
     */
    private function opcode172(): void
    {
        $this->registerA ^= ($this->registersHL >> 8);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAD.
     *
     * XOR L
     */
    private function opcode173(): void
    {
        $this->registerA ^= ($this->registersHL & 0xFF);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAE.
     *
     * XOR (HL)
     */
    private function opcode174(): void
    {
        $this->registerA ^= $this->memoryRead($this->registersHL);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xAF.
     *
     * XOR A
     */
    private function opcode175(): void
    {
        //number ^ same number === 0
        $this->registerA = 0;
        $this->FZero = true;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xB0.
     *
     * OR B
     */
    private function opcode176(): void
    {
        $this->registerA |= $this->registerB;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB1.
     *
     * OR C
     */
    private function opcode177(): void
    {
        $this->registerA |= $this->registerC;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB2.
     *
     * OR D
     */
    private function opcode178(): void
    {
        $this->registerA |= $this->registerD;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB3.
     *
     * OR E
     */
    private function opcode179(): void
    {
        $this->registerA |= $this->registerE;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB4.
     *
     * OR H
     */
    private function opcode180(): void
    {
        $this->registerA |= ($this->registersHL >> 8);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB5.
     *
     * OR L
     */
    private function opcode181(): void
    {
        $this->registerA |= ($this->registersHL & 0xFF);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB6.
     *
     * OR (HL)
     */
    private function opcode182(): void
    {
        $this->registerA |= $this->memoryRead($this->registersHL);
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB7.
     *
     * OR A
     */
    private function opcode183(): void
    {
        //number | same number === same number
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xB8.
     *
     * CP B
     */
    private function opcode184(): void
    {
        $dirtySum = $this->registerA - $this->registerB;
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xB9.
     *
     * CP C
     */
    private function opcode185(): void
    {
        $dirtySum = $this->registerA - $this->registerC;
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBA.
     *
     * CP D
     */
    private function opcode186(): void
    {
        $dirtySum = $this->registerA - $this->registerD;
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBB.
     *
     * CP E
     */
    private function opcode187(): void
    {
        $dirtySum = $this->registerA - $this->registerE;
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBC.
     *
     * CP H
     */
    private function opcode188(): void
    {
        $dirtySum = $this->registerA - ($this->registersHL >> 8);
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBD.
     *
     * CP L
     */
    private function opcode189(): void
    {
        $dirtySum = $this->registerA - ($this->registersHL & 0xFF);
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBE.
     *
     * CP (HL)
     */
    private function opcode190(): void
    {
        $dirtySum = $this->registerA - $this->memoryRead($this->registersHL);
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xBF.
     *
     * CP A
     */
    private function opcode191(): void
    {
        $this->FHalfCarry = false;
        $this->FCarry = false;
        $this->FZero = true;
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xC0.
     *
     * RET !FZ
     */
    private function opcode192(): void
    {
        if (!$this->FZero) {
            $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
            $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
            $this->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xC1.
     *
     * POP BC
     */
    private function opcode193(): void
    {
        $this->registerC = $this->memoryRead($this->stackPointer);
        $this->registerB = $this->memoryRead(($this->stackPointer + 1) & 0xFFFF);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xC2.
     *
     * JP !FZ, nn
     */
    private function opcode194(): void
    {
        if (!$this->FZero) {
            $this->programCounter = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xC3.
     *
     * JP nn
     */
    private function opcode195(): void
    {
        $this->programCounter = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
    }

    /**
     * Opcode #0xC4.
     *
     * CALL !FZ, nn
     */
    private function opcode196(): void
    {
        if (!$this->FZero) {
            $temp_pc = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
            $this->programCounter = $temp_pc;
            $this->CPUTicks += 3;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xC5.
     *
     * PUSH BC
     */
    private function opcode197(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registerB);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registerC);
    }

    /**
     * Opcode #0xC6.
     *
     * ADD, n
     */
    private function opcode198(): void
    {
        $dirtySum = $this->registerA + $this->memoryRead($this->programCounter);
        $this->FHalfCarry = ($dirtySum & 0xF) < ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xC7.
     *
     * RST 0
     */
    private function opcode199(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0;
    }

    /**
     * Opcode #0xC8.
     *
     * RET FZ
     */
    private function opcode200(): void
    {
        if ($this->FZero) {
            $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
            $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
            $this->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xC9.
     *
     * RET
     */
    private function opcode201(): void
    {
        $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xCA.
     *
     * JP FZ, nn
     */
    private function opcode202(): void
    {
        if ($this->FZero) {
            $this->programCounter = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xCB.
     *
     * Secondary OP Code Set:
     */
    private function opcode203(): void
    {
        $opcode = $this->memoryRead($this->programCounter);
        //Increment the program counter to the next instruction:
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        //Get how many CPU cycles the current 0xCBXX op code counts for:
        $this->CPUTicks = self::SECONDARY_TABLE[$opcode];
        //Execute secondary OP codes for the 0xCB OP code call.
        $this->runCbopcode($opcode);
    }

    /**
     * Opcode #0xCC.
     *
     * CALL FZ, nn
     */
    private function opcode204(): void
    {
        if ($this->FZero) {
            $temp_pc = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
            $this->programCounter = $temp_pc;
            $this->CPUTicks += 3;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xCD.
     *
     * CALL nn
     */
    private function opcode205(): void
    {
        $temp_pc = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = $temp_pc;
    }

    /**
     * Opcode #0xCE.
     *
     * ADC A, n
     */
    private function opcode206(): void
    {
        $tempValue = $this->memoryRead($this->programCounter);
        $dirtySum = $this->registerA + $tempValue + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) + ($tempValue & 0xF) + (($this->FCarry) ? 1 : 0) > 0xF);
        $this->FCarry = ($dirtySum > 0xFF);
        $this->registerA = $dirtySum & 0xFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = false;
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xCF.
     *
     * RST 0x8
     */
    private function opcode207(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x8;
    }

    /**
     * Opcode #0xD0.
     *
     * RET !FC
     */
    private function opcode208(): void
    {
        if (!$this->FCarry) {
            $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
            $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
            $this->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xD1.
     *
     * POP DE
     */
    private function opcode209(): void
    {
        $this->registerE = $this->memoryRead($this->stackPointer);
        $this->registerD = $this->memoryRead(($this->stackPointer + 1) & 0xFFFF);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xD2.
     *
     * JP !FC, nn
     */
    private function opcode210(): void
    {
        if (!$this->FCarry) {
            $this->programCounter = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xD3.
     *
     * 0xD3 - Illegal
     */
    private function opcode211(): void
    {
        // @TODO
        // cout("Illegal op code 0xD3 called, pausing emulation.", 2);
        // pause();
    }

    /**
     * Opcode #0xD4.
     *
     * CALL !FC, nn
     */
    private function opcode212(): void
    {
        if (!$this->FCarry) {
            $temp_pc = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
            $this->programCounter = $temp_pc;
            $this->CPUTicks += 3;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xD5.
     *
     * PUSH DE
     */
    private function opcode213(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registerD);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registerE);
    }

    /**
     * Opcode #0xD6.
     *
     * SUB A, n
     */
    private function opcode214(): void
    {
        $temp_var = $this->memoryRead($this->programCounter);
        $dirtySum = $this->registerA - $temp_var;
        $this->FHalfCarry = ($this->registerA & 0xF) < ($temp_var & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xD7.
     *
     * RST 0x10
     */
    private function opcode215(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x10;
    }

    /**
     * Opcode #0xD8.
     *
     * RET FC
     */
    private function opcode216(): void
    {
        if ($this->FCarry) {
            $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
            $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
            $this->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xD9.
     *
     * RETI
     */
    private function opcode217(): void
    {
        $this->programCounter = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
        //$this->IME = true;
        $this->untilEnable = 2;
    }

    /**
     * Opcode #0xDA.
     *
     * JP FC, nn
     */
    private function opcode218(): void
    {
        if ($this->FCarry) {
            $this->programCounter = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            ++$this->CPUTicks;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xDB.
     *
     * 0xDB - Illegal
     */
    private function opcode219(): never
    {
        echo 'Illegal op code 0xDB called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xDC.
     *
     * CALL FC, nn
     */
    private function opcode220(): void
    {
        if ($this->FCarry) {
            $temp_pc = ($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter);
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
            $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
            $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
            $this->programCounter = $temp_pc;
            $this->CPUTicks += 3;
        } else {
            $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xDD.
     *
     * 0xDD - Illegal
     */
    private function opcode221(): never
    {
        echo 'Illegal op code 0xDD called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xDE.
     *
     * SBC A, n
     */
    private function opcode222(): void
    {
        $temp_var = $this->memoryRead($this->programCounter);
        $dirtySum = $this->registerA - $temp_var - (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = (($this->registerA & 0xF) - ($temp_var & 0xF) - (($this->FCarry) ? 1 : 0) < 0);
        $this->FCarry = ($dirtySum < 0);
        $this->registerA = Helpers::unsbtub($dirtySum);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FZero = ($this->registerA === 0);
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xDF.
     *
     * RST 0x18
     */
    private function opcode223(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x18;
    }

    /**
     * Opcode #0xE0.
     *
     * LDH (n), A
     */
    private function opcode224(): void
    {
        $this->writeMemory(0xFF00 + $this->memoryRead($this->programCounter), $this->registerA);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xE1.
     *
     * POP HL
     */
    private function opcode225(): void
    {
        $this->registersHL = ($this->memoryRead(($this->stackPointer + 1) & 0xFFFF) << 8) + $this->memoryRead($this->stackPointer);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xE2.
     *
     * LD (C), A
     */
    private function opcode226(): void
    {
        $this->writeMemory(0xFF00 + $this->registerC, $this->registerA);
    }

    /**
     * Opcode #0xE3.
     *
     * 0xE3 - Illegal
     */
    private function opcode227(): never
    {
        echo 'Illegal op code 0xE3 called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xE4.
     *
     * 0xE4 - Illegal
     */
    private function opcode228(): never
    {
        echo 'Illegal op code 0xE4 called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xE5.
     *
     * PUSH HL
     */
    private function opcode229(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registersHL >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registersHL & 0xFF);
    }

    /**
     * Opcode #0xE6.
     *
     * AND n
     */
    private function opcode230(): void
    {
        $this->registerA &= $this->memoryRead($this->programCounter);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FZero = ($this->registerA === 0);
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xE7.
     *
     * RST 0x20
     */
    private function opcode231(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x20;
    }

    /**
     * Opcode #0xE8.
     *
     * ADD SP, n
     */
    private function opcode232(): void
    {
        $signedByte = Helpers::usbtsb($this->memoryRead($this->programCounter));
        $temp_value = Helpers::nswtuw($this->stackPointer + $signedByte);
        $this->FCarry = ((($this->stackPointer ^ $signedByte ^ $temp_value) & 0x100) === 0x100);
        $this->FHalfCarry = ((($this->stackPointer ^ $signedByte ^ $temp_value) & 0x10) === 0x10);
        $this->stackPointer = $temp_value;
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FZero = false;
        $this->FSubtract = false;
    }

    /**
     * Opcode #0xE9.
     *
     * JP, (HL)
     */
    private function opcode233(): void
    {
        $this->programCounter = $this->registersHL;
    }

    /**
     * Opcode #0xEA.
     *
     * LD n, A
     */
    private function opcode234(): void
    {
        $this->writeMemory(($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter), $this->registerA);
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xEB.
     *
     * 0xEB - Illegal
     */
    private function opcode235(): never
    {
        echo 'Illegal op code 0xEB called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xEC.
     *
     * 0xEC - Illegal
     */
    private function opcode236(): never
    {
        echo 'Illegal op code 0xEC called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xED.
     *
     * 0xED - Illegal
     */
    private function opcode237(): never
    {
        echo 'Illegal op code 0xED called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xEE.
     *
     * XOR n
     */
    private function opcode238(): void
    {
        $this->registerA ^= $this->memoryRead($this->programCounter);
        $this->FZero = ($this->registerA === 0);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FSubtract = false;
        $this->FHalfCarry = false;
        $this->FCarry = false;
    }

    /**
     * Opcode #0xEF.
     *
     * RST 0x28
     */
    private function opcode239(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x28;
    }

    /**
     * Opcode #0xF0.
     *
     * LDH A, (n)
     */
    private function opcode240(): void
    {
        $this->registerA = $this->memoryRead(0xFF00 + $this->memoryRead($this->programCounter));
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xF1.
     *
     * POP AF
     */
    private function opcode241(): void
    {
        $temp_var = $this->memoryRead($this->stackPointer);
        $this->FZero = (($temp_var & 0x80) === 0x80);
        $this->FSubtract = (($temp_var & 0x40) === 0x40);
        $this->FHalfCarry = (($temp_var & 0x20) === 0x20);
        $this->FCarry = (($temp_var & 0x10) === 0x10);
        $this->registerA = $this->memoryRead(($this->stackPointer + 1) & 0xFFFF);
        $this->stackPointer = ($this->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xF2.
     *
     * LD A, (C)
     */
    private function opcode242(): void
    {
        $this->registerA = $this->memoryRead(0xFF00 + $this->registerC);
    }

    /**
     * Opcode #0xF3.
     *
     * DI
     */
    private function opcode243(): void
    {
        $this->IME = false;
        $this->untilEnable = 0;
    }

    /**
     * Opcode #0xF4.
     *
     * 0xF4 - Illegal
     */
    private function opcode244(): void
    {
        // @TODO
        // cout("Illegal op code 0xF4 called, pausing emulation.", 2);
        // pause();
    }

    /**
     * Opcode #0xF5.
     *
     * PUSH AF
     */
    private function opcode245(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->registerA);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, (($this->FZero) ? 0x80 : 0) + (($this->FSubtract) ? 0x40 : 0) + (($this->FHalfCarry) ? 0x20 : 0) + (($this->FCarry) ? 0x10 : 0));
    }

    /**
     * Opcode #0xF6.
     *
     * OR n
     */
    private function opcode246(): void
    {
        $this->registerA |= $this->memoryRead($this->programCounter);
        $this->FZero = ($this->registerA === 0);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FSubtract = false;
        $this->FCarry = false;
        $this->FHalfCarry = false;
    }

    /**
     * Opcode #0xF7.
     *
     * RST 0x30
     */
    private function opcode247(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x30;
    }

    /**
     * Opcode #0xF8.
     *
     * LDHL SP, n
     */
    private function opcode248(): void
    {
        $signedByte = Helpers::usbtsb($this->memoryRead($this->programCounter));
        $this->registersHL = Helpers::nswtuw($this->stackPointer + $signedByte);
        $this->FCarry = ((($this->stackPointer ^ $signedByte ^ $this->registersHL) & 0x100) === 0x100);
        $this->FHalfCarry = ((($this->stackPointer ^ $signedByte ^ $this->registersHL) & 0x10) === 0x10);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FZero = false;
        $this->FSubtract = false;
    }

    /**
     * Opcode #0xF9.
     *
     * LD SP, HL
     */
    private function opcode249(): void
    {
        $this->stackPointer = $this->registersHL;
    }

    /**
     * Opcode #0xFA.
     *
     * LD A, (nn)
     */
    private function opcode250(): void
    {
        $this->registerA = $this->memoryRead(($this->memoryRead(($this->programCounter + 1) & 0xFFFF) << 8) + $this->memoryRead($this->programCounter));
        $this->programCounter = ($this->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xFB.
     *
     * EI
     */
    private function opcode251(): void
    {
        $this->untilEnable = 2;
    }

    /**
     * Opcode #0xFC.
     *
     * 0xFC - Illegal
     */
    private function opcode252(): never
    {
        echo 'Illegal op code 0xFC called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xFD.
     *
     * 0xFD - Illegal
     */
    private function opcode253(): never
    {
        echo 'Illegal op code 0xFD called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xFE.
     *
     * CP n
     */
    private function opcode254(): void
    {
        $dirtySum = $this->registerA - $this->memoryRead($this->programCounter);
        $this->FHalfCarry = (Helpers::unsbtub($dirtySum) & 0xF) > ($this->registerA & 0xF);
        $this->FCarry = ($dirtySum < 0);
        $this->FZero = ($dirtySum === 0);
        $this->programCounter = ($this->programCounter + 1) & 0xFFFF;
        $this->FSubtract = true;
    }

    /**
     * Opcode #0xFF.
     *
     * RST 0x38
     */
    private function opcode255(): void
    {
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter >> 8);
        $this->stackPointer = Helpers::unswtuw($this->stackPointer - 1);
        $this->writeMemory($this->stackPointer, $this->programCounter & 0xFF);
        $this->programCounter = 0x38;
    }
}
