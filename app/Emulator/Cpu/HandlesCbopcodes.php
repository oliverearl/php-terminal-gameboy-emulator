<?php

namespace App\Emulator\Cpu;

/** @mixin \App\Emulator\Cpu\Cpu */
trait HandlesCbopcodes
{
    /**
     * Run the given cbopcode.
     */
    public function runCbopcode(int $address): void
    {
        match ($address) {
            1 => self::cbopcode1(), 2 => self::cbopcode2(), 3 => self::cbopcode3(),
            4 => self::cbopcode4(), 5 => self::cbopcode5(), 6 => self::cbopcode6(),
            7 => self::cbopcode7(), 8 => self::cbopcode8(), 9 => self::cbopcode9(),
            10 => self::cbopcode10(), 11 => self::cbopcode11(), 12 => self::cbopcode12(),
            13 => self::cbopcode13(), 14 => self::cbopcode14(), 15 => self::cbopcode15(),
            16 => self::cbopcode16(), 17 => self::cbopcode17(), 18 => self::cbopcode18(),
            19 => self::cbopcode19(), 20 => self::cbopcode20(), 21 => self::cbopcode21(),
            22 => self::cbopcode22(), 23 => self::cbopcode23(), 24 => self::cbopcode24(),
            25 => self::cbopcode25(), 26 => self::cbopcode26(), 27 => self::cbopcode27(),
            28 => self::cbopcode28(), 29 => self::cbopcode29(), 30 => self::cbopcode30(),
            31 => self::cbopcode31(), 32 => self::cbopcode32(), 33 => self::cbopcode33(),
            34 => self::cbopcode34(), 35 => self::cbopcode35(), 36 => self::cbopcode36(),
            37 => self::cbopcode37(), 38 => self::cbopcode38(), 39 => self::cbopcode39(),
            40 => self::cbopcode40(), 41 => self::cbopcode41(), 42 => self::cbopcode42(),
            43 => self::cbopcode43(), 44 => self::cbopcode44(), 45 => self::cbopcode45(),
            46 => self::cbopcode46(), 47 => self::cbopcode47(), 48 => self::cbopcode48(),
            49 => self::cbopcode49(), 50 => self::cbopcode50(), 51 => self::cbopcode51(),
            52 => self::cbopcode52(), 53 => self::cbopcode53(), 54 => self::cbopcode54(),
            55 => self::cbopcode55(), 56 => self::cbopcode56(), 57 => self::cbopcode57(),
            58 => self::cbopcode58(), 59 => self::cbopcode59(), 60 => self::cbopcode60(),
            61 => self::cbopcode61(), 62 => self::cbopcode62(), 63 => self::cbopcode63(),
            64 => self::cbopcode64(), 65 => self::cbopcode65(), 66 => self::cbopcode66(),
            67 => self::cbopcode67(), 68 => self::cbopcode68(), 69 => self::cbopcode69(),
            70 => self::cbopcode70(), 71 => self::cbopcode71(), 72 => self::cbopcode72(),
            73 => self::cbopcode73(), 74 => self::cbopcode74(), 75 => self::cbopcode75(),
            76 => self::cbopcode76(), 77 => self::cbopcode77(), 78 => self::cbopcode78(),
            79 => self::cbopcode79(), 80 => self::cbopcode80(), 81 => self::cbopcode81(),
            82 => self::cbopcode82(), 83 => self::cbopcode83(), 84 => self::cbopcode84(),
            85 => self::cbopcode85(), 86 => self::cbopcode86(), 87 => self::cbopcode87(),
            88 => self::cbopcode88(), 89 => self::cbopcode89(), 90 => self::cbopcode90(),
            91 => self::cbopcode91(), 92 => self::cbopcode92(), 93 => self::cbopcode93(),
            94 => self::cbopcode94(), 95 => self::cbopcode95(), 96 => self::cbopcode96(),
            97 => self::cbopcode97(), 98 => self::cbopcode98(), 99 => self::cbopcode99(),
            100 => self::cbopcode100(), 101 => self::cbopcode101(), 102 => self::cbopcode102(),
            103 => self::cbopcode103(), 104 => self::cbopcode104(), 105 => self::cbopcode105(),
            106 => self::cbopcode106(), 107 => self::cbopcode107(), 108 => self::cbopcode108(),
            109 => self::cbopcode109(), 110 => self::cbopcode110(), 111 => self::cbopcode111(),
            112 => self::cbopcode112(), 113 => self::cbopcode113(), 114 => self::cbopcode114(),
            115 => self::cbopcode115(), 116 => self::cbopcode116(), 117 => self::cbopcode117(),
            118 => self::cbopcode118(), 119 => self::cbopcode119(), 120 => self::cbopcode120(),
            121 => self::cbopcode121(), 122 => self::cbopcode122(), 123 => self::cbopcode123(),
            124 => self::cbopcode124(), 125 => self::cbopcode125(), 126 => self::cbopcode126(),
            127 => self::cbopcode127(), 128 => self::cbopcode128(), 129 => self::cbopcode129(),
            130 => self::cbopcode130(), 131 => self::cbopcode131(), 132 => self::cbopcode132(),
            133 => self::cbopcode133(), 134 => self::cbopcode134(), 135 => self::cbopcode135(),
            136 => self::cbopcode136(), 137 => self::cbopcode137(), 138 => self::cbopcode138(),
            139 => self::cbopcode139(), 140 => self::cbopcode140(), 141 => self::cbopcode141(),
            142 => self::cbopcode142(), 143 => self::cbopcode143(), 144 => self::cbopcode144(),
            145 => self::cbopcode145(), 146 => self::cbopcode146(), 147 => self::cbopcode147(),
            148 => self::cbopcode148(), 149 => self::cbopcode149(), 150 => self::cbopcode150(),
            151 => self::cbopcode151(), 152 => self::cbopcode152(), 153 => self::cbopcode153(),
            154 => self::cbopcode154(), 155 => self::cbopcode155(), 156 => self::cbopcode156(),
            157 => self::cbopcode157(), 158 => self::cbopcode158(), 159 => self::cbopcode159(),
            160 => self::cbopcode160(), 161 => self::cbopcode161(), 162 => self::cbopcode162(),
            163 => self::cbopcode163(), 164 => self::cbopcode164(), 165 => self::cbopcode165(),
            166 => self::cbopcode166(), 167 => self::cbopcode167(), 168 => self::cbopcode168(),
            169 => self::cbopcode169(), 170 => self::cbopcode170(), 171 => self::cbopcode171(),
            172 => self::cbopcode172(), 173 => self::cbopcode173(), 174 => self::cbopcode174(),
            175 => self::cbopcode175(), 176 => self::cbopcode176(), 177 => self::cbopcode177(),
            178 => self::cbopcode178(), 179 => self::cbopcode179(), 180 => self::cbopcode180(),
            181 => self::cbopcode181(), 182 => self::cbopcode182(), 183 => self::cbopcode183(),
            184 => self::cbopcode184(), 185 => self::cbopcode185(), 186 => self::cbopcode186(),
            187 => self::cbopcode187(), 188 => self::cbopcode188(), 189 => self::cbopcode189(),
            190 => self::cbopcode190(), 191 => self::cbopcode191(), 192 => self::cbopcode192(),
            193 => self::cbopcode193(), 194 => self::cbopcode194(), 195 => self::cbopcode195(),
            196 => self::cbopcode196(), 197 => self::cbopcode197(), 198 => self::cbopcode198(),
            199 => self::cbopcode199(), 200 => self::cbopcode200(), 201 => self::cbopcode201(),
            202 => self::cbopcode202(), 203 => self::cbopcode203(), 204 => self::cbopcode204(),
            205 => self::cbopcode205(), 206 => self::cbopcode206(), 207 => self::cbopcode207(),
            208 => self::cbopcode208(), 209 => self::cbopcode209(), 210 => self::cbopcode210(),
            211 => self::cbopcode211(), 212 => self::cbopcode212(), 213 => self::cbopcode213(),
            214 => self::cbopcode214(), 215 => self::cbopcode215(), 216 => self::cbopcode216(),
            217 => self::cbopcode217(), 218 => self::cbopcode218(), 219 => self::cbopcode219(),
            220 => self::cbopcode220(), 221 => self::cbopcode221(), 222 => self::cbopcode222(),
            223 => self::cbopcode223(), 224 => self::cbopcode224(), 225 => self::cbopcode225(),
            226 => self::cbopcode226(), 227 => self::cbopcode227(), 228 => self::cbopcode228(),
            229 => self::cbopcode229(), 230 => self::cbopcode230(), 231 => self::cbopcode231(),
            232 => self::cbopcode232(), 233 => self::cbopcode233(), 234 => self::cbopcode234(),
            235 => self::cbopcode235(), 236 => self::cbopcode236(), 237 => self::cbopcode237(),
            238 => self::cbopcode238(), 239 => self::cbopcode239(), 240 => self::cbopcode240(),
            241 => self::cbopcode241(), 242 => self::cbopcode242(), 243 => self::cbopcode243(),
            244 => self::cbopcode244(), 245 => self::cbopcode245(), 246 => self::cbopcode246(),
            247 => self::cbopcode247(), 248 => self::cbopcode248(), 249 => self::cbopcode249(),
            250 => self::cbopcode250(), 251 => self::cbopcode251(), 252 => self::cbopcode252(),
            253 => self::cbopcode253(), 254 => self::cbopcode254(), 255 => self::cbopcode255(),
            default => self::cbopcode0(),
        };
    }

