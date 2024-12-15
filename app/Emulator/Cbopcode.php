<?php

namespace App\Emulator;

class Cbopcode
{
    /**
     * Run the given cbopcode.
     */
    public static function run(Core $core, int $address): void
    {
        match ($address) {
            1 => self::cbopcode1($core), 2 => self::cbopcode2($core), 3 => self::cbopcode3($core),
            4 => self::cbopcode4($core), 5 => self::cbopcode5($core), 6 => self::cbopcode6($core),
            7 => self::cbopcode7($core), 8 => self::cbopcode8($core), 9 => self::cbopcode9($core),
            10 => self::cbopcode10($core), 11 => self::cbopcode11($core), 12 => self::cbopcode12($core),
            13 => self::cbopcode13($core), 14 => self::cbopcode14($core), 15 => self::cbopcode15($core),
            16 => self::cbopcode16($core), 17 => self::cbopcode17($core), 18 => self::cbopcode18($core),
            19 => self::cbopcode19($core), 20 => self::cbopcode20($core), 21 => self::cbopcode21($core),
            22 => self::cbopcode22($core), 23 => self::cbopcode23($core), 24 => self::cbopcode24($core),
            25 => self::cbopcode25($core), 26 => self::cbopcode26($core), 27 => self::cbopcode27($core),
            28 => self::cbopcode28($core), 29 => self::cbopcode29($core), 30 => self::cbopcode30($core),
            31 => self::cbopcode31($core), 32 => self::cbopcode32($core), 33 => self::cbopcode33($core),
            34 => self::cbopcode34($core), 35 => self::cbopcode35($core), 36 => self::cbopcode36($core),
            37 => self::cbopcode37($core), 38 => self::cbopcode38($core), 39 => self::cbopcode39($core),
            40 => self::cbopcode40($core), 41 => self::cbopcode41($core), 42 => self::cbopcode42($core),
            43 => self::cbopcode43($core), 44 => self::cbopcode44($core), 45 => self::cbopcode45($core),
            46 => self::cbopcode46($core), 47 => self::cbopcode47($core), 48 => self::cbopcode48($core),
            49 => self::cbopcode49($core), 50 => self::cbopcode50($core), 51 => self::cbopcode51($core),
            52 => self::cbopcode52($core), 53 => self::cbopcode53($core), 54 => self::cbopcode54($core),
            55 => self::cbopcode55($core), 56 => self::cbopcode56($core), 57 => self::cbopcode57($core),
            58 => self::cbopcode58($core), 59 => self::cbopcode59($core), 60 => self::cbopcode60($core),
            61 => self::cbopcode61($core), 62 => self::cbopcode62($core), 63 => self::cbopcode63($core),
            64 => self::cbopcode64($core), 65 => self::cbopcode65($core), 66 => self::cbopcode66($core),
            67 => self::cbopcode67($core), 68 => self::cbopcode68($core), 69 => self::cbopcode69($core),
            70 => self::cbopcode70($core), 71 => self::cbopcode71($core), 72 => self::cbopcode72($core),
            73 => self::cbopcode73($core), 74 => self::cbopcode74($core), 75 => self::cbopcode75($core),
            76 => self::cbopcode76($core), 77 => self::cbopcode77($core), 78 => self::cbopcode78($core),
            79 => self::cbopcode79($core), 80 => self::cbopcode80($core), 81 => self::cbopcode81($core),
            82 => self::cbopcode82($core), 83 => self::cbopcode83($core), 84 => self::cbopcode84($core),
            85 => self::cbopcode85($core), 86 => self::cbopcode86($core), 87 => self::cbopcode87($core),
            88 => self::cbopcode88($core), 89 => self::cbopcode89($core), 90 => self::cbopcode90($core),
            91 => self::cbopcode91($core), 92 => self::cbopcode92($core), 93 => self::cbopcode93($core),
            94 => self::cbopcode94($core), 95 => self::cbopcode95($core), 96 => self::cbopcode96($core),
            97 => self::cbopcode97($core), 98 => self::cbopcode98($core), 99 => self::cbopcode99($core),
            100 => self::cbopcode100($core), 101 => self::cbopcode101($core), 102 => self::cbopcode102($core),
            103 => self::cbopcode103($core), 104 => self::cbopcode104($core), 105 => self::cbopcode105($core),
            106 => self::cbopcode106($core), 107 => self::cbopcode107($core), 108 => self::cbopcode108($core),
            109 => self::cbopcode109($core), 110 => self::cbopcode110($core), 111 => self::cbopcode111($core),
            112 => self::cbopcode112($core), 113 => self::cbopcode113($core), 114 => self::cbopcode114($core),
            115 => self::cbopcode115($core), 116 => self::cbopcode116($core), 117 => self::cbopcode117($core),
            118 => self::cbopcode118($core), 119 => self::cbopcode119($core), 120 => self::cbopcode120($core),
            121 => self::cbopcode121($core), 122 => self::cbopcode122($core), 123 => self::cbopcode123($core),
            124 => self::cbopcode124($core), 125 => self::cbopcode125($core), 126 => self::cbopcode126($core),
            127 => self::cbopcode127($core), 128 => self::cbopcode128($core), 129 => self::cbopcode129($core),
            130 => self::cbopcode130($core), 131 => self::cbopcode131($core), 132 => self::cbopcode132($core),
            133 => self::cbopcode133($core), 134 => self::cbopcode134($core), 135 => self::cbopcode135($core),
            136 => self::cbopcode136($core), 137 => self::cbopcode137($core), 138 => self::cbopcode138($core),
            139 => self::cbopcode139($core), 140 => self::cbopcode140($core), 141 => self::cbopcode141($core),
            142 => self::cbopcode142($core), 143 => self::cbopcode143($core), 144 => self::cbopcode144($core),
            145 => self::cbopcode145($core), 146 => self::cbopcode146($core), 147 => self::cbopcode147($core),
            148 => self::cbopcode148($core), 149 => self::cbopcode149($core), 150 => self::cbopcode150($core),
            151 => self::cbopcode151($core), 152 => self::cbopcode152($core), 153 => self::cbopcode153($core),
            154 => self::cbopcode154($core), 155 => self::cbopcode155($core), 156 => self::cbopcode156($core),
            157 => self::cbopcode157($core), 158 => self::cbopcode158($core), 159 => self::cbopcode159($core),
            160 => self::cbopcode160($core), 161 => self::cbopcode161($core), 162 => self::cbopcode162($core),
            163 => self::cbopcode163($core), 164 => self::cbopcode164($core), 165 => self::cbopcode165($core),
            166 => self::cbopcode166($core), 167 => self::cbopcode167($core), 168 => self::cbopcode168($core),
            169 => self::cbopcode169($core), 170 => self::cbopcode170($core), 171 => self::cbopcode171($core),
            172 => self::cbopcode172($core), 173 => self::cbopcode173($core), 174 => self::cbopcode174($core),
            175 => self::cbopcode175($core), 176 => self::cbopcode176($core), 177 => self::cbopcode177($core),
            178 => self::cbopcode178($core), 179 => self::cbopcode179($core), 180 => self::cbopcode180($core),
            181 => self::cbopcode181($core), 182 => self::cbopcode182($core), 183 => self::cbopcode183($core),
            184 => self::cbopcode184($core), 185 => self::cbopcode185($core), 186 => self::cbopcode186($core),
            187 => self::cbopcode187($core), 188 => self::cbopcode188($core), 189 => self::cbopcode189($core),
            190 => self::cbopcode190($core), 191 => self::cbopcode191($core), 192 => self::cbopcode192($core),
            193 => self::cbopcode193($core), 194 => self::cbopcode194($core), 195 => self::cbopcode195($core),
            196 => self::cbopcode196($core), 197 => self::cbopcode197($core), 198 => self::cbopcode198($core),
            199 => self::cbopcode199($core), 200 => self::cbopcode200($core), 201 => self::cbopcode201($core),
            202 => self::cbopcode202($core), 203 => self::cbopcode203($core), 204 => self::cbopcode204($core),
            205 => self::cbopcode205($core), 206 => self::cbopcode206($core), 207 => self::cbopcode207($core),
            208 => self::cbopcode208($core), 209 => self::cbopcode209($core), 210 => self::cbopcode210($core),
            211 => self::cbopcode211($core), 212 => self::cbopcode212($core), 213 => self::cbopcode213($core),
            214 => self::cbopcode214($core), 215 => self::cbopcode215($core), 216 => self::cbopcode216($core),
            217 => self::cbopcode217($core), 218 => self::cbopcode218($core), 219 => self::cbopcode219($core),
            220 => self::cbopcode220($core), 221 => self::cbopcode221($core), 222 => self::cbopcode222($core),
            223 => self::cbopcode223($core), 224 => self::cbopcode224($core), 225 => self::cbopcode225($core),
            226 => self::cbopcode226($core), 227 => self::cbopcode227($core), 228 => self::cbopcode228($core),
            229 => self::cbopcode229($core), 230 => self::cbopcode230($core), 231 => self::cbopcode231($core),
            232 => self::cbopcode232($core), 233 => self::cbopcode233($core), 234 => self::cbopcode234($core),
            235 => self::cbopcode235($core), 236 => self::cbopcode236($core), 237 => self::cbopcode237($core),
            238 => self::cbopcode238($core), 239 => self::cbopcode239($core), 240 => self::cbopcode240($core),
            241 => self::cbopcode241($core), 242 => self::cbopcode242($core), 243 => self::cbopcode243($core),
            244 => self::cbopcode244($core), 245 => self::cbopcode245($core), 246 => self::cbopcode246($core),
            247 => self::cbopcode247($core), 248 => self::cbopcode248($core), 249 => self::cbopcode249($core),
            250 => self::cbopcode250($core), 251 => self::cbopcode251($core), 252 => self::cbopcode252($core),
            253 => self::cbopcode253($core), 254 => self::cbopcode254($core), 255 => self::cbopcode255($core),
            default => self::cbopcode0($core),
        };
    }

