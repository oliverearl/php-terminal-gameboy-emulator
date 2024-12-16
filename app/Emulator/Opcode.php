<?php

namespace App\Emulator;

use Exception;

class Opcode
{
    public static function run(Core $core, int $address): void
    {
        match ($address) {
            1 => self::opcode1($core), 2 => self::opcode2($core), 3 => self::opcode3($core),
            4 => self::opcode4($core), 5 => self::opcode5($core), 6 => self::opcode6($core),
            7 => self::opcode7($core), 8 => self::opcode8($core), 9 => self::opcode9($core),
            10 => self::opcode10($core), 11 => self::opcode11($core), 12 => self::opcode12($core),
            13 => self::opcode13($core), 14 => self::opcode14($core), 15 => self::opcode15($core),
            16 => self::opcode16($core), 17 => self::opcode17($core), 18 => self::opcode18($core),
            19 => self::opcode19($core), 20 => self::opcode20($core), 21 => self::opcode21($core),
            22 => self::opcode22($core), 23 => self::opcode23($core), 24 => self::opcode24($core),
            25 => self::opcode25($core), 26 => self::opcode26($core), 27 => self::opcode27($core),
            28 => self::opcode28($core), 29 => self::opcode29($core), 30 => self::opcode30($core),
            31 => self::opcode31($core), 32 => self::opcode32($core), 33 => self::opcode33($core),
            34 => self::opcode34($core), 35 => self::opcode35($core), 36 => self::opcode36($core),
            37 => self::opcode37($core), 38 => self::opcode38($core), 39 => self::opcode39($core),
            40 => self::opcode40($core), 41 => self::opcode41($core), 42 => self::opcode42($core),
            43 => self::opcode43($core), 44 => self::opcode44($core), 45 => self::opcode45($core),
            46 => self::opcode46($core), 47 => self::opcode47($core), 48 => self::opcode48($core),
            49 => self::opcode49($core), 50 => self::opcode50($core), 51 => self::opcode51($core),
            52 => self::opcode52($core), 53 => self::opcode53($core), 54 => self::opcode54($core),
            55 => self::opcode55($core), 56 => self::opcode56($core), 57 => self::opcode57($core),
            58 => self::opcode58($core), 59 => self::opcode59($core), 60 => self::opcode60($core),
            61 => self::opcode61($core), 62 => self::opcode62($core), 63 => self::opcode63($core),
            64 => self::opcode64($core), 65 => self::opcode65($core), 66 => self::opcode66($core),
            67 => self::opcode67($core), 68 => self::opcode68($core), 69 => self::opcode69($core),
            70 => self::opcode70($core), 71 => self::opcode71($core), 72 => self::opcode72($core),
            73 => self::opcode73($core), 74 => self::opcode74($core), 75 => self::opcode75($core),
            76 => self::opcode76($core), 77 => self::opcode77($core), 78 => self::opcode78($core),
            79 => self::opcode79($core), 80 => self::opcode80($core), 81 => self::opcode81($core),
            82 => self::opcode82($core), 83 => self::opcode83($core), 84 => self::opcode84($core),
            85 => self::opcode85($core), 86 => self::opcode86($core), 87 => self::opcode87($core),
            88 => self::opcode88($core), 89 => self::opcode89($core), 90 => self::opcode90($core),
            91 => self::opcode91($core), 92 => self::opcode92($core), 93 => self::opcode93($core),
            94 => self::opcode94($core), 95 => self::opcode95($core), 96 => self::opcode96($core),
            97 => self::opcode97($core), 98 => self::opcode98($core), 99 => self::opcode99($core),
            100 => self::opcode100($core), 101 => self::opcode101($core), 102 => self::opcode102($core),
            103 => self::opcode103($core), 104 => self::opcode104($core), 105 => self::opcode105($core),
            106 => self::opcode106($core), 107 => self::opcode107($core), 108 => self::opcode108($core),
            109 => self::opcode109($core), 110 => self::opcode110($core), 111 => self::opcode111($core),
            112 => self::opcode112($core), 113 => self::opcode113($core), 114 => self::opcode114($core),
            115 => self::opcode115($core), 116 => self::opcode116($core), 117 => self::opcode117($core),
            118 => self::opcode118($core), 119 => self::opcode119($core), 120 => self::opcode120($core),
            121 => self::opcode121($core), 122 => self::opcode122($core), 123 => self::opcode123($core),
            124 => self::opcode124($core), 125 => self::opcode125($core), 126 => self::opcode126($core),
            127 => self::opcode127($core), 128 => self::opcode128($core), 129 => self::opcode129($core),
            130 => self::opcode130($core), 131 => self::opcode131($core), 132 => self::opcode132($core),
            133 => self::opcode133($core), 134 => self::opcode134($core), 135 => self::opcode135($core),
            136 => self::opcode136($core), 137 => self::opcode137($core), 138 => self::opcode138($core),
            139 => self::opcode139($core), 140 => self::opcode140($core), 141 => self::opcode141($core),
            142 => self::opcode142($core), 143 => self::opcode143($core), 144 => self::opcode144($core),
            145 => self::opcode145($core), 146 => self::opcode146($core), 147 => self::opcode147($core),
            148 => self::opcode148($core), 149 => self::opcode149($core), 150 => self::opcode150($core),
            151 => self::opcode151($core), 152 => self::opcode152($core), 153 => self::opcode153($core),
            154 => self::opcode154($core), 155 => self::opcode155($core), 156 => self::opcode156($core),
            157 => self::opcode157($core), 158 => self::opcode158($core), 159 => self::opcode159($core),
            160 => self::opcode160($core), 161 => self::opcode161($core), 162 => self::opcode162($core),
            163 => self::opcode163($core), 164 => self::opcode164($core), 165 => self::opcode165($core),
            166 => self::opcode166($core), 167 => self::opcode167($core), 168 => self::opcode168($core),
            169 => self::opcode169($core), 170 => self::opcode170($core), 171 => self::opcode171($core),
            172 => self::opcode172($core), 173 => self::opcode173($core), 174 => self::opcode174($core),
            175 => self::opcode175($core), 176 => self::opcode176($core), 177 => self::opcode177($core),
            178 => self::opcode178($core), 179 => self::opcode179($core), 180 => self::opcode180($core),
            181 => self::opcode181($core), 182 => self::opcode182($core), 183 => self::opcode183($core),
            184 => self::opcode184($core), 185 => self::opcode185($core), 186 => self::opcode186($core),
            187 => self::opcode187($core), 188 => self::opcode188($core), 189 => self::opcode189($core),
            190 => self::opcode190($core), 191 => self::opcode191($core), 192 => self::opcode192($core),
            193 => self::opcode193($core), 194 => self::opcode194($core), 195 => self::opcode195($core),
            196 => self::opcode196($core), 197 => self::opcode197($core), 198 => self::opcode198($core),
            199 => self::opcode199($core), 200 => self::opcode200($core), 201 => self::opcode201($core),
            202 => self::opcode202($core), 203 => self::opcode203($core), 204 => self::opcode204($core),
            205 => self::opcode205($core), 206 => self::opcode206($core), 207 => self::opcode207($core),
            208 => self::opcode208($core), 209 => self::opcode209($core), 210 => self::opcode210($core),
            211 => self::opcode211($core), 212 => self::opcode212($core), 213 => self::opcode213($core),
            214 => self::opcode214($core), 215 => self::opcode215($core), 216 => self::opcode216($core),
            217 => self::opcode217($core), 218 => self::opcode218($core), 219 => self::opcode219($core),
            220 => self::opcode220($core), 221 => self::opcode221($core), 222 => self::opcode222($core),
            223 => self::opcode223($core), 224 => self::opcode224($core), 225 => self::opcode225($core),
            226 => self::opcode226($core), 227 => self::opcode227($core), 228 => self::opcode228($core),
            229 => self::opcode229($core), 230 => self::opcode230($core), 231 => self::opcode231($core),
            232 => self::opcode232($core), 233 => self::opcode233($core), 234 => self::opcode234($core),
            235 => self::opcode235($core), 236 => self::opcode236($core), 237 => self::opcode237($core),
            238 => self::opcode238($core), 239 => self::opcode239($core), 240 => self::opcode240($core),
            241 => self::opcode241($core), 242 => self::opcode242($core), 243 => self::opcode243($core),
            244 => self::opcode244($core), 245 => self::opcode245($core), 246 => self::opcode246($core),
            247 => self::opcode247($core), 248 => self::opcode248($core), 249 => self::opcode249($core),
            250 => self::opcode250($core), 251 => self::opcode251($core), 252 => self::opcode252($core),
            253 => self::opcode253($core), 254 => self::opcode254($core), 255 => self::opcode255($core),
            default => self::opcode0($core),
        };
    }