    /**
     * Cbopcode #0x00.
     */
    private function cbopcode0(): void
    {
        $this->FCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = (($this->registerB << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x01.
     */
    private function cbopcode1(): void
    {
        $this->FCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = (($this->registerC << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x02.
     */
    private function cbopcode2(): void
    {
        $this->FCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = (($this->registerD << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x03.
     */
    private function cbopcode3(): void
    {
        $this->FCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = (($this->registerE << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x04.
     */
    private function cbopcode4(): void
    {
        $this->FCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + (($this->FCarry) ? 0x100 : 0) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x05.
     */
    private function cbopcode5(): void
    {
        $this->FCarry = (($this->registersHL & 0x80) === 0x80);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x06.
     */
    private function cbopcode6(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $this->FCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x07.
     */
    private function cbopcode7(): void
    {
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x08.
     */
    private function cbopcode8(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = (($this->FCarry) ? 0x80 : 0) + ($this->registerB >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x09.
     */
    private function cbopcode9(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = (($this->FCarry) ? 0x80 : 0) + ($this->registerC >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x0A.
     */
    private function cbopcode10(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = (($this->FCarry) ? 0x80 : 0) + ($this->registerD >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x0B.
     */
    private function cbopcode11(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = (($this->FCarry) ? 0x80 : 0) + ($this->registerE >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x0C.
     */
    private function cbopcode12(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->FCarry) ? 0x8000 : 0) + (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x0D.
     */
    private function cbopcode13(): void
    {
        $this->FCarry = (($this->registersHL & 0x01) === 0x01);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->FCarry) ? 0x80 : 0) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x0E.
     */
    private function cbopcode14(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = (($this->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x0F.
     */
    private function cbopcode15(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = (($this->FCarry) ? 0x80 : 0) + ($this->registerA >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x10.
     */
    private function cbopcode16(): void
    {
        $newFCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = (($this->registerB << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x11.
     */
    private function cbopcode17(): void
    {
        $newFCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = (($this->registerC << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x12.
     */
    private function cbopcode18(): void
    {
        $newFCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = (($this->registerD << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x13.
     */
    private function cbopcode19(): void
    {
        $newFCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = (($this->registerE << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x14.
     */
    private function cbopcode20(): void
    {
        $newFCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + (($this->FCarry) ? 0x100 : 0) + ($this->registersHL & 0xFF);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x15.
     */
    private function cbopcode21(): void
    {
        $newFCarry = (($this->registersHL & 0x80) === 0x80);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x16.
     */
    private function cbopcode22(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $newFCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x17.
     */
    private function cbopcode23(): void
    {
        $newFCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = (($this->registerA << 1) & 0xFF) + (($this->FCarry) ? 1 : 0);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x18.
     */
    private function cbopcode24(): void
    {
        $newFCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = (($this->FCarry) ? 0x80 : 0) + ($this->registerB >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x19.
     */
    private function cbopcode25(): void
    {
        $newFCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = (($this->FCarry) ? 0x80 : 0) + ($this->registerC >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x1A.
     */
    private function cbopcode26(): void
    {
        $newFCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = (($this->FCarry) ? 0x80 : 0) + ($this->registerD >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x1B.
     */
    private function cbopcode27(): void
    {
        $newFCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = (($this->FCarry) ? 0x80 : 0) + ($this->registerE >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x1C.
     */
    private function cbopcode28(): void
    {
        $newFCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->FCarry) ? 0x8000 : 0) + (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x1D.
     */
    private function cbopcode29(): void
    {
        $newFCarry = (($this->registersHL & 0x01) === 0x01);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->FCarry) ? 0x80 : 0) + (($this->registersHL & 0xFF) >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x1E.
     */
    private function cbopcode30(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $newFCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = (($this->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $this->FCarry = $newFCarry;
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x1F.
     */
    private function cbopcode31(): void
    {
        $newFCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = (($this->FCarry) ? 0x80 : 0) + ($this->registerA >> 1);
        $this->FCarry = $newFCarry;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x20.
     */
    private function cbopcode32(): void
    {
        $this->FCarry = (($this->registerB & 0x80) === 0x80);
        $this->registerB = ($this->registerB << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x21.
     */
    private function cbopcode33(): void
    {
        $this->FCarry = (($this->registerC & 0x80) === 0x80);
        $this->registerC = ($this->registerC << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x22.
     */
    private function cbopcode34(): void
    {
        $this->FCarry = (($this->registerD & 0x80) === 0x80);
        $this->registerD = ($this->registerD << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x23.
     */
    private function cbopcode35(): void
    {
        $this->FCarry = (($this->registerE & 0x80) === 0x80);
        $this->registerE = ($this->registerE << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x24.
     */
    private function cbopcode36(): void
    {
        $this->FCarry = (($this->registersHL & 0x8000) === 0x8000);
        $this->registersHL = (($this->registersHL << 1) & 0xFE00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x25.
     */
    private function cbopcode37(): void
    {
        $this->FCarry = (($this->registersHL & 0x0080) === 0x0080);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL << 1) & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x26.
     */
    private function cbopcode38(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $this->FCarry = (($temp_var & 0x80) === 0x80);
        $temp_var = ($temp_var << 1) & 0xFF;
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x27.
     */
    private function cbopcode39(): void
    {
        $this->FCarry = (($this->registerA & 0x80) === 0x80);
        $this->registerA = ($this->registerA << 1) & 0xFF;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x28.
     */
    private function cbopcode40(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB = ($this->registerB & 0x80) + ($this->registerB >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x29.
     */
    private function cbopcode41(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC = ($this->registerC & 0x80) + ($this->registerC >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x2A.
     */
    private function cbopcode42(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD = ($this->registerD & 0x80) + ($this->registerD >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x2B.
     */
    private function cbopcode43(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE = ($this->registerE & 0x80) + ($this->registerE >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     *
     * Cbopcode #0x2C.
     */
    private function cbopcode44(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0x80FF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x2D.
     */
    private function cbopcode45(): void
    {
        $this->FCarry = (($this->registersHL & 0x0001) === 0x0001);
        $this->registersHL = ($this->registersHL & 0xFF80) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x2E.
     */
    private function cbopcode46(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $temp_var = ($temp_var & 0x80) + ($temp_var >> 1);
        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x2F.
     */
    private function cbopcode47(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA = ($this->registerA & 0x80) + ($this->registerA >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x30.
     */
    private function cbopcode48(): void
    {
        $this->registerB = (($this->registerB & 0xF) << 4) + ($this->registerB >> 4);
        $this->FZero = ($this->registerB === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x31.
     */
    private function cbopcode49(): void
    {
        $this->registerC = (($this->registerC & 0xF) << 4) + ($this->registerC >> 4);
        $this->FZero = ($this->registerC === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x32.
     */
    private function cbopcode50(): void
    {
        $this->registerD = (($this->registerD & 0xF) << 4) + ($this->registerD >> 4);
        $this->FZero = ($this->registerD === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x33.
     */
    private function cbopcode51(): void
    {
        $this->registerE = (($this->registerE & 0xF) << 4) + ($this->registerE >> 4);
        $this->FZero = ($this->registerE === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x34.
     */
    private function cbopcode52(): void
    {
        $this->registersHL = (($this->registersHL & 0xF00) << 4) + (($this->registersHL & 0xF000) >> 4) + ($this->registersHL & 0xFF);
        $this->FZero = ($this->registersHL <= 0xFF);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x35.
     */
    private function cbopcode53(): void
    {
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL & 0xF) << 4) + (($this->registersHL & 0xF0) >> 4);
        $this->FZero = (($this->registersHL & 0xFF) === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x36.
     */
    private function cbopcode54(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $temp_var = (($temp_var & 0xF) << 4) + ($temp_var >> 4);

        $this->memoryWrite($this->registersHL, $temp_var);
        $this->FZero = ($temp_var === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x37.
     */
    private function cbopcode55(): void
    {
        $this->registerA = (($this->registerA & 0xF) << 4) + ($this->registerA >> 4);
        $this->FZero = ($this->registerA === 0);
        $this->FCarry = false;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
    }

    /**
     * Cbopcode #0x38.
     */
    private function cbopcode56(): void
    {
        $this->FCarry = (($this->registerB & 0x01) === 0x01);
        $this->registerB >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerB === 0);
    }

    /**
     * Cbopcode #0x39.
     */
    private function cbopcode57(): void
    {
        $this->FCarry = (($this->registerC & 0x01) === 0x01);
        $this->registerC >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerC === 0);
    }

    /**
     * Cbopcode #0x3A.
     */
    private function cbopcode58(): void
    {
        $this->FCarry = (($this->registerD & 0x01) === 0x01);
        $this->registerD >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerD === 0);
    }

    /**
     * Cbopcode #0x3B.
     */
    private function cbopcode59(): void
    {
        $this->FCarry = (($this->registerE & 0x01) === 0x01);
        $this->registerE >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerE === 0);
    }

    /**
     * Cbopcode #0x3C.
     */
    private function cbopcode60(): void
    {
        $this->FCarry = (($this->registersHL & 0x0100) === 0x0100);
        $this->registersHL = (($this->registersHL >> 1) & 0xFF00) + ($this->registersHL & 0xFF);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x3D.
     */
    private function cbopcode61(): void
    {
        $this->FCarry = (($this->registersHL & 0x0001) === 0x0001);
        $this->registersHL = ($this->registersHL & 0xFF00) + (($this->registersHL & 0xFF) >> 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0xFF) === 0x00);
    }

    /**
     * Cbopcode #0x3E.
     */
    private function cbopcode62(): void
    {
        $temp_var = $this->memoryRead($this->registersHL);
        $this->FCarry = (($temp_var & 0x01) === 0x01);
        $this->memoryWrite($this->registersHL, $temp_var >>= 1);
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($temp_var === 0x00);
    }

    /**
     * Cbopcode #0x3F.
     */
    private function cbopcode63(): void
    {
        $this->FCarry = (($this->registerA & 0x01) === 0x01);
        $this->registerA >>= 1;
        $this->FHalfCarry = false;
        $this->FSubtract = false;
        $this->FZero = ($this->registerA === 0x00);
    }

    /**
     * Cbopcode #0x40.
     */
    private function cbopcode64(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x01) === 0);
    }

    /**
     * Cbopcode #0x41.
     */
    private function cbopcode65(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x01) === 0);
    }

    /**
     * Cbopcode #0x42.
     */
    private function cbopcode66(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x01) === 0);
    }

    /**
     * Cbopcode #0x43.
     */
    private function cbopcode67(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x01) === 0);
    }

    /**
     * Cbopcode #0x44.
     */
    private function cbopcode68(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0100) === 0);
    }

    /**
     * Cbopcode #0x45.
     */
    private function cbopcode69(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0001) === 0);
    }

    /**
     * Cbopcode #0x46.
     */
    private function cbopcode70(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x01) === 0);
    }

    /**
     * Cbopcode #0x47.
     */
    private function cbopcode71(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x01) === 0);
    }

    /**
     * Cbopcode #0x48.
     */
    private function cbopcode72(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x02) === 0);
    }

    /**
     * Cbopcode #0x49.
     */
    private function cbopcode73(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x02) === 0);
    }

    /**
     * Cbopcode #0x4A.
     */
    private function cbopcode74(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x02) === 0);
    }

    /**
     * Cbopcode #0x4B.
     */
    private function cbopcode75(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x02) === 0);
    }

    /**
     * Cbopcode #0x4C.
     */
    private function cbopcode76(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0200) === 0);
    }

    /**
     * Cbopcode #0x4D.
     */
    private function cbopcode77(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0002) === 0);
    }

    /**
     * Cbopcode #0x4E.
     */
    private function cbopcode78(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x02) === 0);
    }

    /**
     * Cbopcode #0x4F.
     */
    private function cbopcode79(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x02) === 0);
    }

    /**
     * Cbopcode #0x50.
     */
    private function cbopcode80(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x04) === 0);
    }

    /**
     * Cbopcode #0x51.
     */
    private function cbopcode81(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x04) === 0);
    }

    /**
     * Cbopcode #0x52.
     */
    private function cbopcode82(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x04) === 0);
    }

    /**
     * Cbopcode #0x53.
     */
    private function cbopcode83(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x04) === 0);
    }

    /**
     * Cbopcode #0x54.
     */
    private function cbopcode84(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0400) === 0);
    }

    /**
     * Cbopcode #0x55.
     */
    private function cbopcode85(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0004) === 0);
    }

    /**
     * Cbopcode #0x56.
     */
    private function cbopcode86(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x04) === 0);
    }

    /**
     * Cbopcode #0x57.
     */
    private function cbopcode87(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x04) === 0);
    }

    /**
     * Cbopcode #0x58.
     */
    private function cbopcode88(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x08) === 0);
    }

    /**
     * Cbopcode #0x59.
     */
    private function cbopcode89(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x08) === 0);
    }

    /**
     * Cbopcode #0x5A.
     */
    private function cbopcode90(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x08) === 0);
    }

    /**
     * Cbopcode #0x5B.
     */
    private function cbopcode91(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x08) === 0);
    }

    /**
     * Cbopcode #0x5C.
     */
    private function cbopcode92(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0800) === 0);
    }

    /**
     * Cbopcode #0x5D.
     */
    private function cbopcode93(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0008) === 0);
    }

    /**
     * Cbopcode #0x5E.
     */
    private function cbopcode94(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x08) === 0);
    }

    /**
     * Cbopcode #0x5F.
     */
    private function cbopcode95(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x08) === 0);
    }

    /**
     * Cbopcode #0x60.
     */
    private function cbopcode96(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x10) === 0);
    }

    /**
     * Cbopcode #0x61.
     */
    private function cbopcode97(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x10) === 0);
    }

    /**
     * Cbopcode #0x62.
     */
    private function cbopcode98(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x10) === 0);
    }

    /**
     * Cbopcode #0x63.
     */
    private function cbopcode99(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x10) === 0);
    }

    /**
     * Cbopcode #0x64.
     */
    private function cbopcode100(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x1000) === 0);
    }

    /**
     * Cbopcode #0x65.
     */
    private function cbopcode101(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0010) === 0);
    }

    /**
     * Cbopcode #0x66.
     */
    private function cbopcode102(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x10) === 0);
    }

    /**
     * Cbopcode #0x67.
     */
    private function cbopcode103(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x10) === 0);
    }

    /**
     * Cbopcode #0x68.
     */
    private function cbopcode104(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x20) === 0);
    }

    /**
     * Cbopcode #0x69.
     */
    private function cbopcode105(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x20) === 0);
    }

    /**
     * Cbopcode #0x6A.
     */
    private function cbopcode106(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x20) === 0);
    }

    /**
     * Cbopcode #0x6B.
     */
    private function cbopcode107(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x20) === 0);
    }