    /**
     * Cbopcode #0x00.
     *
     * @param Core $core
     */
    private static function cbopcode0(Core $core)
    {
        $core->FCarry = (($core->registerB & 0x80) == 0x80);
        $core->registerB = (($core->registerB << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x01.
     *
     * @param Core $core
     */
    private static function cbopcode1(Core $core)
    {
        $core->FCarry = (($core->registerC & 0x80) == 0x80);
        $core->registerC = (($core->registerC << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x02.
     *
     * @param Core $core
     */
    private static function cbopcode2(Core $core)
    {
        $core->FCarry = (($core->registerD & 0x80) == 0x80);
        $core->registerD = (($core->registerD << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x03.
     *
     * @param Core $core
     */
    private static function cbopcode3(Core $core)
    {
        $core->FCarry = (($core->registerE & 0x80) == 0x80);
        $core->registerE = (($core->registerE << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x04.
     *
     * @param Core $core
     */
    private static function cbopcode4(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x8000) == 0x8000);
        $core->registersHL = (($core->registersHL << 1) & 0xFE00) + (($core->FCarry) ? 0x100 : 0) + ($core->registersHL & 0xFF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x05.
     *
     * @param Core $core
     */
    private static function cbopcode5(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x80) == 0x80);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->registersHL << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x06.
     *
     * @param Core $core
     */
    private static function cbopcode6(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $core->FCarry = (($temp_var & 0x80) == 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x07.
     *
     * @param Core $core
     */
    private static function cbopcode7(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x80) == 0x80);
        $core->registerA = (($core->registerA << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x08.
     *
     * @param Core $core
     */
    private static function cbopcode8(Core $core)
    {
        $core->FCarry = (($core->registerB & 0x01) == 0x01);
        $core->registerB = (($core->FCarry) ? 0x80 : 0) + ($core->registerB >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x09.
     *
     * @param Core $core
     */
    private static function cbopcode9(Core $core)
    {
        $core->FCarry = (($core->registerC & 0x01) == 0x01);
        $core->registerC = (($core->FCarry) ? 0x80 : 0) + ($core->registerC >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x0A.
     *
     * @param Core $core
     */
    private static function cbopcode10(Core $core)
    {
        $core->FCarry = (($core->registerD & 0x01) == 0x01);
        $core->registerD = (($core->FCarry) ? 0x80 : 0) + ($core->registerD >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x0B.
     *
     * @param Core $core
     */
    private static function cbopcode11(Core $core)
    {
        $core->FCarry = (($core->registerE & 0x01) == 0x01);
        $core->registerE = (($core->FCarry) ? 0x80 : 0) + ($core->registerE >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x0C.
     *
     * @param Core $core
     */
    private static function cbopcode12(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0100) == 0x0100);
        $core->registersHL = (($core->FCarry) ? 0x8000 : 0) + (($core->registersHL >> 1) & 0xFF00) + ($core->registersHL & 0xFF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x0D.
     *
     * @param Core $core
     */
    private static function cbopcode13(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x01) == 0x01);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->FCarry) ? 0x80 : 0) + (($core->registersHL & 0xFF) >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x0E.
     *
     * @param Core $core
     */
    private static function cbopcode14(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $core->FCarry = (($temp_var & 0x01) == 0x01);
        $temp_var = (($core->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x0F.
     *
     * @param Core $core
     */
    private static function cbopcode15(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x01) == 0x01);
        $core->registerA = (($core->FCarry) ? 0x80 : 0) + ($core->registerA >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x10.
     *
     * @param Core $core
     */
    private static function cbopcode16(Core $core)
    {
        $newFCarry = (($core->registerB & 0x80) == 0x80);
        $core->registerB = (($core->registerB << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x11.
     *
     * @param Core $core
     */
    private static function cbopcode17(Core $core)
    {
        $newFCarry = (($core->registerC & 0x80) == 0x80);
        $core->registerC = (($core->registerC << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x12.
     *
     * @param Core $core
     */
    private static function cbopcode18(Core $core)
    {
        $newFCarry = (($core->registerD & 0x80) == 0x80);
        $core->registerD = (($core->registerD << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x13.
     *
     * @param Core $core
     */
    private static function cbopcode19(Core $core)
    {
        $newFCarry = (($core->registerE & 0x80) == 0x80);
        $core->registerE = (($core->registerE << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x14.
     *
     * @param Core $core
     */
    private static function cbopcode20(Core $core)
    {
        $newFCarry = (($core->registersHL & 0x8000) == 0x8000);
        $core->registersHL = (($core->registersHL << 1) & 0xFE00) + (($core->FCarry) ? 0x100 : 0) + ($core->registersHL & 0xFF);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x15.
     *
     * @param Core $core
     */
    private static function cbopcode21(Core $core)
    {
        $newFCarry = (($core->registersHL & 0x80) == 0x80);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->registersHL << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x16.
     *
     * @param Core $core
     */
    private static function cbopcode22(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $newFCarry = (($temp_var & 0x80) == 0x80);
        $temp_var = (($temp_var << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x17.
     *
     * @param Core $core
     */
    private static function cbopcode23(Core $core)
    {
        $newFCarry = (($core->registerA & 0x80) == 0x80);
        $core->registerA = (($core->registerA << 1) & 0xFF) + (($core->FCarry) ? 1 : 0);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x18.
     *
     * @param Core $core
     */
    private static function cbopcode24(Core $core)
    {
        $newFCarry = (($core->registerB & 0x01) == 0x01);
        $core->registerB = (($core->FCarry) ? 0x80 : 0) + ($core->registerB >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x19.
     *
     * @param Core $core
     */
    private static function cbopcode25(Core $core)
    {
        $newFCarry = (($core->registerC & 0x01) == 0x01);
        $core->registerC = (($core->FCarry) ? 0x80 : 0) + ($core->registerC >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x1A.
     *
     * @param Core $core
     */
    private static function cbopcode26(Core $core)
    {
        $newFCarry = (($core->registerD & 0x01) == 0x01);
        $core->registerD = (($core->FCarry) ? 0x80 : 0) + ($core->registerD >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x1B.
     *
     * @param Core $core
     */
    private static function cbopcode27(Core $core)
    {
        $newFCarry = (($core->registerE & 0x01) == 0x01);
        $core->registerE = (($core->FCarry) ? 0x80 : 0) + ($core->registerE >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x1C.
     *
     * @param Core $core
     */
    private static function cbopcode28(Core $core)
    {
        $newFCarry = (($core->registersHL & 0x0100) == 0x0100);
        $core->registersHL = (($core->FCarry) ? 0x8000 : 0) + (($core->registersHL >> 1) & 0xFF00) + ($core->registersHL & 0xFF);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x1D.
     *
     * @param Core $core
     */
    private static function cbopcode29(Core $core)
    {
        $newFCarry = (($core->registersHL & 0x01) == 0x01);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->FCarry) ? 0x80 : 0) + (($core->registersHL & 0xFF) >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x1E.
     *
     * @param Core $core
     */
    private static function cbopcode30(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $newFCarry = (($temp_var & 0x01) == 0x01);
        $temp_var = (($core->FCarry) ? 0x80 : 0) + ($temp_var >> 1);
        $core->FCarry = $newFCarry;
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x1F.
     *
     * @param Core $core
     */
    private static function cbopcode31(Core $core)
    {
        $newFCarry = (($core->registerA & 0x01) == 0x01);
        $core->registerA = (($core->FCarry) ? 0x80 : 0) + ($core->registerA >> 1);
        $core->FCarry = $newFCarry;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x20.
     *
     * @param Core $core
     */
    private static function cbopcode32(Core $core)
    {
        $core->FCarry = (($core->registerB & 0x80) == 0x80);
        $core->registerB = ($core->registerB << 1) & 0xFF;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x21.
     *
     * @param Core $core
     */
    private static function cbopcode33(Core $core)
    {
        $core->FCarry = (($core->registerC & 0x80) == 0x80);
        $core->registerC = ($core->registerC << 1) & 0xFF;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x22.
     *
     * @param Core $core
     */
    private static function cbopcode34(Core $core)
    {
        $core->FCarry = (($core->registerD & 0x80) == 0x80);
        $core->registerD = ($core->registerD << 1) & 0xFF;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x23.
     *
     * @param Core $core
     */
    private static function cbopcode35(Core $core)
    {
        $core->FCarry = (($core->registerE & 0x80) == 0x80);
        $core->registerE = ($core->registerE << 1) & 0xFF;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x24.
     *
     * @param Core $core
     */
    private static function cbopcode36(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x8000) == 0x8000);
        $core->registersHL = (($core->registersHL << 1) & 0xFE00) + ($core->registersHL & 0xFF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x25.
     *
     * @param Core $core
     */
    private static function cbopcode37(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0080) == 0x0080);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->registersHL << 1) & 0xFF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x26.
     *
     * @param Core $core
     */
    private static function cbopcode38(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $core->FCarry = (($temp_var & 0x80) == 0x80);
        $temp_var = ($temp_var << 1) & 0xFF;
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x27.
     *
     * @param Core $core
     */
    private static function cbopcode39(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x80) == 0x80);
        $core->registerA = ($core->registerA << 1) & 0xFF;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x28.
     *
     * @param Core $core
     */
    private static function cbopcode40(Core $core)
    {
        $core->FCarry = (($core->registerB & 0x01) == 0x01);
        $core->registerB = ($core->registerB & 0x80) + ($core->registerB >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x29.
     *
     * @param Core $core
     */
    private static function cbopcode41(Core $core)
    {
        $core->FCarry = (($core->registerC & 0x01) == 0x01);
        $core->registerC = ($core->registerC & 0x80) + ($core->registerC >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x2A.
     *
     * @param Core $core
     */
    private static function cbopcode42(Core $core)
    {
        $core->FCarry = (($core->registerD & 0x01) == 0x01);
        $core->registerD = ($core->registerD & 0x80) + ($core->registerD >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x2B.
     *
     * @param Core $core
     */
    private static function cbopcode43(Core $core)
    {
        $core->FCarry = (($core->registerE & 0x01) == 0x01);
        $core->registerE = ($core->registerE & 0x80) + ($core->registerE >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     *
     * Cbopcode #0x2C.
     *
     * @param Core $core
     */
    private static function cbopcode44(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0100) == 0x0100);
        $core->registersHL = (($core->registersHL >> 1) & 0xFF00) + ($core->registersHL & 0x80FF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x2D.
     *
     * @param Core $core
     */
    private static function cbopcode45(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0001) == 0x0001);
        $core->registersHL = ($core->registersHL & 0xFF80) + (($core->registersHL & 0xFF) >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x2E.
     *
     * @param Core $core
     */
    private static function cbopcode46(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $core->FCarry = (($temp_var & 0x01) == 0x01);
        $temp_var = ($temp_var & 0x80) + ($temp_var >> 1);
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x2F.
     *
     * @param Core $core
     */
    private static function cbopcode47(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x01) == 0x01);
        $core->registerA = ($core->registerA & 0x80) + ($core->registerA >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x30.
     *
     * @param Core $core
     */
    private static function cbopcode48(Core $core)
    {
        $core->registerB = (($core->registerB & 0xF) << 4) + ($core->registerB >> 4);
        $core->FZero = ($core->registerB == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x31.
     *
     * @param Core $core
     */
    private static function cbopcode49(Core $core)
    {
        $core->registerC = (($core->registerC & 0xF) << 4) + ($core->registerC >> 4);
        $core->FZero = ($core->registerC == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x32.
     *
     * @param Core $core
     */
    private static function cbopcode50(Core $core)
    {
        $core->registerD = (($core->registerD & 0xF) << 4) + ($core->registerD >> 4);
        $core->FZero = ($core->registerD == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x33.
     *
     * @param Core $core
     */
    private static function cbopcode51(Core $core)
    {
        $core->registerE = (($core->registerE & 0xF) << 4) + ($core->registerE >> 4);
        $core->FZero = ($core->registerE == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x34.
     *
     * @param Core $core
     */
    private static function cbopcode52(Core $core)
    {
        $core->registersHL = (($core->registersHL & 0xF00) << 4) + (($core->registersHL & 0xF000) >> 4) + ($core->registersHL & 0xFF);
        $core->FZero = ($core->registersHL <= 0xFF);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x35.
     *
     * @param Core $core
     */
    private static function cbopcode53(Core $core)
    {
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->registersHL & 0xF) << 4) + (($core->registersHL & 0xF0) >> 4);
        $core->FZero = (($core->registersHL & 0xFF) == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x36.
     *
     * @param Core $core
     */
    private static function cbopcode54(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $temp_var = (($temp_var & 0xF) << 4) + ($temp_var >> 4);
        $core->memoryWrite($core->registersHL, $temp_var);
        $core->FZero = ($temp_var == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x37.
     *
     * @param Core $core
     */
    private static function cbopcode55(Core $core)
    {
        $core->registerA = (($core->registerA & 0xF) << 4) + ($core->registerA >> 4);
        $core->FZero = ($core->registerA == 0);
        $core->FCarry = $core->FHalfCarry = $core->FSubtract = false;
    }

    /**
     * Cbopcode #0x38.
     *
     * @param Core $core
     */
    private static function cbopcode56(Core $core)
    {
        $core->FCarry = (($core->registerB & 0x01) == 0x01);
        $core->registerB >>= 1;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerB == 0);
    }

    /**
     * Cbopcode #0x39.
     *
     * @param Core $core
     */
    private static function cbopcode57(Core $core)
    {
        $core->FCarry = (($core->registerC & 0x01) == 0x01);
        $core->registerC >>= 1;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerC == 0);
    }

    /**
     * Cbopcode #0x3A.
     *
     * @param Core $core
     */
    private static function cbopcode58(Core $core)
    {
        $core->FCarry = (($core->registerD & 0x01) == 0x01);
        $core->registerD >>= 1;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerD == 0);
    }

    /**
     * Cbopcode #0x3B.
     *
     * @param Core $core
     */
    private static function cbopcode59(Core $core)
    {
        $core->FCarry = (($core->registerE & 0x01) == 0x01);
        $core->registerE >>= 1;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerE == 0);
    }

    /**
     * Cbopcode #0x3C.
     *
     * @param Core $core
     */
    private static function cbopcode60(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0100) == 0x0100);
        $core->registersHL = (($core->registersHL >> 1) & 0xFF00) + ($core->registersHL & 0xFF);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registersHL <= 0xFF);
    }

    /**
     * Cbopcode #0x3D.
     *
     * @param Core $core
     */
    private static function cbopcode61(Core $core)
    {
        $core->FCarry = (($core->registersHL & 0x0001) == 0x0001);
        $core->registersHL = ($core->registersHL & 0xFF00) + (($core->registersHL & 0xFF) >> 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0xFF) == 0x00);
    }

    /**
     * Cbopcode #0x3E.
     *
     * @param Core $core
     */
    private static function cbopcode62(Core $core)
    {
        $temp_var = $core->memoryRead($core->registersHL);
        $core->FCarry = (($temp_var & 0x01) == 0x01);
        $core->memoryWrite($core->registersHL, $temp_var >>= 1);
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($temp_var == 0x00);
    }

    /**
     * Cbopcode #0x3F.
     *
     * @param Core $core
     */
    private static function cbopcode63(Core $core)
    {
        $core->FCarry = (($core->registerA & 0x01) == 0x01);
        $core->registerA >>= 1;
        $core->FHalfCarry = $core->FSubtract = false;
        $core->FZero = ($core->registerA == 0x00);
    }

    /**
     * Cbopcode #0x40.
     *
     * @param Core $core
     */
    private static function cbopcode64(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x01) == 0);
    }

    /**
     * Cbopcode #0x41.
     *
     * @param Core $core
     */
    private static function cbopcode65(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x01) == 0);
    }

    /**
     * Cbopcode #0x42.
     *
     * @param Core $core
     */
    private static function cbopcode66(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x01) == 0);
    }

    /**
     * Cbopcode #0x43.
     *
     * @param Core $core
     */
    private static function cbopcode67(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x01) == 0);
    }

    /**
     * Cbopcode #0x44.
     *
     * @param Core $core
     */
    private static function cbopcode68(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0100) == 0);
    }

    /**
     * Cbopcode #0x45.
     *
     * @param Core $core
     */
    private static function cbopcode69(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0001) == 0);
    }

    /**
     * Cbopcode #0x46.
     *
     * @param Core $core
     */
    private static function cbopcode70(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x01) == 0);
    }

    /**
     * Cbopcode #0x47.
     *
     * @param Core $core
     */
    private static function cbopcode71(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x01) == 0);
    }

    /**
     * Cbopcode #0x48.
     *
     * @param Core $core
     */
    private static function cbopcode72(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x02) == 0);
    }

    /**
     * Cbopcode #0x49.
     *
     * @param Core $core
     */
    private static function cbopcode73(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x02) == 0);
    }

    /**
     * Cbopcode #0x4A.
     *
     * @param Core $core
     */
    private static function cbopcode74(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x02) == 0);
    }

    /**
     * Cbopcode #0x4B.
     *
     * @param Core $core
     */
    private static function cbopcode75(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x02) == 0);
    }

    /**
     * Cbopcode #0x4C.
     *
     * @param Core $core
     */
    private static function cbopcode76(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0200) == 0);
    }

    /**
     * Cbopcode #0x4D.
     *
     * @param Core $core
     */
    private static function cbopcode77(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0002) == 0);
    }

    /**
     * Cbopcode #0x4E.
     *
     * @param Core $core
     */
    private static function cbopcode78(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x02) == 0);
    }

    /**
     * Cbopcode #0x4F.
     *
     * @param Core $core
     */
    private static function cbopcode79(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x02) == 0);
    }

    /**
     * Cbopcode #0x50.
     *
     * @param Core $core
     */
    private static function cbopcode80(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x04) == 0);
    }

    /**
     * Cbopcode #0x51.
     *
     * @param Core $core
     */
    private static function cbopcode81(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x04) == 0);
    }

    /**
     * Cbopcode #0x52.
     *
     * @param Core $core
     */
    private static function cbopcode82(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x04) == 0);
    }

    /**
     * Cbopcode #0x53.
     *
     * @param Core $core
     */
    private static function cbopcode83(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x04) == 0);
    }

    /**
     * Cbopcode #0x54.
     *
     * @param Core $core
     */
    private static function cbopcode84(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0400) == 0);
    }

    /**
     * Cbopcode #0x55.
     *
     * @param Core $core
     */
    private static function cbopcode85(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0004) == 0);
    }

    /**
     * Cbopcode #0x56.
     *
     * @param Core $core
     */
    private static function cbopcode86(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x04) == 0);
    }

    /**
     * Cbopcode #0x57.
     *
     * @param Core $core
     */
    private static function cbopcode87(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x04) == 0);
    }

    /**
     * Cbopcode #0x58.
     *
     * @param Core $core
     */
    private static function cbopcode88(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x08) == 0);
    }

    /**
     * Cbopcode #0x59.
     *
     * @param Core $core
     */
    private static function cbopcode89(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x08) == 0);
    }

    /**
     * Cbopcode #0x5A.
     *
     * @param Core $core
     */
    private static function cbopcode90(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x08) == 0);
    }

    /**
     * Cbopcode #0x5B.
     *
     * @param Core $core
     */
    private static function cbopcode91(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x08) == 0);
    }

    /**
     * Cbopcode #0x5C.
     *
     * @param Core $core
     */
    private static function cbopcode92(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0800) == 0);
    }

    /**
     * Cbopcode #0x5D.
     *
     * @param Core $core
     */
    private static function cbopcode93(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0008) == 0);
    }

    /**
     * Cbopcode #0x5E.
     *
     * @param Core $core
     */
    private static function cbopcode94(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x08) == 0);
    }

    /**
     * Cbopcode #0x5F.
     *
     * @param Core $core
     */
    private static function cbopcode95(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x08) == 0);
    }

    /**
     * Cbopcode #0x60.
     *
     * @param Core $core
     */
    private static function cbopcode96(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x10) == 0);
    }

