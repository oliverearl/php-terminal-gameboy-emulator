<?php

declare(strict_types=1);

namespace App\Emulator\Cpu;

/** @mixin \App\Emulator\Core */
trait HandlesCbOpcodes
{
    /**
     * Run the given CB Opcode.
     */
    public function runCbOpcode(int $address): void
    {
        match ($address) {
            1 => $this->cbOpcode1(), 2 => $this->cbOpcode2(), 3 => $this->cbOpcode3(),
            4 => $this->cbOpcode4(), 5 => $this->cbOpcode5(), 6 => $this->cbOpcode6(),
            7 => $this->cbOpcode7(), 8 => $this->cbOpcode8(), 9 => $this->cbOpcode9(),
            10 => $this->cbOpcode10(), 11 => $this->cbOpcode11(), 12 => $this->cbOpcode12(),
            13 => $this->cbOpcode13(), 14 => $this->cbOpcode14(), 15 => $this->cbOpcode15(),
            16 => $this->cbOpcode16(), 17 => $this->cbOpcode17(), 18 => $this->cbOpcode18(),
            19 => $this->cbOpcode19(), 20 => $this->cbOpcode20(), 21 => $this->cbOpcode21(),
            22 => $this->cbOpcode22(), 23 => $this->cbOpcode23(), 24 => $this->cbOpcode24(),
            25 => $this->cbOpcode25(), 26 => $this->cbOpcode26(), 27 => $this->cbOpcode27(),
            28 => $this->cbOpcode28(), 29 => $this->cbOpcode29(), 30 => $this->cbOpcode30(),
            31 => $this->cbOpcode31(), 32 => $this->cbOpcode32(), 33 => $this->cbOpcode33(),
            34 => $this->cbOpcode34(), 35 => $this->cbOpcode35(), 36 => $this->cbOpcode36(),
            37 => $this->cbOpcode37(), 38 => $this->cbOpcode38(), 39 => $this->cbOpcode39(),
            40 => $this->cbOpcode40(), 41 => $this->cbOpcode41(), 42 => $this->cbOpcode42(),
            43 => $this->cbOpcode43(), 44 => $this->cbOpcode44(), 45 => $this->cbOpcode45(),
            46 => $this->cbOpcode46(), 47 => $this->cbOpcode47(), 48 => $this->cbOpcode48(),
            49 => $this->cbOpcode49(), 50 => $this->cbOpcode50(), 51 => $this->cbOpcode51(),
            52 => $this->cbOpcode52(), 53 => $this->cbOpcode53(), 54 => $this->cbOpcode54(),
            55 => $this->cbOpcode55(), 56 => $this->cbOpcode56(), 57 => $this->cbOpcode57(),
            58 => $this->cbOpcode58(), 59 => $this->cbOpcode59(), 60 => $this->cbOpcode60(),
            61 => $this->cbOpcode61(), 62 => $this->cbOpcode62(), 63 => $this->cbOpcode63(),
            64 => $this->cbOpcode64(), 65 => $this->cbOpcode65(), 66 => $this->cbOpcode66(),
            67 => $this->cbOpcode67(), 68 => $this->cbOpcode68(), 69 => $this->cbOpcode69(),
            70 => $this->cbOpcode70(), 71 => $this->cbOpcode71(), 72 => $this->cbOpcode72(),
            73 => $this->cbOpcode73(), 74 => $this->cbOpcode74(), 75 => $this->cbOpcode75(),
            76 => $this->cbOpcode76(), 77 => $this->cbOpcode77(), 78 => $this->cbOpcode78(),
            79 => $this->cbOpcode79(), 80 => $this->cbOpcode80(), 81 => $this->cbOpcode81(),
            82 => $this->cbOpcode82(), 83 => $this->cbOpcode83(), 84 => $this->cbOpcode84(),
            85 => $this->cbOpcode85(), 86 => $this->cbOpcode86(), 87 => $this->cbOpcode87(),
            88 => $this->cbOpcode88(), 89 => $this->cbOpcode89(), 90 => $this->cbOpcode90(),
            91 => $this->cbOpcode91(), 92 => $this->cbOpcode92(), 93 => $this->cbOpcode93(),
            94 => $this->cbOpcode94(), 95 => $this->cbOpcode95(), 96 => $this->cbOpcode96(),
            97 => $this->cbOpcode97(), 98 => $this->cbOpcode98(), 99 => $this->cbOpcode99(),
            100 => $this->cbOpcode100(), 101 => $this->cbOpcode101(), 102 => $this->cbOpcode102(),
            103 => $this->cbOpcode103(), 104 => $this->cbOpcode104(), 105 => $this->cbOpcode105(),
            106 => $this->cbOpcode106(), 107 => $this->cbOpcode107(), 108 => $this->cbOpcode108(),
            109 => $this->cbOpcode109(), 110 => $this->cbOpcode110(), 111 => $this->cbOpcode111(),
            112 => $this->cbOpcode112(), 113 => $this->cbOpcode113(), 114 => $this->cbOpcode114(),
            115 => $this->cbOpcode115(), 116 => $this->cbOpcode116(), 117 => $this->cbOpcode117(),
            118 => $this->cbOpcode118(), 119 => $this->cbOpcode119(), 120 => $this->cbOpcode120(),
            121 => $this->cbOpcode121(), 122 => $this->cbOpcode122(), 123 => $this->cbOpcode123(),
            124 => $this->cbOpcode124(), 125 => $this->cbOpcode125(), 126 => $this->cbOpcode126(),
            127 => $this->cbOpcode127(), 128 => $this->cbOpcode128(), 129 => $this->cbOpcode129(),
            130 => $this->cbOpcode130(), 131 => $this->cbOpcode131(), 132 => $this->cbOpcode132(),
            133 => $this->cbOpcode133(), 134 => $this->cbOpcode134(), 135 => $this->cbOpcode135(),
            136 => $this->cbOpcode136(), 137 => $this->cbOpcode137(), 138 => $this->cbOpcode138(),
            139 => $this->cbOpcode139(), 140 => $this->cbOpcode140(), 141 => $this->cbOpcode141(),
            142 => $this->cbOpcode142(), 143 => $this->cbOpcode143(), 144 => $this->cbOpcode144(),
            145 => $this->cbOpcode145(), 146 => $this->cbOpcode146(), 147 => $this->cbOpcode147(),
            148 => $this->cbOpcode148(), 149 => $this->cbOpcode149(), 150 => $this->cbOpcode150(),
            151 => $this->cbOpcode151(), 152 => $this->cbOpcode152(), 153 => $this->cbOpcode153(),
            154 => $this->cbOpcode154(), 155 => $this->cbOpcode155(), 156 => $this->cbOpcode156(),
            157 => $this->cbOpcode157(), 158 => $this->cbOpcode158(), 159 => $this->cbOpcode159(),
            160 => $this->cbOpcode160(), 161 => $this->cbOpcode161(), 162 => $this->cbOpcode162(),
            163 => $this->cbOpcode163(), 164 => $this->cbOpcode164(), 165 => $this->cbOpcode165(),
            166 => $this->cbOpcode166(), 167 => $this->cbOpcode167(), 168 => $this->cbOpcode168(),
            169 => $this->cbOpcode169(), 170 => $this->cbOpcode170(), 171 => $this->cbOpcode171(),
            172 => $this->cbOpcode172(), 173 => $this->cbOpcode173(), 174 => $this->cbOpcode174(),
            175 => $this->cbOpcode175(), 176 => $this->cbOpcode176(), 177 => $this->cbOpcode177(),
            178 => $this->cbOpcode178(), 179 => $this->cbOpcode179(), 180 => $this->cbOpcode180(),
            181 => $this->cbOpcode181(), 182 => $this->cbOpcode182(), 183 => $this->cbOpcode183(),
            184 => $this->cbOpcode184(), 185 => $this->cbOpcode185(), 186 => $this->cbOpcode186(),
            187 => $this->cbOpcode187(), 188 => $this->cbOpcode188(), 189 => $this->cbOpcode189(),
            190 => $this->cbOpcode190(), 191 => $this->cbOpcode191(), 192 => $this->cbOpcode192(),
            193 => $this->cbOpcode193(), 194 => $this->cbOpcode194(), 195 => $this->cbOpcode195(),
            196 => $this->cbOpcode196(), 197 => $this->cbOpcode197(), 198 => $this->cbOpcode198(),
            199 => $this->cbOpcode199(), 200 => $this->cbOpcode200(), 201 => $this->cbOpcode201(),
            202 => $this->cbOpcode202(), 203 => $this->cbOpcode203(), 204 => $this->cbOpcode204(),
            205 => $this->cbOpcode205(), 206 => $this->cbOpcode206(), 207 => $this->cbOpcode207(),
            208 => $this->cbOpcode208(), 209 => $this->cbOpcode209(), 210 => $this->cbOpcode210(),
            211 => $this->cbOpcode211(), 212 => $this->cbOpcode212(), 213 => $this->cbOpcode213(),
            214 => $this->cbOpcode214(), 215 => $this->cbOpcode215(), 216 => $this->cbOpcode216(),
            217 => $this->cbOpcode217(), 218 => $this->cbOpcode218(), 219 => $this->cbOpcode219(),
            220 => $this->cbOpcode220(), 221 => $this->cbOpcode221(), 222 => $this->cbOpcode222(),
            223 => $this->cbOpcode223(), 224 => $this->cbOpcode224(), 225 => $this->cbOpcode225(),
            226 => $this->cbOpcode226(), 227 => $this->cbOpcode227(), 228 => $this->cbOpcode228(),
            229 => $this->cbOpcode229(), 230 => $this->cbOpcode230(), 231 => $this->cbOpcode231(),
            232 => $this->cbOpcode232(), 233 => $this->cbOpcode233(), 234 => $this->cbOpcode234(),
            235 => $this->cbOpcode235(), 236 => $this->cbOpcode236(), 237 => $this->cbOpcode237(),
            238 => $this->cbOpcode238(), 239 => $this->cbOpcode239(), 240 => $this->cbOpcode240(),
            241 => $this->cbOpcode241(), 242 => $this->cbOpcode242(), 243 => $this->cbOpcode243(),
            244 => $this->cbOpcode244(), 245 => $this->cbOpcode245(), 246 => $this->cbOpcode246(),
            247 => $this->cbOpcode247(), 248 => $this->cbOpcode248(), 249 => $this->cbOpcode249(),
            250 => $this->cbOpcode250(), 251 => $this->cbOpcode251(), 252 => $this->cbOpcode252(),
            253 => $this->cbOpcode253(), 254 => $this->cbOpcode254(), 255 => $this->cbOpcode255(),
            default => $this->cbOpcode0(),
        };
    }