    /**
     * Cbopcode #0x6C.
     */
    private function cbopcode108(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x2000) === 0);
    }

    /**
     * Cbopcode #0x6D.
     */
    private function cbopcode109(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0020) === 0);
    }

    /**
     * Cbopcode #0x6E.
     */
    private function cbopcode110(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x20) === 0);
    }

    /**
     * Cbopcode #0x6F.
     */
    private function cbopcode111(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x20) === 0);
    }

    /**
     * Cbopcode #0x70.
     */
    private function cbopcode112(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x40) === 0);
    }

    /**
     * Cbopcode #0x71.
     */
    private function cbopcode113(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x40) === 0);
    }

    /**
     * Cbopcode #0x72.
     */
    private function cbopcode114(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x40) === 0);
    }

    /**
     * Cbopcode #0x73.
     */
    private function cbopcode115(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x40) === 0);
    }

    /**
     * Cbopcode #0x74.
     */
    private function cbopcode116(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x4000) === 0);
    }

    /**
     * Cbopcode #0x75.
     */
    private function cbopcode117(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0040) === 0);
    }

    /**
     * Cbopcode #0x76.
     */
    private function cbopcode118(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x40) === 0);
    }

    /**
     * Cbopcode #0x77.
     */
    private function cbopcode119(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x40) === 0);
    }

    /**
     * Cbopcode #0x78.
     */
    private function cbopcode120(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerB & 0x80) === 0);
    }

    /**
     * Cbopcode #0x79.
     */
    private function cbopcode121(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerC & 0x80) === 0);
    }

    /**
     * Cbopcode #0x7A.
     */
    private function cbopcode122(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerD & 0x80) === 0);
    }

    /**
     * Cbopcode #0x7B.
     */
    private function cbopcode123(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerE & 0x80) === 0);
    }

    /**
     * Cbopcode #0x7C.
     */
    private function cbopcode124(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x8000) === 0);
    }

    /**
     * Cbopcode #0x7D.
     */
    private function cbopcode125(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registersHL & 0x0080) === 0);
    }

    /**
     * Cbopcode #0x7E.
     */
    private function cbopcode126(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->memoryRead($this->registersHL) & 0x80) === 0);
    }

    /**
     * Cbopcode #0x7F.
     */
    private function cbopcode127(): void
    {
        $this->FHalfCarry = true;
        $this->FSubtract = false;
        $this->FZero = (($this->registerA & 0x80) === 0);
    }

    /**
     * Cbopcode #0x80.
     */
    private function cbopcode128(): void
    {
        $this->registerB &= 0xFE;
    }

    /**
     * Cbopcode #0x81.
     */
    private function cbopcode129(): void
    {
        $this->registerC &= 0xFE;
    }

    /**
     * Cbopcode #0x82.
     */
    private function cbopcode130(): void
    {
        $this->registerD &= 0xFE;
    }

    /**
     * Cbopcode #0x83.
     */
    private function cbopcode131(): void
    {
        $this->registerE &= 0xFE;
    }

    /**
     * Cbopcode #0x84.
     */
    private function cbopcode132(): void
    {
        $this->registersHL &= 0xFEFF;
    }

    /**
     * Cbopcode #0x85.
     */
    private function cbopcode133(): void
    {
        $this->registersHL &= 0xFFFE;
    }

    /**
     * Cbopcode #0x86.
     */
    private function cbopcode134(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xFE);
    }

    /**
     * Cbopcode #0x87.
     */
    private function cbopcode135(): void
    {
        $this->registerA &= 0xFE;
    }

    /**
     * Cbopcode #0x88.
     */
    private function cbopcode136(): void
    {
        $this->registerB &= 0xFD;
    }

    /**
     * Cbopcode #0x89.
     */
    private function cbopcode137(): void
    {
        $this->registerC &= 0xFD;
    }

    /**
     * Cbopcode #0x8A.
     */
    private function cbopcode138(): void
    {
        $this->registerD &= 0xFD;
    }

    /**
     * Cbopcode #0x8B.
     */
    private function cbopcode139(): void
    {
        $this->registerE &= 0xFD;
    }

    /**
     * Cbopcode #0x8C.
     */
    private function cbopcode140(): void
    {
        $this->registersHL &= 0xFDFF;
    }

    /**
     * Cbopcode #0x8D.
     */
    private function cbopcode141(): void
    {
        $this->registersHL &= 0xFFFD;
    }

    /**
     * Cbopcode #0x8E.
     */
    private function cbopcode142(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xFD);
    }

    /**
     * Cbopcode #0x8F.
     */
    private function cbopcode143(): void
    {
        $this->registerA &= 0xFD;
    }

    /**
     * Cbopcode #0x90.
     */
    private function cbopcode144(): void
    {
        $this->registerB &= 0xFB;
    }

    /**
     * Cbopcode #0x91.
     */
    private function cbopcode145(): void
    {
        $this->registerC &= 0xFB;
    }

    /**
     * Cbopcode #0x92.
     */
    private function cbopcode146(): void
    {
        $this->registerD &= 0xFB;
    }

    /**
     * Cbopcode #0x93.
     */
    private function cbopcode147(): void
    {
        $this->registerE &= 0xFB;
    }

    /**
     * Cbopcode #0x94.
     */
    private function cbopcode148(): void
    {
        $this->registersHL &= 0xFBFF;
    }

    /**
     * Cbopcode #0x95.
     */
    private function cbopcode149(): void
    {
        $this->registersHL &= 0xFFFB;
    }

    /**
     * Cbopcode #0x96.
     */
    private function cbopcode150(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xFB);
    }

    /**
     * Cbopcode #0x97.
     */
    private function cbopcode151(): void
    {
        $this->registerA &= 0xFB;
    }

    /**
     * Cbopcode #0x98.
     */
    private function cbopcode152(): void
    {
        $this->registerB &= 0xF7;
    }

    /**
     * Cbopcode #0x99.
     */
    private function cbopcode153(): void
    {
        $this->registerC &= 0xF7;
    }

    /**
     * Cbopcode #0x9A.
     */
    private function cbopcode154(): void
    {
        $this->registerD &= 0xF7;
    }

    /**
     * Cbopcode #0x9B.
     */
    private function cbopcode155(): void
    {
        $this->registerE &= 0xF7;
    }

    /**
     * Cbopcode #0x9C.
     */
    private function cbopcode156(): void
    {
        $this->registersHL &= 0xF7FF;
    }

    /**
     * Cbopcode #0x9D.
     */
    private function cbopcode157(): void
    {
        $this->registersHL &= 0xFFF7;
    }

    /**
     * Cbopcode #0x9E.
     */
    private function cbopcode158(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xF7);
    }

    /**
     * Cbopcode #0x9F.
     */
    private function cbopcode159(): void
    {
        $this->registerA &= 0xF7;
    }

    /**
     * Cbopcode #0xA0.
     */
    private function cbopcode160(): void
    {
        $this->registerB &= 0xEF;
    }

    /**
     * Cbopcode #0xA1.
     */
    private function cbopcode161(): void
    {
        $this->registerC &= 0xEF;
    }

    /**
     * Cbopcode #0xA2.
     */
    private function cbopcode162(): void
    {
        $this->registerD &= 0xEF;
    }

    /**
     * Cbopcode #0xA3.
     */
    private function cbopcode163(): void
    {
        $this->registerE &= 0xEF;
    }

    /**
     * Cbopcode #0xA4.
     */
    private function cbopcode164(): void
    {
        $this->registersHL &= 0xEFFF;
    }

    /**
     * Cbopcode #0xA5.
     */
    private function cbopcode165(): void
    {
        $this->registersHL &= 0xFFEF;
    }

    /**
     * Cbopcode #0xA6.
     */
    private function cbopcode166(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xEF);
    }

    /**
     * Cbopcode #0xA7.
     */
    private function cbopcode167(): void
    {
        $this->registerA &= 0xEF;
    }

    /**
     * Cbopcode #0xA8.
     */
    private function cbopcode168(): void
    {
        $this->registerB &= 0xDF;
    }

    /**
     * Cbopcode #0xA9.
     */
    private function cbopcode169(): void
    {
        $this->registerC &= 0xDF;
    }

    /**
     * Cbopcode #0xAA.
     */
    private function cbopcode170(): void
    {
        $this->registerD &= 0xDF;
    }

    /**
     * Cbopcode #0xAB.
     */
    private function cbopcode171(): void
    {
        $this->registerE &= 0xDF;
    }

    /**
     * Cbopcode #0xAC.
     */
    private function cbopcode172(): void
    {
        $this->registersHL &= 0xDFFF;
    }

    /**
     * Cbopcode #0xAD.
     */
    private function cbopcode173(): void
    {
        $this->registersHL &= 0xFFDF;
    }

    /**
     * Cbopcode #0xAE.
     */
    private function cbopcode174(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xDF);
    }

    /**
     * Cbopcode #0xAF.
     */
    private function cbopcode175(): void
    {
        $this->registerA &= 0xDF;
    }

    /**
     * Cbopcode #0xB0.
     */
    private function cbopcode176(): void
    {
        $this->registerB &= 0xBF;
    }

    /**
     * Cbopcode #0xB1.
     */
    private function cbopcode177(): void
    {
        $this->registerC &= 0xBF;
    }

    /**
     * Cbopcode #0xB2.
     */
    private function cbopcode178(): void
    {
        $this->registerD &= 0xBF;
    }

    /**
     * Cbopcode #0xB3.
     */
    private function cbopcode179(): void
    {
        $this->registerE &= 0xBF;
    }

    /**
     * Cbopcode #0xB4.
     */
    private function cbopcode180(): void
    {
        $this->registersHL &= 0xBFFF;
    }

    /**
     * Cbopcode #0xB5.
     */
    private function cbopcode181(): void
    {
        $this->registersHL &= 0xFFBF;
    }

    /**
     * Cbopcode #0xB6.
     */
    private function cbopcode182(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0xBF);
    }

    /**
     * Cbopcode #0xB7.
     */
    private function cbopcode183(): void
    {
        $this->registerA &= 0xBF;
    }

    /**
     * Cbopcode #0xB8.
     */
    private function cbopcode184(): void
    {
        $this->registerB &= 0x7F;
    }

    /**
     * Cbopcode #0xB9.
     */
    private function cbopcode185(): void
    {
        $this->registerC &= 0x7F;
    }

    /**
     * Cbopcode #0xBA.
     */
    private function cbopcode186(): void
    {
        $this->registerD &= 0x7F;
    }

    /**
     * Cbopcode #0xBB.
     */
    private function cbopcode187(): void
    {
        $this->registerE &= 0x7F;
    }

    /**
     * Cbopcode #0xBC.
     */
    private function cbopcode188(): void
    {
        $this->registersHL &= 0x7FFF;
    }

    /**
     * Cbopcode #0xBD.
     */
    private function cbopcode189(): void
    {
        $this->registersHL &= 0xFF7F;
    }

    /**
     * Cbopcode #0xBE.
     */
    private function cbopcode190(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) & 0x7F);
    }

    /**
     * Cbopcode #0xBF.
     */
    private function cbopcode191(): void
    {
        $this->registerA &= 0x7F;
    }

    /**
     * Cbopcode #0xC0.
     */
    private function cbopcode192(): void
    {
        $this->registerB |= 0x01;
    }

    /**
     * Cbopcode #0xC1.
     */
    private function cbopcode193(): void
    {
        $this->registerC |= 0x01;
    }

    /**
     * Cbopcode #0xC2.
     */
    private function cbopcode194(): void
    {
        $this->registerD |= 0x01;
    }

    /**
     * Cbopcode #0xC3.
     */
    private function cbopcode195(): void
    {
        $this->registerE |= 0x01;
    }

    /**
     * Cbopcode #0xC4.
     */
    private function cbopcode196(): void
    {
        $this->registersHL |= 0x0100;
    }

    /**
     * Cbopcode #0xC5.
     */
    private function cbopcode197(): void
    {
        $this->registersHL |= 0x01;
    }

    /**
     * Cbopcode #0xC6.
     */
    private function cbopcode198(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x01);
    }

    /**
     * Cbopcode #0xC7.
     */
    private function cbopcode199(): void
    {
        $this->registerA |= 0x01;
    }

    /**
     * Cbopcode #0xC8.
     */
    private function cbopcode200(): void
    {
        $this->registerB |= 0x02;
    }

    /**
     * Cbopcode #0xC9.
     */
    private function cbopcode201(): void
    {
        $this->registerC |= 0x02;
    }

    /**
     * Cbopcode #0xCA.
     */
    private function cbopcode202(): void
    {
        $this->registerD |= 0x02;
    }

    /**
     * Cbopcode #0xCB.
     */
    private function cbopcode203(): void
    {
        $this->registerE |= 0x02;
    }

    /**
     * Cbopcode #0xCC.
     */
    private function cbopcode204(): void
    {
        $this->registersHL |= 0x0200;
    }

    /**
     * Cbopcode #0xCD.
     */
    private function cbopcode205(): void
    {
        $this->registersHL |= 0x02;
    }

    /**
     * Cbopcode #0xCE.
     */
    private function cbopcode206(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x02);
    }

    /**
     * Cbopcode #0xCF.
     */
    private function cbopcode207(): void
    {
        $this->registerA |= 0x02;
    }

    /**
     * Cbopcode #0xD0.
     */
    private function cbopcode208(): void
    {
        $this->registerB |= 0x04;
    }

    /**
     * Cbopcode #0xD1.
     */
    private function cbopcode209(): void
    {
        $this->registerC |= 0x04;
    }

    /**
     * Cbopcode #0xD2.
     */
    private function cbopcode210(): void
    {
        $this->registerD |= 0x04;
    }

    /**
     * Cbopcode #0xD3.
     */
    private function cbopcode211(): void
    {
        $this->registerE |= 0x04;
    }

    /**
     * Cbopcode #0xD4.
     */
    private function cbopcode212(): void
    {
        $this->registersHL |= 0x0400;
    }

    /**
     * Cbopcode #0xD5.
     */
    private function cbopcode213(): void
    {
        $this->registersHL |= 0x04;
    }

    /**
     * Cbopcode #0xD6.
     */
    private function cbopcode214(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x04);
    }

    /**
     * Cbopcode #0xD7.
     */
    private function cbopcode215(): void
    {
        $this->registerA |= 0x04;
    }

    /**
     * Cbopcode #0xD8.
     */
    private function cbopcode216(): void
    {
        $this->registerB |= 0x08;
    }

    /**
     * Cbopcode #0xD9.
     */
    private function cbopcode217(): void
    {
        $this->registerC |= 0x08;
    }

    /**
     * Cbopcode #0xDA.
     */
    private function cbopcode218(): void
    {
        $this->registerD |= 0x08;
    }

    /**
     * Cbopcode #0xDB.
     */
    private function cbopcode219(): void
    {
        $this->registerE |= 0x08;
    }

    /**
     * Cbopcode #0xDC.
     */
    private function cbopcode220(): void
    {
        $this->registersHL |= 0x0800;
    }

    /**
     * Cbopcode #0xDD.
     */
    private function cbopcode221(): void
    {
        $this->registersHL |= 0x08;
    }

    /**
     * Cbopcode #0xDE.
     */
    private function cbopcode222(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x08);
    }

    /**
     * Cbopcode #0xDF.
     */
    private function cbopcode223(): void
    {
        $this->registerA |= 0x08;
    }

    /**
     * Cbopcode #0xE0.
     */
    private function cbopcode224(): void
    {
        $this->registerB |= 0x10;
    }

    /**
     * Cbopcode #0xE1.
     */
    private function cbopcode225(): void
    {
        $this->registerC |= 0x10;
    }

    /**
     * Cbopcode #0xE2.
     */
    private function cbopcode226(): void
    {
        $this->registerD |= 0x10;
    }

    /**
     * Cbopcode #0xE3.
     */
    private function cbopcode227(): void
    {
        $this->registerE |= 0x10;
    }

    /**
     * Cbopcode #0xE4.
     */
    private function cbopcode228(): void
    {
        $this->registersHL |= 0x1000;
    }

    /**
     * Cbopcode #0xE5.
     */
    private function cbopcode229(): void
    {
        $this->registersHL |= 0x10;
    }

    /**
     * Cbopcode #0xE6.
     */
    private function cbopcode230(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x10);
    }

    /**
     * Cbopcode #0xE7.
     */
    private function cbopcode231(): void
    {
        $this->registerA |= 0x10;
    }

    /**
     * Cbopcode #0xE8.
     */
    private function cbopcode232(): void
    {
        $this->registerB |= 0x20;
    }

    /**
     * Cbopcode #0xE9.
     */
    private function cbopcode233(): void
    {
        $this->registerC |= 0x20;
    }

    /**
     * Cbopcode #0xEA.
     */
    private function cbopcode234(): void
    {
        $this->registerD |= 0x20;
    }

    /**
     * Cbopcode #0xEB.
     */
    private function cbopcode235(): void
    {
        $this->registerE |= 0x20;
    }

    /**
     * Cbopcode #0xEC.
     */
    private function cbopcode236(): void
    {
        $this->registersHL |= 0x2000;
    }

    /**
     * Cbopcode #0xED.
     */
    private function cbopcode237(): void
    {
        $this->registersHL |= 0x20;
    }

    /**
     * Cbopcode #0xEE.
     */
    private function cbopcode238(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x20);
    }

    /**
     * Cbopcode #0xEF.
     */
    private function cbopcode239(): void
    {
        $this->registerA |= 0x20;
    }

    /**
     * Cbopcode #0xF0.
     */
    private function cbopcode240(): void
    {
        $this->registerB |= 0x40;
    }

    /**
     * Cbopcode #0xF1.
     */
    private function cbopcode241(): void
    {
        $this->registerC |= 0x40;
    }

    /**
     * Cbopcode #0xF2.
     */
    private function cbopcode242(): void
    {
        $this->registerD |= 0x40;
    }

    /**
     * Cbopcode #0xF3.
     */
    private function cbopcode243(): void
    {
        $this->registerE |= 0x40;
    }

    /**
     * Cbopcode #0xF4.
     */
    private function cbopcode244(): void
    {
        $this->registersHL |= 0x4000;
    }

    /**
     * Cbopcode #0xF5.
     */
    private function cbopcode245(): void
    {
        $this->registersHL |= 0x40;
    }

    /**
     * Cbopcode #0xF6.
     */
    private function cbopcode246(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x40);
    }

    /**
     * Cbopcode #0xF7.
     */
    private function cbopcode247(): void
    {
        $this->registerA |= 0x40;
    }

    /**
     * Cbopcode #0xF8.
     */
    private function cbopcode248(): void
    {
        $this->registerB |= 0x80;
    }

    /**
     * Cbopcode #0xF9.
     */
    private function cbopcode249(): void
    {
        $this->registerC |= 0x80;
    }

    /**
     * Cbopcode #0xFA.
     */
    private function cbopcode250(): void
    {
        $this->registerD |= 0x80;
    }

    /**
     * Cbopcode #0xFB.
     */
    private function cbopcode251(): void
    {
        $this->registerE |= 0x80;
    }

    /**
     * Cbopcode #0xFC.
     */
    private function cbopcode252(): void
    {
        $this->registersHL |= 0x8000;
    }

    /**
     * Cbopcode #0xFD.
     */
    private function cbopcode253(): void
    {
        $this->registersHL |= 0x80;
    }

    /**
     * Cbopcode #0xFE.
     */
    private function cbopcode254(): void
    {
        $this->memoryWrite($this->registersHL, $this->memoryRead($this->registersHL) | 0x80);
    }

    /**
     * Cbopcode #0xFF.
     */
    private function cbopcode255(): void
    {
        $this->registerA |= 0x80;
    }
}