    /**
     * Cbopcode #0x61.
     *
     * @param Core $core
     */
    private static function cbopcode97(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x10) == 0);
    }

    /**
     * Cbopcode #0x62.
     *
     * @param Core $core
     */
    private static function cbopcode98(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x10) == 0);
    }

    /**
     * Cbopcode #0x63.
     *
     * @param Core $core
     */
    private static function cbopcode99(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x10) == 0);
    }

    /**
     * Cbopcode #0x64.
     *
     * @param Core $core
     */
    private static function cbopcode100(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x1000) == 0);
    }

    /**
     * Cbopcode #0x65.
     *
     * @param Core $core
     */
    private static function cbopcode101(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0010) == 0);
    }

    /**
     * Cbopcode #0x66.
     *
     * @param Core $core
     */
    private static function cbopcode102(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x10) == 0);
    }

    /**
     * Cbopcode #0x67.
     *
     * @param Core $core
     */
    private static function cbopcode103(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x10) == 0);
    }

    /**
     * Cbopcode #0x68.
     *
     * @param Core $core
     */
    private static function cbopcode104(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x20) == 0);
    }

    /**
     * Cbopcode #0x69.
     *
     * @param Core $core
     */
    private static function cbopcode105(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x20) == 0);
    }

    /**
     * Cbopcode #0x6A.
     *
     * @param Core $core
     */
    private static function cbopcode106(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x20) == 0);
    }

    /**
     * Cbopcode #0x6B.
     *
     * @param Core $core
     */
    private static function cbopcode107(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x20) == 0);
    }

    /**
     * Cbopcode #0x6C.
     *
     * @param Core $core
     */
    private static function cbopcode108(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x2000) == 0);
    }

    /**
     * Cbopcode #0x6D.
     *
     * @param Core $core
     */
    private static function cbopcode109(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0020) == 0);
    }

    /**
     * Cbopcode #0x6E.
     *
     * @param Core $core
     */
    private static function cbopcode110(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x20) == 0);
    }

    /**
     * Cbopcode #0x6F.
     *
     * @param Core $core
     */
    private static function cbopcode111(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x20) == 0);
    }

    /**
     * Cbopcode #0x70.
     *
     * @param Core $core
     */
    private static function cbopcode112(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x40) == 0);
    }

    /**
     * Cbopcode #0x71.
     *
     * @param Core $core
     */
    private static function cbopcode113(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x40) == 0);
    }

    /**
     * Cbopcode #0x72.
     *
     * @param Core $core
     */
    private static function cbopcode114(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x40) == 0);
    }

    /**
     * Cbopcode #0x73.
     *
     * @param Core $core
     */
    private static function cbopcode115(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x40) == 0);
    }

    /**
     * Cbopcode #0x74.
     *
     * @param Core $core
     */
    private static function cbopcode116(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x4000) == 0);
    }

    /**
     * Cbopcode #0x75.
     *
     * @param Core $core
     */
    private static function cbopcode117(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0040) == 0);
    }

    /**
     * Cbopcode #0x76.
     *
     * @param Core $core
     */
    private static function cbopcode118(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x40) == 0);
    }

    /**
     * Cbopcode #0x77.
     *
     * @param Core $core
     */
    private static function cbopcode119(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x40) == 0);
    }

    /**
     * Cbopcode #0x78.
     *
     * @param Core $core
     */
    private static function cbopcode120(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerB & 0x80) == 0);
    }

    /**
     * Cbopcode #0x79.
     *
     * @param Core $core
     */
    private static function cbopcode121(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerC & 0x80) == 0);
    }

    /**
     * Cbopcode #0x7A.
     *
     * @param Core $core
     */
    private static function cbopcode122(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerD & 0x80) == 0);
    }

    /**
     * Cbopcode #0x7B.
     *
     * @param Core $core
     */
    private static function cbopcode123(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerE & 0x80) == 0);
    }

    /**
     * Cbopcode #0x7C.
     *
     * @param Core $core
     */
    private static function cbopcode124(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x8000) == 0);
    }

    /**
     * Cbopcode #0x7D.
     *
     * @param Core $core
     */
    private static function cbopcode125(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registersHL & 0x0080) == 0);
    }

    /**
     * Cbopcode #0x7E.
     *
     * @param Core $core
     */
    private static function cbopcode126(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->memoryRead($core->registersHL) & 0x80) == 0);
    }

    /**
     * Cbopcode #0x7F.
     *
     * @param Core $core
     */
    private static function cbopcode127(Core $core)
    {
        $core->FHalfCarry = true;
        $core->FSubtract = false;
        $core->FZero = (($core->registerA & 0x80) == 0);
    }

    /**
     * Cbopcode #0x80.
     *
     * @param Core $core
     */
    private static function cbopcode128(Core $core)
    {
        $core->registerB &= 0xFE;
    }

    /**
     * Cbopcode #0x81.
     *
     * @param Core $core
     */
    private static function cbopcode129(Core $core)
    {
        $core->registerC &= 0xFE;
    }

    /**
     * Cbopcode #0x82.
     *
     * @param Core $core
     */
    private static function cbopcode130(Core $core)
    {
        $core->registerD &= 0xFE;
    }

    /**
     * Cbopcode #0x83.
     *
     * @param Core $core
     */
    private static function cbopcode131(Core $core)
    {
        $core->registerE &= 0xFE;
    }

    /**
     * Cbopcode #0x84.
     *
     * @param Core $core
     */
    private static function cbopcode132(Core $core)
    {
        $core->registersHL &= 0xFEFF;
    }

    /**
     * Cbopcode #0x85.
     *
     * @param Core $core
     */
    private static function cbopcode133(Core $core)
    {
        $core->registersHL &= 0xFFFE;
    }

    /**
     * Cbopcode #0x86.
     *
     * @param Core $core
     */
    private static function cbopcode134(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xFE);
    }

    /**
     * Cbopcode #0x87.
     *
     * @param Core $core
     */
    private static function cbopcode135(Core $core)
    {
        $core->registerA &= 0xFE;
    }

    /**
     * Cbopcode #0x88.
     *
     * @param Core $core
     */
    private static function cbopcode136(Core $core)
    {
        $core->registerB &= 0xFD;
    }

    /**
     * Cbopcode #0x89.
     *
     * @param Core $core
     */
    private static function cbopcode137(Core $core)
    {
        $core->registerC &= 0xFD;
    }

    /**
     * Cbopcode #0x8A.
     *
     * @param Core $core
     */
    private static function cbopcode138(Core $core)
    {
        $core->registerD &= 0xFD;
    }

    /**
     * Cbopcode #0x8B.
     *
     * @param Core $core
     */
    private static function cbopcode139(Core $core)
    {
        $core->registerE &= 0xFD;
    }

    /**
     * Cbopcode #0x8C.
     *
     * @param Core $core
     */
    private static function cbopcode140(Core $core)
    {
        $core->registersHL &= 0xFDFF;
    }

    /**
     * Cbopcode #0x8D.
     *
     * @param Core $core
     */
    private static function cbopcode141(Core $core)
    {
        $core->registersHL &= 0xFFFD;
    }

    /**
     * Cbopcode #0x8E.
     *
     * @param Core $core
     */
    private static function cbopcode142(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xFD);
    }

    /**
     * Cbopcode #0x8F.
     *
     * @param Core $core
     */
    private static function cbopcode143(Core $core)
    {
        $core->registerA &= 0xFD;
    }

    /**
     * Cbopcode #0x90.
     *
     * @param Core $core
     */
    private static function cbopcode144(Core $core)
    {
        $core->registerB &= 0xFB;
    }

    /**
     * Cbopcode #0x91.
     *
     * @param Core $core
     */
    private static function cbopcode145(Core $core)
    {
        $core->registerC &= 0xFB;
    }

    /**
     * Cbopcode #0x92.
     *
     * @param Core $core
     */
    private static function cbopcode146(Core $core)
    {
        $core->registerD &= 0xFB;
    }

    /**
     * Cbopcode #0x93.
     *
     * @param Core $core
     */
    private static function cbopcode147(Core $core)
    {
        $core->registerE &= 0xFB;
    }

    /**
     * Cbopcode #0x94.
     *
     * @param Core $core
     */
    private static function cbopcode148(Core $core)
    {
        $core->registersHL &= 0xFBFF;
    }

    /**
     * Cbopcode #0x95.
     *
     * @param Core $core
     */
    private static function cbopcode149(Core $core)
    {
        $core->registersHL &= 0xFFFB;
    }

    /**
     * Cbopcode #0x96.
     *
     * @param Core $core
     */
    private static function cbopcode150(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xFB);
    }

    /**
     * Cbopcode #0x97.
     *
     * @param Core $core
     */
    private static function cbopcode151(Core $core)
    {
        $core->registerA &= 0xFB;
    }

    /**
     * Cbopcode #0x98.
     *
     * @param Core $core
     */
    private static function cbopcode152(Core $core)
    {
        $core->registerB &= 0xF7;
    }

    /**
     * Cbopcode #0x99.
     *
     * @param Core $core
     */
    private static function cbopcode153(Core $core)
    {
        $core->registerC &= 0xF7;
    }

    /**
     * Cbopcode #0x9A.
     *
     * @param Core $core
     */
    private static function cbopcode154(Core $core)
    {
        $core->registerD &= 0xF7;
    }

    /**
     * Cbopcode #0x9B.
     *
     * @param Core $core
     */
    private static function cbopcode155(Core $core)
    {
        $core->registerE &= 0xF7;
    }

    /**
     * Cbopcode #0x9C.
     *
     * @param Core $core
     */
    private static function cbopcode156(Core $core)
    {
        $core->registersHL &= 0xF7FF;
    }

    /**
     * Cbopcode #0x9D.
     *
     * @param Core $core
     */
    private static function cbopcode157(Core $core)
    {
        $core->registersHL &= 0xFFF7;
    }

    /**
     * Cbopcode #0x9E.
     *
     * @param Core $core
     */
    private static function cbopcode158(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xF7);
    }

    /**
     * Cbopcode #0x9F.
     *
     * @param Core $core
     */
    private static function cbopcode159(Core $core)
    {
        $core->registerA &= 0xF7;
    }

    /**
     * Cbopcode #0xA0.
     *
     * @param Core $core
     */
    private static function cbopcode160(Core $core)
    {
        $core->registerB &= 0xEF;
    }

    /**
     * Cbopcode #0xA1.
     *
     * @param Core $core
     */
    private static function cbopcode161(Core $core)
    {
        $core->registerC &= 0xEF;
    }

    /**
     * Cbopcode #0xA2.
     *
     * @param Core $core
     */
    private static function cbopcode162(Core $core)
    {
        $core->registerD &= 0xEF;
    }

    /**
     * Cbopcode #0xA3.
     *
     * @param Core $core
     */
    private static function cbopcode163(Core $core)
    {
        $core->registerE &= 0xEF;
    }

    /**
     * Cbopcode #0xA4.
     *
     * @param Core $core
     */
    private static function cbopcode164(Core $core)
    {
        $core->registersHL &= 0xEFFF;
    }

    /**
     * Cbopcode #0xA5.
     *
     * @param Core $core
     */
    private static function cbopcode165(Core $core)
    {
        $core->registersHL &= 0xFFEF;
    }

    /**
     * Cbopcode #0xA6.
     *
     * @param Core $core
     */
    private static function cbopcode166(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xEF);
    }

    /**
     * Cbopcode #0xA7.
     *
     * @param Core $core
     */
    private static function cbopcode167(Core $core)
    {
        $core->registerA &= 0xEF;
    }

    /**
     * Cbopcode #0xA8.
     *
     * @param Core $core
     */
    private static function cbopcode168(Core $core)
    {
        $core->registerB &= 0xDF;
    }

    /**
     * Cbopcode #0xA9.
     *
     * @param Core $core
     */
    private static function cbopcode169(Core $core)
    {
        $core->registerC &= 0xDF;
    }

    /**
     * Cbopcode #0xAA.
     *
     * @param Core $core
     */
    private static function cbopcode170(Core $core)
    {
        $core->registerD &= 0xDF;
    }

    /**
     * Cbopcode #0xAB.
     *
     * @param Core $core
     */
    private static function cbopcode171(Core $core)
    {
        $core->registerE &= 0xDF;
    }

    /**
     * Cbopcode #0xAC.
     *
     * @param Core $core
     */
    private static function cbopcode172(Core $core)
    {
        $core->registersHL &= 0xDFFF;
    }

    /**
     * Cbopcode #0xAD.
     *
     * @param Core $core
     */
    private static function cbopcode173(Core $core)
    {
        $core->registersHL &= 0xFFDF;
    }

    /**
     * Cbopcode #0xAE.
     *
     * @param Core $core
     */
    private static function cbopcode174(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xDF);
    }

    /**
     * Cbopcode #0xAF.
     *
     * @param Core $core
     */
    private static function cbopcode175(Core $core)
    {
        $core->registerA &= 0xDF;
    }

    /**
     * Cbopcode #0xB0.
     *
     * @param Core $core
     */
    private static function cbopcode176(Core $core)
    {
        $core->registerB &= 0xBF;
    }

    /**
     * Cbopcode #0xB1.
     *
     * @param Core $core
     */
    private static function cbopcode177(Core $core)
    {
        $core->registerC &= 0xBF;
    }

    /**
     * Cbopcode #0xB2.
     *
     * @param Core $core
     */
    private static function cbopcode178(Core $core)
    {
        $core->registerD &= 0xBF;
    }

    /**
     * Cbopcode #0xB3.
     *
     * @param Core $core
     */
    private static function cbopcode179(Core $core)
    {
        $core->registerE &= 0xBF;
    }

    /**
     * Cbopcode #0xB4.
     *
     * @param Core $core
     */
    private static function cbopcode180(Core $core)
    {
        $core->registersHL &= 0xBFFF;
    }

    /**
     * Cbopcode #0xB5.
     *
     * @param Core $core
     */
    private static function cbopcode181(Core $core)
    {
        $core->registersHL &= 0xFFBF;
    }

    /**
     * Cbopcode #0xB6.
     *
     * @param Core $core
     */
    private static function cbopcode182(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0xBF);
    }

    /**
     * Cbopcode #0xB7.
     *
     * @param Core $core
     */
    private static function cbopcode183(Core $core)
    {
        $core->registerA &= 0xBF;
    }

    /**
     * Cbopcode #0xB8.
     *
     * @param Core $core
     */
    private static function cbopcode184(Core $core)
    {
        $core->registerB &= 0x7F;
    }

    /**
     * Cbopcode #0xB9.
     *
     * @param Core $core
     */
    private static function cbopcode185(Core $core)
    {
        $core->registerC &= 0x7F;
    }

    /**
     * Cbopcode #0xBA.
     *
     * @param Core $core
     */
    private static function cbopcode186(Core $core)
    {
        $core->registerD &= 0x7F;
    }

    /**
     * Cbopcode #0xBB.
     *
     * @param Core $core
     */
    private static function cbopcode187(Core $core)
    {
        $core->registerE &= 0x7F;
    }

    /**
     * Cbopcode #0xBC.
     *
     * @param Core $core
     */
    private static function cbopcode188(Core $core)
    {
        $core->registersHL &= 0x7FFF;
    }

    /**
     * Cbopcode #0xBD.
     *
     * @param Core $core
     */
    private static function cbopcode189(Core $core)
    {
        $core->registersHL &= 0xFF7F;
    }

    /**
     * Cbopcode #0xBE.
     *
     * @param Core $core
     */
    private static function cbopcode190(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) & 0x7F);
    }

    /**
     * Cbopcode #0xBF.
     *
     * @param Core $core
     */
    private static function cbopcode191(Core $core)
    {
        $core->registerA &= 0x7F;
    }

    /**
     * Cbopcode #0xC0.
     *
     * @param Core $core
     */
    private static function cbopcode192(Core $core)
    {
        $core->registerB |= 0x01;
    }

    /**
     * Cbopcode #0xC1.
     *
     * @param Core $core
     */
    private static function cbopcode193(Core $core)
    {
        $core->registerC |= 0x01;
    }

    /**
     * Cbopcode #0xC2.
     *
     * @param Core $core
     */
    private static function cbopcode194(Core $core)
    {
        $core->registerD |= 0x01;
    }

    /**
     * Cbopcode #0xC3.
     *
     * @param Core $core
     */
    private static function cbopcode195(Core $core)
    {
        $core->registerE |= 0x01;
    }

    /**
     * Cbopcode #0xC4.
     *
     * @param Core $core
     */
    private static function cbopcode196(Core $core)
    {
        $core->registersHL |= 0x0100;
    }

    /**
     * Cbopcode #0xC5.
     *
     * @param Core $core
     */
    private static function cbopcode197(Core $core)
    {
        $core->registersHL |= 0x01;
    }

    /**
     * Cbopcode #0xC6.
     *
     * @param Core $core
     */
    private static function cbopcode198(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x01);
    }

    /**
     * Cbopcode #0xC7.
     *
     * @param Core $core
     */
    private static function cbopcode199(Core $core)
    {
        $core->registerA |= 0x01;
    }

    /**
     * Cbopcode #0xC8.
     *
     * @param Core $core
     */
    private static function cbopcode200(Core $core)
    {
        $core->registerB |= 0x02;
    }

    /**
     * Cbopcode #0xC9.
     *
     * @param Core $core
     */
    private static function cbopcode201(Core $core)
    {
        $core->registerC |= 0x02;
    }

    /**
     * Cbopcode #0xCA.
     *
     * @param Core $core
     */
    private static function cbopcode202(Core $core)
    {
        $core->registerD |= 0x02;
    }

    /**
     * Cbopcode #0xCB.
     *
     * @param Core $core
     */
    private static function cbopcode203(Core $core)
    {
        $core->registerE |= 0x02;
    }

    /**
     * Cbopcode #0xCC.
     *
     * @param Core $core
     */
    private static function cbopcode204(Core $core)
    {
        $core->registersHL |= 0x0200;
    }

    /**
     * Cbopcode #0xCD.
     *
     * @param Core $core
     */
    private static function cbopcode205(Core $core)
    {
        $core->registersHL |= 0x02;
    }

    /**
     * Cbopcode #0xCE.
     *
     * @param Core $core
     */
    private static function cbopcode206(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x02);
    }

    /**
     * Cbopcode #0xCF.
     *
     * @param Core $core
     */
    private static function cbopcode207(Core $core)
    {
        $core->registerA |= 0x02;
    }

    /**
     * Cbopcode #0xD0.
     *
     * @param Core $core
     */
    private static function cbopcode208(Core $core)
    {
        $core->registerB |= 0x04;
    }

    /**
     * Cbopcode #0xD1.
     *
     * @param Core $core
     */
    private static function cbopcode209(Core $core)
    {
        $core->registerC |= 0x04;
    }

    /**
     * Cbopcode #0xD2.
     *
     * @param Core $core
     */
    private static function cbopcode210(Core $core)
    {
        $core->registerD |= 0x04;
    }

    /**
     * Cbopcode #0xD3.
     *
     * @param Core $core
     */
    private static function cbopcode211(Core $core)
    {
        $core->registerE |= 0x04;
    }

    /**
     * Cbopcode #0xD4.
     *
     * @param Core $core
     */
    private static function cbopcode212(Core $core)
    {
        $core->registersHL |= 0x0400;
    }

    /**
     * Cbopcode #0xD5.
     *
     * @param Core $core
     */
    private static function cbopcode213(Core $core)
    {
        $core->registersHL |= 0x04;
    }

    /**
     * Cbopcode #0xD6.
     *
     * @param Core $core
     */
    private static function cbopcode214(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x04);
    }

    /**
     * Cbopcode #0xD7.
     *
     * @param Core $core
     */
    private static function cbopcode215(Core $core)
    {
        $core->registerA |= 0x04;
    }

    /**
     * Cbopcode #0xD8.
     *
     * @param Core $core
     */
    private static function cbopcode216(Core $core)
    {
        $core->registerB |= 0x08;
    }

    /**
     * Cbopcode #0xD9.
     *
     * @param Core $core
     */
    private static function cbopcode217(Core $core)
    {
        $core->registerC |= 0x08;
    }

    /**
     * Cbopcode #0xDA.
     *
     * @param Core $core
     */
    private static function cbopcode218(Core $core)
    {
        $core->registerD |= 0x08;
    }

    /**
     * Cbopcode #0xDB.
     *
     * @param Core $core
     */
    private static function cbopcode219(Core $core)
    {
        $core->registerE |= 0x08;
    }

    /**
     * Cbopcode #0xDC.
     *
     * @param Core $core
     */
    private static function cbopcode220(Core $core)
    {
        $core->registersHL |= 0x0800;
    }

    /**
     * Cbopcode #0xDD.
     *
     * @param Core $core
     */
    private static function cbopcode221(Core $core)
    {
        $core->registersHL |= 0x08;
    }

    /**
     * Cbopcode #0xDE.
     *
     * @param Core $core
     */
    private static function cbopcode222(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x08);
    }

    /**
     * Cbopcode #0xDF.
     *
     * @param Core $core
     */
    private static function cbopcode223(Core $core)
    {
        $core->registerA |= 0x08;
    }

    /**
     * Cbopcode #0xE0.
     *
     * @param Core $core
     */
    private static function cbopcode224(Core $core)
    {
        $core->registerB |= 0x10;
    }

    /**
     * Cbopcode #0xE1.
     *
     * @param Core $core
     */
    private static function cbopcode225(Core $core)
    {
        $core->registerC |= 0x10;
    }

    /**
     * Cbopcode #0xE2.
     *
     * @param Core $core
     */
    private static function cbopcode226(Core $core)
    {
        $core->registerD |= 0x10;
    }

    /**
     * Cbopcode #0xE3.
     *
     * @param Core $core
     */
    private static function cbopcode227(Core $core)
    {
        $core->registerE |= 0x10;
    }

    /**
     * Cbopcode #0xE4.
     *
     * @param Core $core
     */
    private static function cbopcode228(Core $core)
    {
        $core->registersHL |= 0x1000;
    }

    /**
     * Cbopcode #0xE5.
     *
     * @param Core $core
     */
    private static function cbopcode229(Core $core)
    {
        $core->registersHL |= 0x10;
    }

    /**
     * Cbopcode #0xE6.
     *
     * @param Core $core
     */
    private static function cbopcode230(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x10);
    }

    /**
     * Cbopcode #0xE7.
     *
     * @param Core $core
     */
    private static function cbopcode231(Core $core)
    {
        $core->registerA |= 0x10;
    }

    /**
     * Cbopcode #0xE8.
     *
     * @param Core $core
     */
    private static function cbopcode232(Core $core)
    {
        $core->registerB |= 0x20;
    }

    /**
     * Cbopcode #0xE9.
     *
     * @param Core $core
     */
    private static function cbopcode233(Core $core)
    {
        $core->registerC |= 0x20;
    }

    /**
     * Cbopcode #0xEA.
     *
     * @param Core $core
     */
    private static function cbopcode234(Core $core)
    {
        $core->registerD |= 0x20;
    }

    /**
     * Cbopcode #0xEB.
     *
     * @param Core $core
     */
    private static function cbopcode235(Core $core)
    {
        $core->registerE |= 0x20;
    }

    /**
     * Cbopcode #0xEC.
     *
     * @param Core $core
     */
    private static function cbopcode236(Core $core)
    {
        $core->registersHL |= 0x2000;
    }

    /**
     * Cbopcode #0xED.
     *
     * @param Core $core
     */
    private static function cbopcode237(Core $core)
    {
        $core->registersHL |= 0x20;
    }

    /**
     * Cbopcode #0xEE.
     *
     * @param Core $core
     */
    private static function cbopcode238(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x20);
    }

    /**
     * Cbopcode #0xEF.
     *
     * @param Core $core
     */
    private static function cbopcode239(Core $core)
    {
        $core->registerA |= 0x20;
    }

    /**
     * Cbopcode #0xF0.
     *
     * @param Core $core
     */
    private static function cbopcode240(Core $core)
    {
        $core->registerB |= 0x40;
    }

    /**
     * Cbopcode #0xF1.
     *
     * @param Core $core
     */
    private static function cbopcode241(Core $core)
    {
        $core->registerC |= 0x40;
    }

    /**
     * Cbopcode #0xF2.
     *
     * @param Core $core
     */
    private static function cbopcode242(Core $core)
    {
        $core->registerD |= 0x40;
    }

    /**
     * Cbopcode #0xF3.
     *
     * @param Core $core
     */
    private static function cbopcode243(Core $core)
    {
        $core->registerE |= 0x40;
    }

    /**
     * Cbopcode #0xF4.
     *
     * @param Core $core
     */
    private static function cbopcode244(Core $core)
    {
        $core->registersHL |= 0x4000;
    }

    /**
     * Cbopcode #0xF5.
     *
     * @param Core $core
     */
    private static function cbopcode245(Core $core)
    {
        $core->registersHL |= 0x40;
    }

    /**
     * Cbopcode #0xF6.
     *
     * @param Core $core
     */
    private static function cbopcode246(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x40);
    }

    /**
     * Cbopcode #0xF7.
     *
     * @param Core $core
     */
    private static function cbopcode247(Core $core)
    {
        $core->registerA |= 0x40;
    }

    /**
     * Cbopcode #0xF8.
     *
     * @param Core $core
     */
    private static function cbopcode248(Core $core)
    {
        $core->registerB |= 0x80;
    }

    /**
     * Cbopcode #0xF9.
     *
     * @param Core $core
     */
    private static function cbopcode249(Core $core)
    {
        $core->registerC |= 0x80;
    }

    /**
     * Cbopcode #0xFA.
     *
     * @param Core $core
     */
    private static function cbopcode250(Core $core)
    {
        $core->registerD |= 0x80;
    }

    /**
     * Cbopcode #0xFB.
     *
     * @param Core $core
     */
    private static function cbopcode251(Core $core)
    {
        $core->registerE |= 0x80;
    }

    /**
     * Cbopcode #0xFC.
     *
     * @param Core $core
     */
    private static function cbopcode252(Core $core)
    {
        $core->registersHL |= 0x8000;
    }

    /**
     * Cbopcode #0xFD.
     *
     * @param Core $core
     */
    private static function cbopcode253(Core $core)
    {
        $core->registersHL |= 0x80;
    }

    /**
     * Cbopcode #0xFE.
     *
     * @param Core $core
     */
    private static function cbopcode254(Core $core)
    {
        $core->memoryWrite($core->registersHL, $core->memoryRead($core->registersHL) | 0x80);
    }

    /**
     * Cbopcode #0xFF.
     *
     * @param Core $core
     */
    private static function cbopcode255(Core $core)
    {
        $core->registerA |= 0x80;
    }
}