    /**
     * Opcode #0x00.
     *
     * NOP
     */
    public static function opcode0(Core $core)
    {
        // Do Nothing...
    }

    /**
     * Opcode #0x01.
     *
     * LD BC, nn
     */
    public static function opcode1(Core $core)
    {
        $core->registerC = $core->memoryRead($core->programCounter);
        $core->registerB = $core->memoryRead(($core->programCounter + 1) & 0xFFFF);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x02.
     *
     * LD (BC), A
     */
    public static function opcode2(Core $core)
    {
        $core->memoryWrite(($core->registerB << 8) + $core->registerC, $core->registerA);
    }

    /**
     * Opcode #0x03.
     *
     * INC BC
     */
    public static function opcode3(Core $core)
    {
        $temp_var = ((($core->registerB << 8) + $core->registerC) + 1);
        $core->registerB = (($temp_var >> 8) & 0xFF);
        $core->registerC = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x04.
     *
     * INC B
     */
    public static function opcode4(Core $core)
    {
        $core->registerB = (($core->registerB + 1) & 0xFF);
        $core->FZero = ($core->registerB == 0);
        $core->FHalfCarry = (($core->registerB & 0xF) == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x05.
     *
     * DEC B
     */
    public static function opcode5(Core $core)
    {
        $core->registerB = $core->unsbtub($core->registerB - 1);
        $core->FZero = ($core->registerB == 0);
        $core->FHalfCarry = (($core->registerB & 0xF) == 0xF);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x06.
     *
     * LD B, n
     */
    public static function opcode6(Core $core)
    {
        $core->registerB = $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x07.
     *
     * RCLA
     */
    public static function opcode7(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x80) == 0x80);
        $core->registerA = (($core->registerA << 1) & 0xFF) | ($core->registerA >> 7);
        $core->FZero = $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x08
     *
     * LD (nn), SP
     */
    public static function opcode8(Core $core)
    {
        $temp_var = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
        $core->memoryWrite($temp_var, $core->stackPointer & 0xFF);
        $core->memoryWrite(($temp_var + 1) & 0xFFFF, $core->stackPointer >> 8);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x09.
     *
     * ADD HL, BC
     */
    public static function opcode9(Core $core)
    {
        $n2 = ($core->registerB << 8) + $core->registerC;
        $dirtySum = $core->registersHL + $n2;
        $core->FHalfCarry = (($core->registersHL & 0xFFF) + ($n2 & 0xFFF) > 0xFFF);
        $core->FCarry = ($dirtySum > 0xFFFF);
        $core->registersHL = ($dirtySum & 0xFFFF);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x0A.
     *
     * LD A, (BC)
     */
    public static function opcode10(Core $core)
    {
        $core->registerA = $core->memoryRead(($core->registerB << 8) + $core->registerC);
    }

    /**
     * Opcode #0x0B.
     *
     * DEC BC
     */
    public static function opcode11(Core $core)
    {
        $temp_var = $core->unswtuw((($core->registerB << 8) + $core->registerC) - 1);
        $core->registerB = ($temp_var >> 8);
        $core->registerC = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x0C
     *
     * INC C
     */
    public static function opcode12(Core $core)
    {
        $core->registerC = (($core->registerC + 1) & 0xFF);
        $core->FZero = ($core->registerC == 0);
        $core->FHalfCarry = (($core->registerC & 0xF) == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x0D.
     *
     * DEC C
     */
    public static function opcode13(Core $core)
    {
        $core->registerC = $core->unsbtub($core->registerC - 1);
        $core->FZero = ($core->registerC == 0);
        $core->FHalfCarry = (($core->registerC & 0xF) == 0xF);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x0E.
     *
     * LD C, n
     */
    public static function opcode14(Core $core)
    {
        $core->registerC = $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x0F.
     *
     * RRCA
     */
    public static function opcode15(Core $core)
    {
        $core->FCarry = (($core->registerA & 1) == 1);
        $core->registerA = ($core->registerA >> 1) + (($core->registerA & 1) << 7);
        $core->FZero = $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x10.
     *
     * STOP
     */
    public static function opcode16(Core $core)
    {
        /*TODO: Emulate the speed switch delay:
          Delay Amount:
          16 ms when going to double-speed.
          32 ms when going to single-speed.
          Also, bits 4 and 5 of 0xFF00 should read as set (1), while the switch is in process.
           */
        // Speed change requested.
        if ($core->cGBC && ($core->memory[0xFF4D] & 0x01) === 0x01) {
            //Go back to single speed mode.
            if (($core->memory[0xFF4D] & 0x80) === 0x80) {
                // cout("Going into single clock speed mode.", 0);
                $core->multiplier = 1; //TODO: Move this into the delay done code.
                $core->memory[0xFF4D] &= 0x7F; //Clear the double speed mode flag.
                //Go to double speed mode.
            } else {
                // cout("Going into double clock speed mode.", 0);
                $core->multiplier = 2; //TODO: Move this into the delay done code.
                $core->memory[0xFF4D] |= 0x80; //Set the double speed mode flag.
            }
            $core->memory[0xFF4D] &= 0xFE;
            //Reset the request bit.
        }
    }

    /**
     * Opcode #0x11.
     *
     * LD DE, nn
     */
    public static function opcode17(Core $core)
    {
        $core->registerE = $core->memoryRead($core->programCounter);
        $core->registerD = $core->memoryRead(($core->programCounter + 1) & 0xFFFF);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x12.
     *
     * LD (DE), A
     */
    public static function opcode18(Core $core)
    {
        $core->memoryWrite(($core->registerD << 8) + $core->registerE, $core->registerA);
    }

    /**
     * Opcode #0x13.
     *
     * INC DE
     */
    public static function opcode19(Core $core)
    {
        $temp_var = ((($core->registerD << 8) + $core->registerE) + 1);
        $core->registerD = (($temp_var >> 8) & 0xFF);
        $core->registerE = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x14.
     *
     * INC D
     */
    public static function opcode20(Core $core)
    {
        $core->registerD = (($core->registerD + 1) & 0xFF);
        $core->FZero = ($core->registerD == 0);
        $core->FHalfCarry = (($core->registerD & 0xF) == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x15.
     *
     * DEC D
     */
    public static function opcode21(Core $core)
    {
        $core->registerD = $core->unsbtub($core->registerD - 1);
        $core->FZero = ($core->registerD == 0);
        $core->FHalfCarry = (($core->registerD & 0xF) == 0xF);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x16.
     *
     * LD D, n
     */
    public static function opcode22(Core $core)
    {
        $core->registerD = $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x17.
     *
     * RLA
     */
    public static function opcode23(Core $core)
    {
        $carry_flag = ($core->FCarry) ? 1 : 0;
        $core->FCarry = (($core->registerA & 0x80) == 0x80);
        $core->registerA = (($core->registerA << 1) & 0xFF) | $carry_flag;
        $core->FZero = $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x18.
     *
     * JR n
     */
    public static function opcode24(Core $core)
    {
        $core->programCounter = $core->nswtuw($core->programCounter + $core->usbtsb($core->memoryRead($core->programCounter)) + 1);
    }

    /**
     * Opcode #0x19.
     *
     * ADD HL, DE
     */
    public static function opcode25(Core $core)
    {
        $n2 = ($core->registerD << 8) + $core->registerE;
        $dirtySum = $core->registersHL + $n2;
        $core->FHalfCarry = (($core->registersHL & 0xFFF) + ($n2 & 0xFFF) > 0xFFF);
        $core->FCarry = ($dirtySum > 0xFFFF);
        $core->registersHL = ($dirtySum & 0xFFFF);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x1A.
     *
     * LD A, (DE)
     */
    public static function opcode26(Core $core)
    {
        $core->registerA = $core->memoryRead(($core->registerD << 8) + $core->registerE);
    }

    /**
     * Opcode #0x1B.
     *
     * DEC DE
     */
    public static function opcode27(Core $core)
    {
        $temp_var = $core->unswtuw((($core->registerD << 8) + $core->registerE) - 1);
        $core->registerD = ($temp_var >> 8);
        $core->registerE = ($temp_var & 0xFF);
    }

    /**
     * Opcode #0x1C.
     *
     * INC E
     */
    public static function opcode28(Core $core)
    {
        $core->registerE = (($core->registerE + 1) & 0xFF);
        $core->FZero = ($core->registerE == 0);
        $core->FHalfCarry = (($core->registerE & 0xF) == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x1D.
     *
     * DEC E
     */
    public static function opcode29(Core $core)
    {
        $core->registerE = $core->unsbtub($core->registerE - 1);
        $core->FZero = ($core->registerE == 0);
        $core->FHalfCarry = (($core->registerE & 0xF) == 0xF);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x1E.
     *
     * LD E, n
     */
    public static function opcode30(Core $core)
    {
        $core->registerE = $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x1F.
     *
     * RRA
     */
    public static function opcode31(Core $core)
    {
        $carry_flag = ($core->FCarry) ? 0x80 : 0;
        $core->FCarry = (($core->registerA & 1) == 1);
        $core->registerA = ($core->registerA >> 1) + $carry_flag;
        $core->FZero = $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x20.
     *
     * JR cc, n
     */
    public static function opcode32(Core $core)
    {
        if (!$core->FZero) {
            $core->programCounter = $core->nswtuw($core->programCounter + $core->usbtsb($core->memoryRead($core->programCounter)) + 1);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x21.
     *
     * LD HL, nn
     */
    public static function opcode33(Core $core)
    {
        $core->registersHL = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x22.
     *
     * LDI (HL), A
     */
    public static function opcode34(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerA);
        $core->registersHL = (($core->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x23.
     *
     * INC HL
     */
    public static function opcode35(Core $core)
    {
        $core->registersHL = (($core->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x24.
     *
     * INC H
     */
    public static function opcode36(Core $core)
    {
        $H = ((($core->registersHL >> 8) + 1) & 0xFF);
        $core->FZero = ($H == 0);
        $core->FHalfCarry = (($H & 0xF) == 0);
        $core->FSubtract = false;
        $core->registersHL = ($H << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x25.
     *
     * DEC H
     */
    public static function opcode37(Core $core)
    {
        $H = $core->unsbtub(($core->registersHL >> 8) - 1);
        $core->FZero = ($H == 0);
        $core->FHalfCarry = (($H & 0xF) == 0xF);
        $core->FSubtract = true;
        $core->registersHL = ($H << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x26.
     *
     * LD H, n
     */
    public static function opcode38(Core $core)
    {
        $core->registersHL = ($core->memoryRead($core->programCounter) << 8) + ($core->registersHL & 0xFF);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x27.
     *
     * DAA
     */
    public static function opcode39(Core $core)
    {
        $temp_var = $core->registerA;
        if ($core->FCarry) {
            $temp_var |= 0x100;
        }
        if ($core->FHalfCarry) {
            $temp_var |= 0x200;
        }
        if ($core->FSubtract) {
            $temp_var |= 0x400;
        }
        $core->registerA = ($temp_var = $core->DAATable[$temp_var]) >> 8;
        $core->FZero = (($temp_var & 0x80) == 0x80);
        $core->FSubtract = (($temp_var & 0x40) == 0x40);
        $core->FHalfCarry = (($temp_var & 0x20) == 0x20);
        $core->FCarry = (($temp_var & 0x10) == 0x10);
    }

    /**
     * Opcode #0x28.
     *
     * JR cc, n
     */
    public static function opcode40(Core $core)
    {
        if ($core->FZero) {
            $core->programCounter = $core->nswtuw($core->programCounter + $core->usbtsb($core->memoryRead($core->programCounter)) + 1);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x29.
     *
     * ADD HL, HL
     */
    public static function opcode41(Core $core)
    {
        ;
        $core->FHalfCarry = (($core->registersHL & 0xFFF) > 0x7FF);
        $core->FCarry = ($core->registersHL > 0x7FFF);
        $core->registersHL = ((2 * $core->registersHL) & 0xFFFF);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x2A.
     *
     * LDI A, (HL)
     */
    public static function opcode42(Core $core)
    {
        $core->registerA = $core->memoryRead($core->registersHL);
        $core->registersHL = (($core->registersHL + 1) & 0xFFFF);
    }

    /**
     * Opcode #0x2B.
     *
     * DEC HL
     */
    public static function opcode43(Core $core)
    {
        $core->registersHL = $core->unswtuw($core->registersHL - 1);
    }

    /**
     * Opcode #0x2C.
     *
     * INC L
     */
    public static function opcode44(Core $core)
    {
        $L = (($core->registersHL + 1) & 0xFF);
        $core->FZero = ($L == 0);
        $core->FHalfCarry = (($L & 0xF) == 0);
        $core->FSubtract = false;
        $core->registersHL = ($core->registersHL & 0xFF00) + $L;
    }

    /**
     * Opcode #0x2D.
     *
     * DEC L
     */
    public static function opcode45(Core $core)
    {
        $L = $core->unsbtub(($core->registersHL & 0xFF) - 1);
        $core->FZero = ($L == 0);
        $core->FHalfCarry = (($L & 0xF) == 0xF);
        $core->FSubtract = true;
        $core->registersHL = ($core->registersHL & 0xFF00) + $L;
    }

    /**
     * Opcode #0x2E.
     *
     * LD L, n
     */
    public static function opcode46(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x2F.
     *
     * CPL
     */
    public static function opcode47(Core $core)
    {
        $core->registerA ^= 0xFF;
        $core->FSubtract = $core->FHalfCarry = true;
    }

    /**
     * Opcode #0x30.
     *
     * JR cc, n
     */
    public static function opcode48(Core $core)
    {
        if (!$core->FCarry) {
            $core->programCounter = $core->nswtuw($core->programCounter + $core->usbtsb($core->memoryRead($core->programCounter)) + 1);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x31.
     *
     * LD SP, nn
     */
    public static function opcode49(Core $core)
    {
        $core->stackPointer = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0x32.
     *
     * LDD (HL), A
     */
    public static function opcode50(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerA);
        $core->registersHL = $core->unswtuw($core->registersHL - 1);
    }

    /**
     * Opcode #0x33.
     *
     * INC SP
     */
    public static function opcode51(Core $core)
    {
        $core->stackPointer = ($core->stackPointer + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x34.
     *
     * INC (HL)
     */
    public static function opcode52(Core $core)
    {
        $temp_var = (($core->memoryRead($core->registersHL) + 1) & 0xFF);
        $core->FZero = ($temp_var == 0);
        $core->FHalfCarry = (($temp_var & 0xF) == 0);
        $core->FSubtract = false;
        $core->memoryWrite($core->registersHL, $temp_var);
    }

    /**
     * Opcode #0x35.
     *
     * DEC (HL)
     */
    public static function opcode53(Core $core)
    {
        $temp_var = $core->unsbtub($core->memoryRead($core->registersHL) - 1);
        $core->FZero = ($temp_var == 0);
        $core->FHalfCarry = (($temp_var & 0xF) == 0xF);
        $core->FSubtract = true;
        $core->memoryWrite($core->registersHL, $temp_var);
    }

    /**
     * Opcode #0x36.
     *
     * LD (HL), n
     */
    public static function opcode54(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->programCounter));
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x37.
     *
     * SCF
     */
    public static function opcode55(Core $core)
    {
        $core->FCarry = true;
        $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x38.
     *
     * JR cc, n
     */
    public static function opcode56(Core $core)
    {
        if ($core->FCarry) {
            $core->programCounter = $core->nswtuw($core->programCounter + $core->usbtsb($core->memoryRead($core->programCounter)) + 1);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        }
    }

    /**
     * Opcode #0x39.
     *
     * ADD HL, SP
     */
    public static function opcode57(Core $core)
    {
        $dirtySum = $core->registersHL + $core->stackPointer;
        $core->FHalfCarry = (($core->registersHL & 0xFFF) + ($core->stackPointer & 0xFFF) > 0xFFF);
        $core->FCarry = ($dirtySum > 0xFFFF);
        $core->registersHL = ($dirtySum & 0xFFFF);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x3A.
     *
     *  LDD A, (HL)
     */
    public static function opcode58(Core $core)
    {
        $core->registerA = $core->memoryRead($core->registersHL);
        $core->registersHL = $core->unswtuw($core->registersHL - 1);
    }

    /**
     * Opcode #0x3B.
     *
     * DEC SP
     */
    public static function opcode59(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
    }

    /**
     * Opcode #0x3C.
     *
     * INC A
     */
    public static function opcode60(Core $core)
    {
        $core->registerA = (($core->registerA + 1) & 0xFF);
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = (($core->registerA & 0xF) == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x3D.
     *
     * DEC A
     */
    public static function opcode61(Core $core)
    {
        $core->registerA = $core->unsbtub($core->registerA - 1);
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = (($core->registerA & 0xF) == 0xF);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x3E.
     *
     * LD A, n
     */
    public static function opcode62(Core $core)
    {
        $core->registerA = $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0x3F.
     *
     * CCF
     */
    public static function opcode63(Core $core)
    {
        $core->FCarry = !$core->FCarry;
        $core->FSubtract = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0x40.
     *
     * LD B, B
     */
    public static function opcode64(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x41.
     *
     * LD B, C
     */
    public static function opcode65(Core $core)
    {
        $core->registerB = $core->registerC;
    }

    /**
     * Opcode #0x42.
     *
     * LD B, D
     */
    public static function opcode66(Core $core)
    {
        $core->registerB = $core->registerD;
    }

    /**
     * Opcode #0x43.
     *
     * LD B, E
     */
    public static function opcode67(Core $core)
    {
        $core->registerB = $core->registerE;
    }

    /**
     * Opcode #0x44.
     *
     * LD B, H
     */
    public static function opcode68(Core $core)
    {
        $core->registerB = ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x45.
     *
     * LD B, L
     */
    public static function opcode69(Core $core)
    {
        $core->registerB = ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x46.
     *
     * LD B, (HL)
     */
    public static function opcode70(Core $core)
    {
        $core->registerB = $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x47.
     *
     * LD B, A
     */
    public static function opcode71(Core $core)
    {
        $core->registerB = $core->registerA;
    }

    /**
     * Opcode #0x48.
     *
     * LD C, B
     */
    public static function opcode72(Core $core)
    {
        $core->registerC = $core->registerB;
    }

    /**
     * Opcode #0x49.
     *
     * LD C, C
     */
    public static function opcode73(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x4A.
     *
     * LD C, D
     */
    public static function opcode74(Core $core)
    {
        $core->registerC = $core->registerD;
    }

    /**
     * Opcode #0x4B.
     *
     * LD C, E
     */
    public static function opcode75(Core $core)
    {
        $core->registerC = $core->registerE;
    }

    /**
     * Opcode #0x4C.
     *
     * LD C, H
     */
    public static function opcode76(Core $core)
    {
        $core->registerC = ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x4D.
     *
     * LD C, L
     */
    public static function opcode77(Core $core)
    {
        $core->registerC = ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x4E.
     *
     * LD C, (HL)
     */
    public static function opcode78(Core $core)
    {
        $core->registerC = $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x4F.
     *
     * LD C, A
     */
    public static function opcode79(Core $core)
    {
        $core->registerC = $core->registerA;
    }

    /**
     * Opcode #0x50.
     *
     * LD D, B
     */
    public static function opcode80(Core $core)
    {
        $core->registerD = $core->registerB;
    }

    /**
     * Opcode #0x51.
     *
     * LD D, C
     */
    public static function opcode81(Core $core)
    {
        $core->registerD = $core->registerC;
    }

    /**
     * Opcode #0x52.
     *
     * LD D, D
     */
    public static function opcode82(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x53.
     *
     * LD D, E
     */
    public static function opcode83(Core $core)
    {
        $core->registerD = $core->registerE;
    }

    /**
     * Opcode #0x54.
     *
     * LD D, H
     */
    public static function opcode84(Core $core)
    {
        $core->registerD = ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x55.
     *
     * LD D, L
     */
    public static function opcode85(Core $core)
    {
        $core->registerD = ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x56.
     *
     * LD D, (HL)
     */
    public static function opcode86(Core $core)
    {
        $core->registerD = $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x57.
     *
     * LD D, A
     */
    public static function opcode87(Core $core)
    {
        $core->registerD = $core->registerA;
    }

    /**
     * Opcode #0x58.
     *
     * LD E, B
     */
    public static function opcode88(Core $core)
    {
        $core->registerE = $core->registerB;
    }

    /**
     * Opcode #0x59.
     *
     * LD E, C
     */
    public static function opcode89(Core $core)
    {
        $core->registerE = $core->registerC;
    }

    /**
     * Opcode #0x5A.
     *
     * LD E, D
     */
    public static function opcode90(Core $core)
    {
        $core->registerE = $core->registerD;
    }

    /**
     * Opcode #0x5B.
     *
     * LD E, E
     */
    public static function opcode91(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x5C.
     *
     * LD E, H
     */
    public static function opcode92(Core $core)
    {
        $core->registerE = ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x5D.
     *
     * LD E, L
     */
    public static function opcode93(Core $core)
    {
        $core->registerE = ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x5E.
     *
     * LD E, (HL)
     */
    public static function opcode94(Core $core)
    {
        $core->registerE = $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x5F.
     *
     * LD E, A
     */
    public static function opcode95(Core $core)
    {
        $core->registerE = $core->registerA;
    }

    /**
     * Opcode #0x60.
     *
     * LD H, B
     */
    public static function opcode96(Core $core)
    {
        $core->registersHL = ($core->registerB << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x61.
     *
     * LD H, C
     */
    public static function opcode97(Core $core)
    {
        $core->registersHL = ($core->registerC << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x62.
     *
     * LD H, D
     */
    public static function opcode98(Core $core)
    {
        $core->registersHL = ($core->registerD << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x63.
     *
     * LD H, E
     */
    public static function opcode99(Core $core)
    {
        $core->registersHL = ($core->registerE << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x64.
     *
     * LD H, H
     */
    public static function opcode100(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x65.
     *
     * LD H, L
     */
    public static function opcode101(Core $core)
    {
        $core->registersHL = (($core->registersHL & 0xFF) << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x66.
     *
     * LD H, (HL)
     */
    public static function opcode102(Core $core)
    {
        $core->registersHL = ($core->memoryRead($core->registersHL) << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x67.
     *
     * LD H, A
     */
    public static function opcode103(Core $core)
    {
        $core->registersHL = ($core->registerA << 8) + ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x68.
     *
     * LD L, B
     */
    public static function opcode104(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->registerB;
    }

    /**
     * Opcode #0x69.
     *
     * LD L, C
     */
    public static function opcode105(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->registerC;
    }

    /**
     * Opcode #0x6A.
     *
     * LD L, D
     */
    public static function opcode106(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->registerD;
    }

    /**
     * Opcode #0x6B.
     *
     * LD L, E
     */
    public static function opcode107(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->registerE;
    }

    /**
     * Opcode #0x6C.
     *
     * LD L, H
     */
    public static function opcode108(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x6D.
     *
     * LD L, L
     */
    public static function opcode109(Core $core)
    {
        //Do nothing...
    }

    /**
     * Opcode #0x6E.
     *
     * LD L, (HL)
     */
    public static function opcode110(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x6F.
     *
     * LD L, A
     */
    public static function opcode111(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + $core->registerA;
    }

    /**
     * Opcode #0x70.
     *
     * LD (HL), B
     */
    public static function opcode112(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerB);
    }

    /**
     * Opcode #0x71.
     *
     * LD (HL), C
     */
    public static function opcode113(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerC);
    }

    /**
     * Opcode #0x72.
     *
     * LD (HL), D
     */
    public static function opcode114(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerD);
    }

    /**
     * Opcode #0x73.
     *
     * LD (HL), E
     */
    public static function opcode115(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerE);
    }

    /**
     * Opcode #0x74.
     *
     * LD (HL), H
     */
    public static function opcode116(Core $core)
    {
        $core->memoryWrite($core->registersHL, ($core->registersHL >> 8));
    }

    /**
     * Opcode #0x75.
     *
     * LD (HL), L
     */
    public static function opcode117(Core $core)
    {
        $core->memoryWrite($core->registersHL, ($core->registersHL & 0xFF));
    }

    public static function halt(Core $core): void
    {
        self::opcode118($core);
    }

    /**
     * Opcode #0x76.
     *
     * HALT
     *
     * @param \app\Emulator\Core $core
     *
     * @throws Exception
     */
    public static function opcode118(Core $core): void
    {
        if ($core->untilEnable == 1) {
            /*VBA-M says this fixes Torpedo Range (Seems to work):
            Involves an edge case where an EI is placed right before a HALT.
            EI in this case actually is immediate, so we adjust (Hacky?).*/
            $core->programCounter = $core->nswtuw($core->programCounter - 1);
        } else {
            if (!$core->halt && !$core->IME && !$core->cGBC && ($core->memory[0xFF0F] & $core->memory[0xFFFF] & 0x1F) > 0) {
                $core->skipPCIncrement = true;
            }
            $core->halt = true;
            while ($core->halt && ($core->stopEmulator & 1) === 0) {
                /*We're hijacking the main interpreter loop to do this dirty business
                in order to not slow down the main interpreter loop code with halt state handling.*/
                $bitShift = 0;
                $testbit = 1;
                $interrupts = $core->memory[0xFFFF] & $core->memory[0xFF0F];
                while ($bitShift < 5) {
                    //Check to see if an interrupt is enabled AND requested.
                    if (($testbit & $interrupts) === $testbit) {
                        $core->halt = false; //Get out of halt state if in halt state.
                        return; //Let the main interrupt handler compute the interrupt.
                    }
                    $testbit = 1 << ++$bitShift;
                }
                $core->CPUTicks = 1; //1 machine cycle under HALT...
                //Timing:
                $core->updateCore();
            }

            //Throw an error on purpose to exit out of the loop.
            throw new Exception('HALT_OVERRUN');
        }
    }

    /**
     * Opcode #0x77.
     *
     * LD (HL), A
     */
    public static function opcode119(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->registerA);
    }

    /**
     * Opcode #0x78.
     *
     * LD A, B
     */
    public static function opcode120(Core $core)
    {
        $core->registerA = $core->registerB;
    }

    /**
     * Opcode #0x79.
     *
     * LD A, C
     */
    public static function opcode121(Core $core)
    {
        $core->registerA = $core->registerC;
    }

    /**
     * Opcode #0x7A.
     *
     * LD A, D
     */
    public static function opcode122(Core $core)
    {
        $core->registerA = $core->registerD;
    }

    /**
     * Opcode #0x7B.
     *
     * LD A, E
     */
    public static function opcode123(Core $core)
    {
        $core->registerA = $core->registerE;
    }

    /**
     * Opcode #0x7C.
     *
     * LD A, H
     */
    public static function opcode124(Core $core)
    {
        $core->registerA = ($core->registersHL >> 8);
    }

    /**
     * Opcode #0x7D.
     *
     * LD A, L
     */
    public static function opcode125(Core $core)
    {
        $core->registerA = ($core->registersHL & 0xFF);
    }

    /**
     * Opcode #0x7E.
     *
     * LD, A, (HL)
     */
    public static function opcode126(Core $core)
    {
        $core->registerA = $core->memoryRead($core->registersHL);
    }

    /**
     * Opcode #0x7F.
     *
     * LD A, A
     */
    public static function opcode127(Core $core)
    {
        //Do Nothing...
    }

    /**
     * Opcode #0x80.
     *
     * ADD A, B
     */
    public static function opcode128(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerB;
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x81.
     *
     * ADD A, C
     */
    public static function opcode129(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerC;
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x82.
     *
     * ADD A, D
     */
    public static function opcode130(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerD;
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x83.
     *
     * ADD A, E
     */
    public static function opcode131(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerE;
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x84.
     *
     * ADD A, H
     */
    public static function opcode132(Core $core)
    {
        $dirtySum = $core->registerA + ($core->registersHL >> 8);
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x85.
     *
     * ADD A, L
     */
    public static function opcode133(Core $core)
    {
        $dirtySum = $core->registerA + ($core->registersHL & 0xFF);
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x86.
     *
     * ADD A, (HL)
     */
    public static function opcode134(Core $core)
    {
        $dirtySum = $core->registerA + $core->memoryRead($core->registersHL);
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x87.
     *
     * ADD A, A
     */
    public static function opcode135(Core $core)
    {
        $dirtySum = $core->registerA * 2;
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x88.
     *
     * ADC A, B
     */
    public static function opcode136(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerB + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($core->registerB & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x89.
     *
     * ADC A, C
     */
    public static function opcode137(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerC + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($core->registerC & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8A.
     *
     * ADC A, D
     */
    public static function opcode138(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerD + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($core->registerD & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8B.
     *
     * ADC A, E
     */
    public static function opcode139(Core $core)
    {
        $dirtySum = $core->registerA + $core->registerE + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($core->registerE & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8C.
     *
     * ADC A, H
     */
    public static function opcode140(Core $core)
    {
        $tempValue = ($core->registersHL >> 8);
        $dirtySum = $core->registerA + $tempValue + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($tempValue & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8D.
     *
     * ADC A, L
     */
    public static function opcode141(Core $core)
    {
        $tempValue = ($core->registersHL & 0xFF);
        $dirtySum = $core->registerA + $tempValue + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($tempValue & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8E.
     *
     * ADC A, (HL)
     */
    public static function opcode142(Core $core)
    {
        $tempValue = $core->memoryRead($core->registersHL);
        $dirtySum = $core->registerA + $tempValue + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($tempValue & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x8F.
     *
     * ADC A, A
     */
    public static function opcode143(Core $core)
    {
        $dirtySum = ($core->registerA * 2) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($core->registerA & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
    }

    /**
     * Opcode #0x90.
     *
     * SUB A, B
     */
    public static function opcode144(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerB;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($core->registerB & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x91.
     *
     * SUB A, C
     */
    public static function opcode145(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerC;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($core->registerC & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x92.
     *
     * SUB A, D
     */
    public static function opcode146(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerD;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($core->registerD & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x93.
     *
     * SUB A, E
     */
    public static function opcode147(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerE;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($core->registerE & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x94.
     *
     * SUB A, H
     */
    public static function opcode148(Core $core)
    {
        $temp_var = $core->registersHL >> 8;
        $dirtySum = $core->registerA - $temp_var;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($temp_var & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x95.
     *
     * SUB A, L
     */
    public static function opcode149(Core $core)
    {
        $dirtySum = $core->registerA - ($core->registersHL & 0xFF);
        $core->FHalfCarry = ($core->registerA & 0xF) < ($core->registersHL & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x96.
     *
     * SUB A, (HL)
     */
    public static function opcode150(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $dirtySum = $core->registerA - $temp_var;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($temp_var & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x97.
     *
     * SUB A, A
     */
    public static function opcode151(Core $core)
    {
        //number - same number == 0
        $core->registerA = 0;
        $core->FHalfCarry = $core->FCarry = false;
        $core->FZero = $core->FSubtract = true;
    }

    /**
     * Opcode #0x98.
     *
     * SBC A, B
     */
    public static function opcode152(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerB - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($core->registerB & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x99.
     *
     * SBC A, C
     */
    public static function opcode153(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerC - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($core->registerC & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9A.
     *
     * SBC A, D
     */
    public static function opcode154(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerD - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($core->registerD & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9B.
     *
     * SBC A, E
     */
    public static function opcode155(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerE - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($core->registerE & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9C.
     *
     * SBC A, H
     */
    public static function opcode156(Core $core)
    {
        $temp_var = $core->registersHL >> 8;
        $dirtySum = $core->registerA - $temp_var - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($temp_var & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9D.
     *
     * SBC A, L
     */
    public static function opcode157(Core $core)
    {
        $dirtySum = $core->registerA - ($core->registersHL & 0xFF) - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($core->registersHL & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9E.
     *
     * SBC A, (HL)
     */
    public static function opcode158(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $dirtySum = $core->registerA - $temp_var - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($temp_var & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0x9F.
     *
     * SBC A, A
     */
    public static function opcode159(Core $core)
    {
        //Optimized SBC A:
        if ($core->FCarry) {
            $core->FZero = false;
            $core->FSubtract = $core->FHalfCarry = $core->FCarry = true;
            $core->registerA = 0xFF;
        } else {
            $core->FHalfCarry = $core->FCarry = false;
            $core->FSubtract = $core->FZero = true;
            $core->registerA = 0;
        }
    }

    /**
     * Opcode #0xA0.
     *
     * AND B
     */
    public static function opcode160(Core $core)
    {
        $core->registerA &= $core->registerB;
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA1.
     *
     * AND C
     */
    public static function opcode161(Core $core)
    {
        $core->registerA &= $core->registerC;
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA2.
     *
     * AND D
     */
    public static function opcode162(Core $core)
    {
        $core->registerA &= $core->registerD;
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA3.
     *
     * AND E
     */
    public static function opcode163(Core $core)
    {
        $core->registerA &= $core->registerE;
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA4.
     *
     * AND H
     */
    public static function opcode164(Core $core)
    {
        $core->registerA &= ($core->registersHL >> 8);
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA5.
     *
     * AND L
     */
    public static function opcode165(Core $core)
    {
        $core->registerA &= ($core->registersHL & 0xFF);
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA6.
     *
     * AND (HL)
     */
    public static function opcode166(Core $core)
    {
        $core->registerA &= $core->memoryRead($core->registersHL);
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA7.
     *
     * AND A
     */
    public static function opcode167(Core $core)
    {
        //number & same number = same number
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xA8.
     *
     * XOR B
     */
    public static function opcode168(Core $core)
    {
        $core->registerA ^= $core->registerB;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xA9.
     *
     * XOR C
     */
    public static function opcode169(Core $core)
    {
        $core->registerA ^= $core->registerC;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAA.
     *
     * XOR D
     */
    public static function opcode170(Core $core)
    {
        $core->registerA ^= $core->registerD;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAB.
     *
     * XOR E
     */
    public static function opcode171(Core $core)
    {
        $core->registerA ^= $core->registerE;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAC.
     *
     * XOR H
     */
    public static function opcode172(Core $core)
    {
        $core->registerA ^= ($core->registersHL >> 8);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAD.
     *
     * XOR L
     */
    public static function opcode173(Core $core)
    {
        $core->registerA ^= ($core->registersHL & 0xFF);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAE.
     *
     * XOR (HL)
     */
    public static function opcode174(Core $core)
    {
        $core->registerA ^= $core->memoryRead($core->registersHL);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xAF.
     *
     * XOR A
     */
    public static function opcode175(Core $core)
    {
        //number ^ same number == 0
        $core->registerA = 0;
        $core->FZero = true;
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xB0.
     *
     * OR B
     */
    public static function opcode176(Core $core)
    {
        $core->registerA |= $core->registerB;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB1.
     *
     * OR C
     */
    public static function opcode177(Core $core)
    {
        $core->registerA |= $core->registerC;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB2.
     *
     * OR D
     */
    public static function opcode178(Core $core)
    {
        $core->registerA |= $core->registerD;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB3.
     *
     * OR E
     */
    public static function opcode179(Core $core)
    {
        $core->registerA |= $core->registerE;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB4.
     *
     * OR H
     */
    public static function opcode180(Core $core)
    {
        $core->registerA |= ($core->registersHL >> 8);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB5.
     *
     * OR L
     */
    public static function opcode181(Core $core)
    {
        $core->registerA |= ($core->registersHL & 0xFF);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB6.
     *
     * OR (HL)
     */
    public static function opcode182(Core $core)
    {
        $core->registerA |= $core->memoryRead($core->registersHL);
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB7.
     *
     * OR A
     */
    public static function opcode183(Core $core)
    {
        //number | same number == same number
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xB8.
     *
     * CP B
     */
    public static function opcode184(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerB;
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xB9.
     *
     * CP C
     */
    public static function opcode185(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerC;
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBA.
     *
     * CP D
     */
    public static function opcode186(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerD;
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBB.
     *
     * CP E
     */
    public static function opcode187(Core $core)
    {
        $dirtySum = $core->registerA - $core->registerE;
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBC.
     *
     * CP H
     */
    public static function opcode188(Core $core)
    {
        $dirtySum = $core->registerA - ($core->registersHL >> 8);
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBD.
     *
     * CP L
     */
    public static function opcode189(Core $core)
    {
        $dirtySum = $core->registerA - ($core->registersHL & 0xFF);
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBE.
     *
     * CP (HL)
     */
    public static function opcode190(Core $core)
    {
        $dirtySum = $core->registerA - $core->memoryRead($core->registersHL);
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xBF.
     *
     * CP A
     */
    public static function opcode191(Core $core)
    {
        $core->FHalfCarry = $core->FCarry = false;
        $core->FZero = $core->FSubtract = true;
    }

    /**
     * Opcode #0xC0.
     *
     * RET !FZ
     */
    public static function opcode192(Core $core)
    {
        if (!$core->FZero) {
            $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
            $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
            $core->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xC1.
     *
     * POP BC
     */
    public static function opcode193(Core $core)
    {
        $core->registerC = $core->memoryRead($core->stackPointer);
        $core->registerB = $core->memoryRead(($core->stackPointer + 1) & 0xFFFF);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xC2.
     *
     * JP !FZ, nn
     */
    public static function opcode194(Core $core)
    {
        if (!$core->FZero) {
            $core->programCounter = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xC3.
     *
     * JP nn
     */
    public static function opcode195(Core $core)
    {
        $core->programCounter = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
    }

    /**
     * Opcode #0xC4.
     *
     * CALL !FZ, nn
     */
    public static function opcode196(Core $core)
    {
        if (!$core->FZero) {
            $temp_pc = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
            $core->programCounter = $temp_pc;
            $core->CPUTicks += 3;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xC5.
     *
     * PUSH BC
     */
    public static function opcode197(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registerB);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registerC);
    }

    /**
     * Opcode #0xC6.
     *
     * ADD, n
     */
    public static function opcode198(Core $core)
    {
        $dirtySum = $core->registerA + $core->memoryRead($core->programCounter);
        $core->FHalfCarry = ($dirtySum & 0xF) < ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xC7.
     *
     * RST 0
     */
    public static function opcode199(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0;
    }

    /**
     * Opcode #0xC8.
     *
     * RET FZ
     */
    public static function opcode200(Core $core)
    {
        if ($core->FZero) {
            $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
            $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
            $core->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xC9.
     *
     * RET
     */
    public static function opcode201(Core $core)
    {
        $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xCA.
     *
     * JP FZ, nn
     */
    public static function opcode202(Core $core)
    {
        if ($core->FZero) {
            $core->programCounter = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xCB.
     *
     * Secondary OP Code Set:
     */
    public static function opcode203(Core $core)
    {
        $opcode = $core->memoryRead($core->programCounter);
        //Increment the program counter to the next instruction:
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        //Get how many CPU cycles the current 0xCBXX op code counts for:
        $core->CPUTicks = $core->SecondaryTICKTable[$opcode];
        //Execute secondary OP codes for the 0xCB OP code call.
        Cbopcode::run($core, $opcode);
    }

    /**
     * Opcode #0xCC.
     *
     * CALL FZ, nn
     */
    public static function opcode204(Core $core)
    {
        if ($core->FZero) {
            $temp_pc = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
            $core->programCounter = $temp_pc;
            $core->CPUTicks += 3;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xCD.
     *
     * CALL nn
     */
    public static function opcode205(Core $core)
    {
        $temp_pc = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = $temp_pc;
    }

    /**
     * Opcode #0xCE.
     *
     * ADC A, n
     */
    public static function opcode206(Core $core)
    {
        $tempValue = $core->memoryRead($core->programCounter);
        $dirtySum = $core->registerA + $tempValue + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) + ($tempValue & 0xF) + (($core->FCarry) ? 1 : 0) > 0xF);
        $core->FCarry = ($dirtySum > 0xFF);
        $core->registerA = $dirtySum & 0xFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = false;
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xCF.
     *
     * RST 0x8
     */
    public static function opcode207(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x8;
    }

    /**
     * Opcode #0xD0.
     *
     * RET !FC
     */
    public static function opcode208(Core $core)
    {
        if (!$core->FCarry) {
            $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
            $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
            $core->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xD1.
     *
     * POP DE
     */
    public static function opcode209(Core $core)
    {
        $core->registerE = $core->memoryRead($core->stackPointer);
        $core->registerD = $core->memoryRead(($core->stackPointer + 1) & 0xFFFF);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xD2.
     *
     * JP !FC, nn
     */
    public static function opcode210(Core $core)
    {
        if (!$core->FCarry) {
            $core->programCounter = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xD3.
     *
     * 0xD3 - Illegal
     */
    public static function opcode211(Core $core)
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
    public static function opcode212(Core $core)
    {
        if (!$core->FCarry) {
            $temp_pc = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
            $core->programCounter = $temp_pc;
            $core->CPUTicks += 3;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xD5.
     *
     * PUSH DE
     */
    public static function opcode213(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registerD);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registerE);
    }

    /**
     * Opcode #0xD6.
     *
     * SUB A, n
     */
    public static function opcode214(Core $core)
    {
        $temp_var = $core->memoryRead($core->programCounter);
        $dirtySum = $core->registerA - $temp_var;
        $core->FHalfCarry = ($core->registerA & 0xF) < ($temp_var & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xD7.
     *
     * RST 0x10
     */
    public static function opcode215(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x10;
    }

    /**
     * Opcode #0xD8.
     *
     * RET FC
     */
    public static function opcode216(Core $core)
    {
        if ($core->FCarry) {
            $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
            $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
            $core->CPUTicks += 3;
        }
    }

    /**
     * Opcode #0xD9.
     *
     * RETI
     */
    public static function opcode217(Core $core)
    {
        $core->programCounter = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
        //$core->IME = true;
        $core->untilEnable = 2;
    }

    /**
     * Opcode #0xDA.
     *
     * JP FC, nn
     */
    public static function opcode218(Core $core)
    {
        if ($core->FCarry) {
            $core->programCounter = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            ++$core->CPUTicks;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xDB.
     *
     * 0xDB - Illegal
     */
    public static function opcode219(Core $core): never
    {
        echo 'Illegal op code 0xDB called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xDC.
     *
     * CALL FC, nn
     */
    public static function opcode220(Core $core)
    {
        if ($core->FCarry) {
            $temp_pc = ($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter);
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
            $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
            $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
            $core->programCounter = $temp_pc;
            $core->CPUTicks += 3;
        } else {
            $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
        }
    }

    /**
     * Opcode #0xDD.
     *
     * 0xDD - Illegal
     */
    public static function opcode221(Core $core): never
    {
        echo 'Illegal op code 0xDD called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xDE.
     *
     * SBC A, n
     */
    public static function opcode222(Core $core)
    {
        $temp_var = $core->memoryRead($core->programCounter);
        $dirtySum = $core->registerA - $temp_var - (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = (($core->registerA & 0xF) - ($temp_var & 0xF) - (($core->FCarry) ? 1 : 0) < 0);
        $core->FCarry = ($dirtySum < 0);
        $core->registerA = $core->unsbtub($dirtySum);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FZero = ($core->registerA == 0);
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xDF.
     *
     * RST 0x18
     */
    public static function opcode223(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x18;
    }

    /**
     * Opcode #0xE0.
     *
     * LDH (n), A
     */
    public static function opcode224(Core $core)
    {
        $core->memoryWrite(0xFF00 + $core->memoryRead($core->programCounter), $core->registerA);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xE1.
     *
     * POP HL
     */
    public static function opcode225(Core $core)
    {
        $core->registersHL = ($core->memoryRead(($core->stackPointer + 1) & 0xFFFF) << 8) + $core->memoryRead($core->stackPointer);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xE2.
     *
     * LD (C), A
     */
    public static function opcode226(Core $core)
    {
        $core->memoryWrite(0xFF00 + $core->registerC, $core->registerA);
    }

    /**
     * Opcode #0xE3.
     *
     * 0xE3 - Illegal
     */
    public static function opcode227(Core $core): never
    {
        echo 'Illegal op code 0xE3 called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xE4.
     *
     * 0xE4 - Illegal
     */
    public static function opcode228(Core $core): never
    {
        echo 'Illegal op code 0xE4 called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xE5.
     *
     * PUSH HL
     */
    public static function opcode229(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registersHL >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registersHL & 0xFF);
    }

    /**
     * Opcode #0xE6.
     *
     * AND n
     */
    public static function opcode230(Core $core)
    {
        $core->registerA &= $core->memoryRead($core->programCounter);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FZero = ($core->registerA == 0);
        $core->FHalfCarry = true;
        $core->FSubtract = $core->FCarry = false;
    }

    /**
     * Opcode #0xE7.
     *
     * RST 0x20
     */
    public static function opcode231(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x20;
    }

    /**
     * Opcode #0xE8.
     *
     * ADD SP, n
     */
    public static function opcode232(Core $core)
    {
        $signedByte = $core->usbtsb($core->memoryRead($core->programCounter));
        $temp_value = $core->nswtuw($core->stackPointer + $signedByte);
        $core->FCarry = ((($core->stackPointer ^ $signedByte ^ $temp_value) & 0x100) == 0x100);
        $core->FHalfCarry = ((($core->stackPointer ^ $signedByte ^ $temp_value) & 0x10) == 0x10);
        $core->stackPointer = $temp_value;
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FZero = $core->FSubtract = false;
    }

    /**
     * Opcode #0xE9.
     *
     * JP, (HL)
     */
    public static function opcode233(Core $core)
    {
        $core->programCounter = $core->registersHL;
    }

    /**
     * Opcode #0xEA.
     *
     * LD n, A
     */
    public static function opcode234(Core $core)
    {
        $core->memoryWrite(($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter), $core->registerA);
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xEB.
     *
     * 0xEB - Illegal
     */
    public static function opcode235(Core $core): never
    {
        echo 'Illegal op code 0xEB called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xEC.
     *
     * 0xEC - Illegal
     */
    public static function opcode236(Core $core): never
    {
        echo 'Illegal op code 0xEC called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xED.
     *
     * 0xED - Illegal
     */
    public static function opcode237(Core $core): never
    {
        echo 'Illegal op code 0xED called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xEE.
     *
     * XOR n
     */
    public static function opcode238(Core $core)
    {
        $core->registerA ^= $core->memoryRead($core->programCounter);
        $core->FZero = ($core->registerA == 0);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FSubtract = $core->FHalfCarry = $core->FCarry = false;
    }

    /**
     * Opcode #0xEF.
     *
     * RST 0x28
     */
    public static function opcode239(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x28;
    }

    /**
     * Opcode #0xF0.
     *
     * LDH A, (n)
     */
    public static function opcode240(Core $core)
    {
        $core->registerA = $core->memoryRead(0xFF00 + $core->memoryRead($core->programCounter));
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
    }

    /**
     * Opcode #0xF1.
     *
     * POP AF
     */
    public static function opcode241(Core $core)
    {
        $temp_var = $core->memoryRead($core->stackPointer);
        $core->FZero = (($temp_var & 0x80) == 0x80);
        $core->FSubtract = (($temp_var & 0x40) == 0x40);
        $core->FHalfCarry = (($temp_var & 0x20) == 0x20);
        $core->FCarry = (($temp_var & 0x10) == 0x10);
        $core->registerA = $core->memoryRead(($core->stackPointer + 1) & 0xFFFF);
        $core->stackPointer = ($core->stackPointer + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xF2.
     *
     * LD A, (C)
     */
    public static function opcode242(Core $core)
    {
        $core->registerA = $core->memoryRead(0xFF00 + $core->registerC);
    }

    /**
     * Opcode #0xF3.
     *
     * DI
     */
    public static function opcode243(Core $core)
    {
        $core->IME = false;
        $core->untilEnable = 0;
    }

    /**
     * Opcode #0xF4.
     *
     * 0xF4 - Illegal
     */
    public static function opcode244(Core $core)
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
    public static function opcode245(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->registerA);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, (($core->FZero) ? 0x80 : 0) + (($core->FSubtract) ? 0x40 : 0) + (($core->FHalfCarry) ? 0x20 : 0) + (($core->FCarry) ? 0x10 : 0));
    }

    /**
     * Opcode #0xF6.
     *
     * OR n
     */
    public static function opcode246(Core $core)
    {
        $core->registerA |= $core->memoryRead($core->programCounter);
        $core->FZero = ($core->registerA == 0);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FSubtract = $core->FCarry = $core->FHalfCarry = false;
    }

    /**
     * Opcode #0xF7.
     *
     * RST 0x30
     */
    public static function opcode247(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x30;
    }

    /**
     * Opcode #0xF8.
     *
     * LDHL SP, n
     */
    public static function opcode248(Core $core)
    {
        $signedByte = $core->usbtsb($core->memoryRead($core->programCounter));
        $core->registersHL = $core->nswtuw($core->stackPointer + $signedByte);
        $core->FCarry = ((($core->stackPointer ^ $signedByte ^ $core->registersHL) & 0x100) == 0x100);
        $core->FHalfCarry = ((($core->stackPointer ^ $signedByte ^ $core->registersHL) & 0x10) == 0x10);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FZero = $core->FSubtract = false;
    }

    /**
     * Opcode #0xF9.
     *
     * LD SP, HL
     */
    public static function opcode249(Core $core)
    {
        $core->stackPointer = $core->registersHL;
    }

    /**
     * Opcode #0xFA.
     *
     * LD A, (nn)
     */
    public static function opcode250(Core $core)
    {
        $core->registerA = $core->memoryRead(($core->memoryRead(($core->programCounter + 1) & 0xFFFF) << 8) + $core->memoryRead($core->programCounter));
        $core->programCounter = ($core->programCounter + 2) & 0xFFFF;
    }

    /**
     * Opcode #0xFB.
     *
     * EI
     */
    public static function opcode251(Core $core)
    {
        $core->untilEnable = 2;
    }

    /**
     * Opcode #0xFC.
     *
     * 0xFC - Illegal
     */
    public static function opcode252(Core $core): never
    {
        echo 'Illegal op code 0xFC called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xFD.
     *
     * 0xFD - Illegal
     */
    public static function opcode253(Core $core): never
    {
        echo 'Illegal op code 0xFD called, pausing emulation.';
        exit();
    }

    /**
     * Opcode #0xFE.
     *
     * CP n
     */
    public static function opcode254(Core $core)
    {
        $dirtySum = $core->registerA - $core->memoryRead($core->programCounter);
        $core->FHalfCarry = ($core->unsbtub($dirtySum) & 0xF) > ($core->registerA & 0xF);
        $core->FCarry = ($dirtySum < 0);
        $core->FZero = ($dirtySum == 0);
        $core->programCounter = ($core->programCounter + 1) & 0xFFFF;
        $core->FSubtract = true;
    }

    /**
     * Opcode #0xFF.
     *
     * RST 0x38
     */
    public static function opcode255(Core $core)
    {
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter >> 8);
        $core->stackPointer = $core->unswtuw($core->stackPointer - 1);
        $core->memoryWrite($core->stackPointer, $core->programCounter & 0xFF);
        $core->programCounter = 0x38;
    }
}