    /**
     * Execute Cbopcode #0x00.
     */
    private function cbOpcode0(): void
    {
        $this->FCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = (($this->registerB << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x01.
     */
    private function cbOpcode1(): void
    {
        $this->FCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = (($this->registerC << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x02.
     */
    private function cbOpcode2(): void
    {
        $this->FCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = (($this->registerD << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x03.
     */
    private function cbOpcode3(): void
    {
        $this->FCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = (($this->registerE << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x04.
     */
    private function cbOpcode4(): void
    {
        $this->FCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + (($this->FCarry) ? 0x100 : 0) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x05.
     */
    private function cbOpcode5(): void
    {
        $this->FCarry = (($this->registersHL & 0x80) === 0x80);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x06.
     */
    private function cbOpcode6(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $this->FCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x07.
     */
    private function cbOpcode7(): void
    {
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x08.
     */
    private function cbOpcode8(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = (($this->FCarry) ? 0x80 : 0) + ($this->registerB >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x09.
     */
    private function cbOpcode9(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = (($this->FCarry) ? 0x80 : 0) + ($this->registerC >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x0A.
     */
    private function cbOpcode10(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = (($this->FCarry) ? 0x80 : 0) + ($this->registerD >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x0B.
     */
    private function cbOpcode11(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = (($this->FCarry) ? 0x80 : 0) + ($this->registerE >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x0C.
     */
    private function cbOpcode12(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->FCarry) ? 0x8000 : 0) + (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x0D.
     */
    private function cbOpcode13(): void
    {
        $this->FCarry = (($this->registersHL & 0x01) === 0x01);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->FCarry) ? 0x80 : 0) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x0E.
     */
    private function cbOpcode14(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = (($this->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x0F.
     */
    private function cbOpcode15(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = (($this->FCarry) ? 0x80 : 0) + ($this->registerA >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x10.
     */
    private function cbOpcode16(): void
    {
        $newFCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = (($this->registerB << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x11.
     */
    private function cbOpcode17(): void
    {
        $newFCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = (($this->registerC << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x12.
     */
    private function cbOpcode18(): void
    {
        $newFCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = (($this->registerD << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x13.
     */
    private function cbOpcode19(): void
    {
        $newFCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = (($this->registerE << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x14.
     */
    private function cbOpcode20(): void
    {
        $newFCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + (($this->FCarry) ? 0x100 : 0) + ($this->registersHL & 0xFF);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x15.
     */
    private function cbOpcode21(): void
    {
        $newFCarry = (($this->registersHL & 0x80) === 0x80);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x16.
     */
    private function cbOpcode22(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $newFCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x17.
     */
    private function cbOpcode23(): void
    {
        $newFCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x18.
     */
    private function cbOpcode24(): void
    {
        $newFCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = (($this->FCarry) ? 0x80 : 0) + ($this->registerB >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x19.
     */
    private function cbOpcode25(): void
    {
        $newFCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = (($this->FCarry) ? 0x80 : 0) + ($this->registerC >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x1A.
     */
    private function cbOpcode26(): void
    {
        $newFCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = (($this->FCarry) ? 0x80 : 0) + ($this->registerD >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x1B.
     */
    private function cbOpcode27(): void
    {
        $newFCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = (($this->FCarry) ? 0x80 : 0) + ($this->registerE >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x1C.
     */
    private function cbOpcode28(): void
    {
        $newFCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->FCarry) ? 0x8000 : 0) + (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x1D.
     */
    private function cbOpcode29(): void
    {
        $newFCarry = (($this->registersHL & 0x01) === 0x01);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->FCarry) ? 0x80 : 0) + (($this->registersHL & 0xFF) >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x1E.
     */
    private function cbOpcode30(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $newFCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = (($this->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $this->FCarry = $newFCarry;
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x1F.
     */
    private function cbOpcode31(): void
    {
        $newFCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = (($this->FCarry) ? 0x80 : 0) + ($this->registerA >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x20.
     */
    private function cbOpcode32(): void
    {
        $this->FCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = ($this->registerB << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x21.
     */
    private function cbOpcode33(): void
    {
        $this->FCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = ($this->registerC << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x22.
     */
    private function cbOpcode34(): void
    {
        $this->FCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = ($this->registerD << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x23.
     */
    private function cbOpcode35(): void
    {
        $this->FCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = ($this->registerE << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x24.
     */
    private function cbOpcode36(): void
    {
        $this->FCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x25.
     */
    private function cbOpcode37(): void
    {
        $this->FCarry = (($this->registersHL & 0x0080) === 0x0080);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x26.
     */
    private function cbOpcode38(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $this->FCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = ($temp_var << 1) & 0xFF;
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x27.
     */
    private function cbOpcode39(): void
    {
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = ($this->registerA << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x28.
     */
    private function cbOpcode40(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = ($this->registerB & 0x80) + ($this->registerB >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x29.
     */
    private function cbOpcode41(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = ($this->registerC & 0x80) + ($this->registerC >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x2A.
     */
    private function cbOpcode42(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = ($this->registerD & 0x80) + ($this->registerD >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x2B.
     */
    private function cbOpcode43(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = ($this->registerE & 0x80) + ($this->registerE >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     *
     * Execute Cbopcode #0x2C.
     */
    private function cbOpcode44(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0x80FF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x2D.
     */
    private function cbOpcode45(): void
    {
        $this->FCarry = (($this->registersHL & 0x0001) === 0x0001);
        $this->registersHL = ($this->registersHL & 0xFF80) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x2E.
     */
    private function cbOpcode46(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = ($temp_var & 0x80) + ($temp_var >> 1);
        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x2F.
     */
    private function cbOpcode47(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = ($this->registerA & 0x80) + ($this->registerA >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x30.
     */
    private function cbOpcode48(): void
    {
        $this->registerB = (($this->registerB & 0xF) << 4) + ($this->registerB >> 4);
        $this->FZero = ($this->registerB === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x31.
     */
    private function cbOpcode49(): void
    {
        $this->registerC = (($this->registerC & 0xF) << 4) + ($this->registerC >> 4);
        $this->FZero = ($this->registerC === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x32.
     */
    private function cbOpcode50(): void
    {
        $this->registerD = (($this->registerD & 0xF) << 4) + ($this->registerD >> 4);
        $this->FZero = ($this->registerD === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x33.
     */
    private function cbOpcode51(): void
    {
        $this->registerE = (($this->registerE & 0xF) << 4) + ($this->registerE >> 4);
        $this->FZero = ($this->registerE === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x34.
     */
    private function cbOpcode52(): void
    {
        $this->registersHL = (($this->registersHL & 0xF00) << 4) + (($this->registersHL & 0xF000) >> 4) + ($this->registersHL & 0xFF);
        $this->FZero = ($this->registersHL <= 0xFF);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x35.
     */
    private function cbOpcode53(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL & 0xF) << 4) + (($this->registersHL & 0xF0) >> 4);
        $this->FZero = (($this->registersHL & 0xFF) === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x36.
     */
    private function cbOpcode54(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $temp_var = (($temp_var & 0xF) << 4) + ($temp_var >> 4);

        $this->memory->writeMemory($this->registersHL, $temp_var);
        $this->FZero = ($temp_var === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x37.
     */
    private function cbOpcode55(): void
    {
        $this->registerA = (($this->registerA & 0xF) << 4) + ($this->registerA >> 4);
        $this->FZero = ($this->registerA === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Execute Cbopcode #0x38.
     */
    private function cbOpcode56(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Execute Cbopcode #0x39.
     */
    private function cbOpcode57(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Execute Cbopcode #0x3A.
     */
    private function cbOpcode58(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Execute Cbopcode #0x3B.
     */
    private function cbOpcode59(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Execute Cbopcode #0x3C.
     */
    private function cbOpcode60(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Execute Cbopcode #0x3D.
     */
    private function cbOpcode61(): void
    {
        $this->FCarry = (($this->registersHL & 0x0001) === 0x0001);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Execute Cbopcode #0x3E.
     */
    private function cbOpcode62(): void
    {
        $temp_var = $this->memory->readMemory($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $this->memory->writeMemory($this->registersHL, $temp_var >>= 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Execute Cbopcode #0x3F.
     */
    private function cbOpcode63(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Execute Cbopcode #0x40.
     */
    private function cbOpcode64(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x41.
     */
    private function cbOpcode65(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x42.
     */
    private function cbOpcode66(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x43.
     */
    private function cbOpcode67(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x44.
     */
    private function cbOpcode68(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0100) === 0);
    }

    /**
     * Execute Cbopcode #0x45.
     */
    private function cbOpcode69(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0001) === 0);
    }

    /**
     * Execute Cbopcode #0x46.
     */
    private function cbOpcode70(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x47.
     */
    private function cbOpcode71(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x01) === 0);
    }

    /**
     * Execute Cbopcode #0x48.
     */
    private function cbOpcode72(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x49.
     */
    private function cbOpcode73(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x4A.
     */
    private function cbOpcode74(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x4B.
     */
    private function cbOpcode75(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x4C.
     */
    private function cbOpcode76(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0200) === 0);
    }

    /**
     * Execute Cbopcode #0x4D.
     */
    private function cbOpcode77(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0002) === 0);
    }

    /**
     * Execute Cbopcode #0x4E.
     */
    private function cbOpcode78(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x4F.
     */
    private function cbOpcode79(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x02) === 0);
    }

    /**
     * Execute Cbopcode #0x50.
     */
    private function cbOpcode80(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x51.
     */
    private function cbOpcode81(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x52.
     */
    private function cbOpcode82(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x53.
     */
    private function cbOpcode83(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x54.
     */
    private function cbOpcode84(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0400) === 0);
    }

    /**
     * Execute Cbopcode #0x55.
     */
    private function cbOpcode85(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0004) === 0);
    }

    /**
     * Execute Cbopcode #0x56.
     */
    private function cbOpcode86(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x57.
     */
    private function cbOpcode87(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x04) === 0);
    }

    /**
     * Execute Cbopcode #0x58.
     */
    private function cbOpcode88(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x59.
     */
    private function cbOpcode89(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x5A.
     */
    private function cbOpcode90(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x5B.
     */
    private function cbOpcode91(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x5C.
     */
    private function cbOpcode92(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0800) === 0);
    }

    /**
     * Execute Cbopcode #0x5D.
     */
    private function cbOpcode93(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0008) === 0);
    }

    /**
     * Execute Cbopcode #0x5E.
     */
    private function cbOpcode94(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x5F.
     */
    private function cbOpcode95(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x08) === 0);
    }

    /**
     * Execute Cbopcode #0x60.
     */
    private function cbOpcode96(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x61.
     */
    private function cbOpcode97(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x62.
     */
    private function cbOpcode98(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x63.
     */
    private function cbOpcode99(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x64.
     */
    private function cbOpcode100(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x1000) === 0);
    }

    /**
     * Execute Cbopcode #0x65.
     */
    private function cbOpcode101(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0010) === 0);
    }

    /**
     * Execute Cbopcode #0x66.
     */
    private function cbOpcode102(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x67.
     */
    private function cbOpcode103(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x10) === 0);
    }

    /**
     * Execute Cbopcode #0x68.
     */
    private function cbOpcode104(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x69.
     */
    private function cbOpcode105(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x6A.
     */
    private function cbOpcode106(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x6B.
     */
    private function cbOpcode107(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x6C.
     */
    private function cbOpcode108(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x2000) === 0);
    }

    /**
     * Execute Cbopcode #0x6D.
     */
    private function cbOpcode109(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0020) === 0);
    }

    /**
     * Execute Cbopcode #0x6E.
     */
    private function cbOpcode110(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x6F.
     */
    private function cbOpcode111(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x20) === 0);
    }

    /**
     * Execute Cbopcode #0x70.
     */
    private function cbOpcode112(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x71.
     */
    private function cbOpcode113(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x72.
     */
    private function cbOpcode114(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x73.
     */
    private function cbOpcode115(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x74.
     */
    private function cbOpcode116(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x4000) === 0);
    }

    /**
     * Execute Cbopcode #0x75.
     */
    private function cbOpcode117(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0040) === 0);
    }

    /**
     * Execute Cbopcode #0x76.
     */
    private function cbOpcode118(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x77.
     */
    private function cbOpcode119(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x40) === 0);
    }

    /**
     * Execute Cbopcode #0x78.
     */
    private function cbOpcode120(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x79.
     */
    private function cbOpcode121(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x7A.
     */
    private function cbOpcode122(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x7B.
     */
    private function cbOpcode123(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x7C.
     */
    private function cbOpcode124(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x8000) === 0);
    }

    /**
     * Execute Cbopcode #0x7D.
     */
    private function cbOpcode125(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0080) === 0);
    }

    /**
     * Execute Cbopcode #0x7E.
     */
    private function cbOpcode126(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memory->readMemory($this->registersHL) & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x7F.
     */
    private function cbOpcode127(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x80) === 0);
    }

    /**
     * Execute Cbopcode #0x80.
     */
    private function cbOpcode128(): void
    {
        $this->registerB &= 0xFE;
    }

    /**
     * Execute Cbopcode #0x81.
     */
    private function cbOpcode129(): void
    {
        $this->registerC &= 0xFE;
    }

    /**
     * Execute Cbopcode #0x82.
     */
    private function cbOpcode130(): void
    {
        $this->registerD &= 0xFE;
    }

    /**
     * Execute Cbopcode #0x83.
     */
    private function cbOpcode131(): void
    {
        $this->registerE &= 0xFE;
    }

    /**
     * Execute Cbopcode #0x84.
     */
    private function cbOpcode132(): void
    {
        $this->registersHL &= 0xFEFF;
    }

    /**
     * Execute Cbopcode #0x85.
     */
    private function cbOpcode133(): void
    {
        $this->registersHL &= 0xFFFE;
    }

    /**
     * Execute Cbopcode #0x86.
     */
    private function cbOpcode134(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xFE);
    }

    /**
     * Execute Cbopcode #0x87.
     */
    private function cbOpcode135(): void
    {
        $this->registerA &= 0xFE;
    }

    /**
     * Execute Cbopcode #0x88.
     */
    private function cbOpcode136(): void
    {
        $this->registerB &= 0xFD;
    }

    /**
     * Execute Cbopcode #0x89.
     */
    private function cbOpcode137(): void
    {
        $this->registerC &= 0xFD;
    }

    /**
     * Execute Cbopcode #0x8A.
     */
    private function cbOpcode138(): void
    {
        $this->registerD &= 0xFD;
    }

    /**
     * Execute Cbopcode #0x8B.
     */
    private function cbOpcode139(): void
    {
        $this->registerE &= 0xFD;
    }

    /**
     * Execute Cbopcode #0x8C.
     */
    private function cbOpcode140(): void
    {
        $this->registersHL &= 0xFDFF;
    }

    /**
     * Execute Cbopcode #0x8D.
     */
    private function cbOpcode141(): void
    {
        $this->registersHL &= 0xFFFD;
    }

    /**
     * Execute Cbopcode #0x8E.
     */
    private function cbOpcode142(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xFD);
    }

    /**
     * Execute Cbopcode #0x8F.
     */
    private function cbOpcode143(): void
    {
        $this->registerA &= 0xFD;
    }

    /**
     * Execute Cbopcode #0x90.
     */
    private function cbOpcode144(): void
    {
        $this->registerB &= 0xFB;
    }

    /**
     * Execute Cbopcode #0x91.
     */
    private function cbOpcode145(): void
    {
        $this->registerC &= 0xFB;
    }

    /**
     * Execute Cbopcode #0x92.
     */
    private function cbOpcode146(): void
    {
        $this->registerD &= 0xFB;
    }

    /**
     * Execute Cbopcode #0x93.
     */
    private function cbOpcode147(): void
    {
        $this->registerE &= 0xFB;
    }

    /**
     * Execute Cbopcode #0x94.
     */
    private function cbOpcode148(): void
    {
        $this->registersHL &= 0xFBFF;
    }

    /**
     * Execute Cbopcode #0x95.
     */
    private function cbOpcode149(): void
    {
        $this->registersHL &= 0xFFFB;
    }

    /**
     * Execute Cbopcode #0x96.
     */
    private function cbOpcode150(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xFB);
    }

    /**
     * Execute Cbopcode #0x97.
     */
    private function cbOpcode151(): void
    {
        $this->registerA &= 0xFB;
    }

    /**
     * Execute Cbopcode #0x98.
     */
    private function cbOpcode152(): void
    {
        $this->registerB &= 0xF7;
    }

    /**
     * Execute Cbopcode #0x99.
     */
    private function cbOpcode153(): void
    {
        $this->registerC &= 0xF7;
    }

    /**
     * Execute Cbopcode #0x9A.
     */
    private function cbOpcode154(): void
    {
        $this->registerD &= 0xF7;
    }

    /**
     * Execute Cbopcode #0x9B.
     */
    private function cbOpcode155(): void
    {
        $this->registerE &= 0xF7;
    }

    /**
     * Execute Cbopcode #0x9C.
     */
    private function cbOpcode156(): void
    {
        $this->registersHL &= 0xF7FF;
    }

    /**
     * Execute Cbopcode #0x9D.
     */
    private function cbOpcode157(): void
    {
        $this->registersHL &= 0xFFF7;
    }

    /**
     * Execute Cbopcode #0x9E.
     */
    private function cbOpcode158(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xF7);
    }

    /**
     * Execute Cbopcode #0x9F.
     */
    private function cbOpcode159(): void
    {
        $this->registerA &= 0xF7;
    }

    /**
     * Execute Cbopcode #0xA0.
     */
    private function cbOpcode160(): void
    {
        $this->registerB &= 0xEF;
    }

    /**
     * Execute Cbopcode #0xA1.
     */
    private function cbOpcode161(): void
    {
        $this->registerC &= 0xEF;
    }

    /**
     * Execute Cbopcode #0xA2.
     */
    private function cbOpcode162(): void
    {
        $this->registerD &= 0xEF;
    }

    /**
     * Execute Cbopcode #0xA3.
     */
    private function cbOpcode163(): void
    {
        $this->registerE &= 0xEF;
    }

    /**
     * Execute Cbopcode #0xA4.
     */
    private function cbOpcode164(): void
    {
        $this->registersHL &= 0xEFFF;
    }

    /**
     * Execute Cbopcode #0xA5.
     */
    private function cbOpcode165(): void
    {
        $this->registersHL &= 0xFFEF;
    }

    /**
     * Execute Cbopcode #0xA6.
     */
    private function cbOpcode166(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xEF);
    }

    /**
     * Execute Cbopcode #0xA7.
     */
    private function cbOpcode167(): void
    {
        $this->registerA &= 0xEF;
    }

    /**
     * Execute Cbopcode #0xA8.
     */
    private function cbOpcode168(): void
    {
        $this->registerB &= 0xDF;
    }

    /**
     * Execute Cbopcode #0xA9.
     */
    private function cbOpcode169(): void
    {
        $this->registerC &= 0xDF;
    }

    /**
     * Execute Cbopcode #0xAA.
     */
    private function cbOpcode170(): void
    {
        $this->registerD &= 0xDF;
    }

    /**
     * Execute Cbopcode #0xAB.
     */
    private function cbOpcode171(): void
    {
        $this->registerE &= 0xDF;
    }

    /**
     * Execute Cbopcode #0xAC.
     */
    private function cbOpcode172(): void
    {
        $this->registersHL &= 0xDFFF;
    }

    /**
     * Execute Cbopcode #0xAD.
     */
    private function cbOpcode173(): void
    {
        $this->registersHL &= 0xFFDF;
    }

    /**
     * Execute Cbopcode #0xAE.
     */
    private function cbOpcode174(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xDF);
    }

    /**
     * Execute Cbopcode #0xAF.
     */
    private function cbOpcode175(): void
    {
        $this->registerA &= 0xDF;
    }

    /**
     * Execute Cbopcode #0xB0.
     */
    private function cbOpcode176(): void
    {
        $this->registerB &= 0xBF;
    }

    /**
     * Execute Cbopcode #0xB1.
     */
    private function cbOpcode177(): void
    {
        $this->registerC &= 0xBF;
    }

    /**
     * Execute Cbopcode #0xB2.
     */
    private function cbOpcode178(): void
    {
        $this->registerD &= 0xBF;
    }

    /**
     * Execute Cbopcode #0xB3.
     */
    private function cbOpcode179(): void
    {
        $this->registerE &= 0xBF;
    }

    /**
     * Execute Cbopcode #0xB4.
     */
    private function cbOpcode180(): void
    {
        $this->registersHL &= 0xBFFF;
    }

    /**
     * Execute Cbopcode #0xB5.
     */
    private function cbOpcode181(): void
    {
        $this->registersHL &= 0xFFBF;
    }

    /**
     * Execute Cbopcode #0xB6.
     */
    private function cbOpcode182(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0xBF);
    }

    /**
     * Execute Cbopcode #0xB7.
     */
    private function cbOpcode183(): void
    {
        $this->registerA &= 0xBF;
    }

    /**
     * Execute Cbopcode #0xB8.
     */
    private function cbOpcode184(): void
    {
        $this->registerB &= 0x7F;
    }

    /**
     * Execute Cbopcode #0xB9.
     */
    private function cbOpcode185(): void
    {
        $this->registerC &= 0x7F;
    }

    /**
     * Execute Cbopcode #0xBA.
     */
    private function cbOpcode186(): void
    {
        $this->registerD &= 0x7F;
    }

    /**
     * Execute Cbopcode #0xBB.
     */
    private function cbOpcode187(): void
    {
        $this->registerE &= 0x7F;
    }

    /**
     * Execute Cbopcode #0xBC.
     */
    private function cbOpcode188(): void
    {
        $this->registersHL &= 0x7FFF;
    }

    /**
     * Execute Cbopcode #0xBD.
     */
    private function cbOpcode189(): void
    {
        $this->registersHL &= 0xFF7F;
    }

    /**
     * Execute Cbopcode #0xBE.
     */
    private function cbOpcode190(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) & 0x7F);
    }

    /**
     * Execute Cbopcode #0xBF.
     */
    private function cbOpcode191(): void
    {
        $this->registerA &= 0x7F;
    }

    /**
     * Execute Cbopcode #0xC0.
     */
    private function cbOpcode192(): void
    {
        $this->registerB |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC1.
     */
    private function cbOpcode193(): void
    {
        $this->registerC |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC2.
     */
    private function cbOpcode194(): void
    {
        $this->registerD |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC3.
     */
    private function cbOpcode195(): void
    {
        $this->registerE |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC4.
     */
    private function cbOpcode196(): void
    {
        $this->registersHL |= 0x0100;
    }

    /**
     * Execute Cbopcode #0xC5.
     */
    private function cbOpcode197(): void
    {
        $this->registersHL |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC6.
     */
    private function cbOpcode198(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x01);
    }

    /**
     * Execute Cbopcode #0xC7.
     */
    private function cbOpcode199(): void
    {
        $this->registerA |= 0x01;
    }

    /**
     * Execute Cbopcode #0xC8.
     */
    private function cbOpcode200(): void
    {
        $this->registerB |= 0x02;
    }

    /**
     * Execute Cbopcode #0xC9.
     */
    private function cbOpcode201(): void
    {
        $this->registerC |= 0x02;
    }

    /**
     * Execute Cbopcode #0xCA.
     */
    private function cbOpcode202(): void
    {
        $this->registerD |= 0x02;
    }

    /**
     * Execute Cbopcode #0xCB.
     */
    private function cbOpcode203(): void
    {
        $this->registerE |= 0x02;
    }

    /**
     * Execute Cbopcode #0xCC.
     */
    private function cbOpcode204(): void
    {
        $this->registersHL |= 0x0200;
    }

    /**
     * Execute Cbopcode #0xCD.
     */
    private function cbOpcode205(): void
    {
        $this->registersHL |= 0x02;
    }

    /**
     * Execute Cbopcode #0xCE.
     */
    private function cbOpcode206(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x02);
    }

    /**
     * Execute Cbopcode #0xCF.
     */
    private function cbOpcode207(): void
    {
        $this->registerA |= 0x02;
    }

    /**
     * Execute Cbopcode #0xD0.
     */
    private function cbOpcode208(): void
    {
        $this->registerB |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD1.
     */
    private function cbOpcode209(): void
    {
        $this->registerC |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD2.
     */
    private function cbOpcode210(): void
    {
        $this->registerD |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD3.
     */
    private function cbOpcode211(): void
    {
        $this->registerE |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD4.
     */
    private function cbOpcode212(): void
    {
        $this->registersHL |= 0x0400;
    }

    /**
     * Execute Cbopcode #0xD5.
     */
    private function cbOpcode213(): void
    {
        $this->registersHL |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD6.
     */
    private function cbOpcode214(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x04);
    }

    /**
     * Execute Cbopcode #0xD7.
     */
    private function cbOpcode215(): void
    {
        $this->registerA |= 0x04;
    }

    /**
     * Execute Cbopcode #0xD8.
     */
    private function cbOpcode216(): void
    {
        $this->registerB |= 0x08;
    }

    /**
     * Execute Cbopcode #0xD9.
     */
    private function cbOpcode217(): void
    {
        $this->registerC |= 0x08;
    }

    /**
     * Execute Cbopcode #0xDA.
     */
    private function cbOpcode218(): void
    {
        $this->registerD |= 0x08;
    }

    /**
     * Execute Cbopcode #0xDB.
     */
    private function cbOpcode219(): void
    {
        $this->registerE |= 0x08;
    }

    /**
     * Execute Cbopcode #0xDC.
     */
    private function cbOpcode220(): void
    {
        $this->registersHL |= 0x0800;
    }

    /**
     * Execute Cbopcode #0xDD.
     */
    private function cbOpcode221(): void
    {
        $this->registersHL |= 0x08;
    }

    /**
     * Execute Cbopcode #0xDE.
     */
    private function cbOpcode222(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x08);
    }

    /**
     * Execute Cbopcode #0xDF.
     */
    private function cbOpcode223(): void
    {
        $this->registerA |= 0x08;
    }

    /**
     * Execute Cbopcode #0xE0.
     */
    private function cbOpcode224(): void
    {
        $this->registerB |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE1.
     */
    private function cbOpcode225(): void
    {
        $this->registerC |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE2.
     */
    private function cbOpcode226(): void
    {
        $this->registerD |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE3.
     */
    private function cbOpcode227(): void
    {
        $this->registerE |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE4.
     */
    private function cbOpcode228(): void
    {
        $this->registersHL |= 0x1000;
    }

    /**
     * Execute Cbopcode #0xE5.
     */
    private function cbOpcode229(): void
    {
        $this->registersHL |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE6.
     */
    private function cbOpcode230(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x10);
    }

    /**
     * Execute Cbopcode #0xE7.
     */
    private function cbOpcode231(): void
    {
        $this->registerA |= 0x10;
    }

    /**
     * Execute Cbopcode #0xE8.
     */
    private function cbOpcode232(): void
    {
        $this->registerB |= 0x20;
    }

    /**
     * Execute Cbopcode #0xE9.
     */
    private function cbOpcode233(): void
    {
        $this->registerC |= 0x20;
    }

    /**
     * Execute Cbopcode #0xEA.
     */
    private function cbOpcode234(): void
    {
        $this->registerD |= 0x20;
    }

    /**
     * Execute Cbopcode #0xEB.
     */
    private function cbOpcode235(): void
    {
        $this->registerE |= 0x20;
    }

    /**
     * Execute Cbopcode #0xEC.
     */
    private function cbOpcode236(): void
    {
        $this->registersHL |= 0x2000;
    }

    /**
     * Execute Cbopcode #0xED.
     */
    private function cbOpcode237(): void
    {
        $this->registersHL |= 0x20;
    }

    /**
     * Execute Cbopcode #0xEE.
     */
    private function cbOpcode238(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x20);
    }

    /**
     * Execute Cbopcode #0xEF.
     */
    private function cbOpcode239(): void
    {
        $this->registerA |= 0x20;
    }

    /**
     * Execute Cbopcode #0xF0.
     */
    private function cbOpcode240(): void
    {
        $this->registerB |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF1.
     */
    private function cbOpcode241(): void
    {
        $this->registerC |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF2.
     */
    private function cbOpcode242(): void
    {
        $this->registerD |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF3.
     */
    private function cbOpcode243(): void
    {
        $this->registerE |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF4.
     */
    private function cbOpcode244(): void
    {
        $this->registersHL |= 0x4000;
    }

    /**
     * Execute Cbopcode #0xF5.
     */
    private function cbOpcode245(): void
    {
        $this->registersHL |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF6.
     */
    private function cbOpcode246(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x40);
    }

    /**
     * Execute Cbopcode #0xF7.
     */
    private function cbOpcode247(): void
    {
        $this->registerA |= 0x40;
    }

    /**
     * Execute Cbopcode #0xF8.
     */
    private function cbOpcode248(): void
    {
        $this->registerB |= 0x80;
    }

    /**
     * Execute Cbopcode #0xF9.
     */
    private function cbOpcode249(): void
    {
        $this->registerC |= 0x80;
    }

    /**
     * Execute Cbopcode #0xFA.
     */
    private function cbOpcode250(): void
    {
        $this->registerD |= 0x80;
    }

    /**
     * Execute Cbopcode #0xFB.
     */
    private function cbOpcode251(): void
    {
        $this->registerE |= 0x80;
    }

    /**
     * Execute Cbopcode #0xFC.
     */
    private function cbOpcode252(): void
    {
        $this->registersHL |= 0x8000;
    }

    /**
     * Execute Cbopcode #0xFD.
     */
    private function cbOpcode253(): void
    {
        $this->registersHL |= 0x80;
    }

    /**
     * Execute Cbopcode #0xFE.
     */
    private function cbOpcode254(): void
    {
        $this->memory->writeMemory($this->registersHL, $this->memory->readMemory($this->registersHL) | 0x80);
    }

    /**
     * Execute Cbopcode #0xFF.
     */
    private function cbOpcode255(): void
    {
        $this->registerA |= 0x80;
    }
}
