<?php

declare(strict_types=1);

namespace App\Emulator;

abstract class Helpers
{
    /**
     * Builds an array of a given length.
     *
     * @param int $length
     * @param mixed $defaultValue
     *
     * @return array<int, mixed>
     */
    public static function getPreinitializedArray(int $length, mixed $defaultValue): array
    {
        return array_fill(0, $length, $defaultValue);
    }

    /**
     * Ensures a signed 16-bit word is treated as an unsigned 16-bit word.
     *
     * This method converts a signed 16-bit integer (e.g., -1) into its unsigned
     * 16-bit equivalent (e.g., 65535) by wrapping negative values into the
     * unsigned 16-bit range (0–65535).
     *
     * If the input is already non-negative, it remains unchanged.
     *
     * @param int $unsigned The signed 16-bit word to convert. Expected range: -32768 to 65535.
     *
     * @return int The unsigned 16-bit equivalent of the input word.
     */
    public static function unswtuw(int $unsigned): int
    {
        if ($unsigned < 0) {
            $unsigned += 0x10000;
        }

        return $unsigned;
    }

    /**
     * Converts an unsigned 8-bit byte to its signed 8-bit equivalent.
     *
     * This method interprets an unsigned byte (0–255) as a signed byte
     * (-128 to 127) by checking if the most significant bit (MSB) is set.
     * If the input byte is greater than 127, it is treated as a negative value
     * in two's complement form.
     *
     * @param int $ubyte The unsigned byte to convert. Expected range: 0–255.
     *
     * @return int The signed byte equivalent. Range: -128 to 127.
     */
    public static function usbtsb(int $ubyte): int
    {
        return ($ubyte > 0x7F) ? (($ubyte & 0x7F) - 0x80) : $ubyte;
    }

    /**
     * Ensures a signed 8-bit byte is treated as an unsigned 8-bit byte.
     *
     * This method converts a signed 8-bit integer (e.g., -1) into its unsigned
     * 8-bit equivalent (e.g., 255) by wrapping negative values into the
     * unsigned 8-bit range (0–255).
     *
     * If the input is already non-negative, it remains unchanged.
     *
     * @param int $ubyte The signed byte to convert. Expected range: -128 to 255.
     *
     * @return int The unsigned 8-bit equivalent of the input byte. Range: 0–255.
     */
    public static function unsbtub(int $ubyte): int
    {
        if ($ubyte < 0) {
            $ubyte += 0x100;
        }

        return $ubyte;
    }

    /**
     * Ensures a signed 16-bit word is treated as an unsigned 16-bit word with wrapping.
     *
     * This method converts a signed 16-bit integer (e.g., -1) into its unsigned
     * 16-bit equivalent (e.g., 65535) by wrapping negative values into the
     * unsigned 16-bit range (0–65535) and masking the result to 16 bits.
     *
     * If the input is already non-negative, it is returned within the 16-bit range.
     *
     * @param int $uword The signed word to convert. Expected range: -32768 to 65535.
     * @return int The unsigned 16-bit equivalent of the input word. Range: 0–65535.
     */
    public static function nswtuw(int $uword): int
    {
        if ($uword < 0) {
            $uword += 0x10000;
        }

        return $uword & 0xFFFF;
    }
}
