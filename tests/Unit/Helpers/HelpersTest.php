<?php

declare(strict_types=1);

use App\Emulator\Helpers;

describe('Helpers::getPreinitializedArray', function (): void {
    it('creates an array of the given length filled with the default value', function (): void {
        $result = Helpers::getPreinitializedArray(5, 'test');
        expect($result)->toBe(['test', 'test', 'test', 'test', 'test']);
    });

    it('returns an empty array when the length is zero', function (): void {
        $result = Helpers::getPreinitializedArray(0, 'default');
        expect($result)->toBe([]);
    });

    it('works with numeric default values', function (): void {
        $result = Helpers::getPreinitializedArray(3, 42);
        expect($result)->toBe([42, 42, 42]);
    });

    it('works with null as the default value', function (): void {
        $result = Helpers::getPreinitializedArray(4, null);
        expect($result)->toBe([null, null, null, null]);
    });

    it('throws a ValueError when a negative length is provided', function (): void {
        expect(fn(): array => Helpers::getPreinitializedArray(-1, 'value'))->toThrow(ValueError::class);
    });
});

describe('Helpers::unswtuw', function (): void {
    it('returns the same value if the input is already non-negative', function (): void {
        $result = Helpers::unswtuw(12345);
        expect($result)->toBe(12345);
    });

    it('converts -1 to 65535', function (): void {
        $result = Helpers::unswtuw(-1);
        expect($result)->toBe(65535);
    });

    it('converts -32768 to 32768', function (): void {
        $result = Helpers::unswtuw(-32768);
        expect($result)->toBe(32768);
    });

    it('converts -12345 correctly', function (): void {
        $result = Helpers::unswtuw(-12345);
        expect($result)->toBe(53191); // -12345 + 0x10000
    });

    it('handles the edge case of 0 correctly', function (): void {
        $result = Helpers::unswtuw(0);
        expect($result)->toBe(0);
    });
});

describe('Helpers::usbtsb', function (): void {
    it('returns the same value if the input is within the signed byte range (0–127)', function (): void {
        $result = Helpers::usbtsb(0);
        expect($result)->toBe(0);

        $result = Helpers::usbtsb(127);
        expect($result)->toBe(127);
    });

    it('converts 128 to -128', function (): void {
        $result = Helpers::usbtsb(128);
        expect($result)->toBe(-128);
    });

    it('converts 255 to -1', function (): void {
        $result = Helpers::usbtsb(255);
        expect($result)->toBe(-1);
    });

    it('converts 200 correctly to -56', function (): void {
        $result = Helpers::usbtsb(200);
        expect($result)->toBe(-56); // 200 - 256
    });

    it('handles the boundary value of 0x7F (127) correctly', function (): void {
        $result = Helpers::usbtsb(0x7F);
        expect($result)->toBe(127);
    });

    it('handles the boundary value of 0x80 (128) correctly', function (): void {
        $result = Helpers::usbtsb(0x80);
        expect($result)->toBe(-128);
    });
});

describe('Helpers::unsbtub', function (): void {
    it('returns the same value if the input is already non-negative', function (): void {
        $result = Helpers::unsbtub(0);
        expect($result)->toBe(0);

        $result = Helpers::unsbtub(127);
        expect($result)->toBe(127);

        $result = Helpers::unsbtub(255);
        expect($result)->toBe(255);
    });

    it('converts -1 to 255', function (): void {
        $result = Helpers::unsbtub(-1);
        expect($result)->toBe(255);
    });

    it('converts -128 to 128', function (): void {
        $result = Helpers::unsbtub(-128);
        expect($result)->toBe(128);
    });

    it('converts -100 correctly to 156', function (): void {
        $result = Helpers::unsbtub(-100);
        expect($result)->toBe(156); // -100 + 0x100
    });

    it('handles boundary value of 0 correctly', function (): void {
        $result = Helpers::unsbtub(0);
        expect($result)->toBe(0);
    });
});

describe('Helpers::nswtuw', function (): void {
    it('returns the same value if the input is already non-negative and within the 16-bit range', function (): void {
        $result = Helpers::nswtuw(0);
        expect($result)->toBe(0);

        $result = Helpers::nswtuw(32767);
        expect($result)->toBe(32767);

        $result = Helpers::nswtuw(65535);
        expect($result)->toBe(65535);
    });

    it('converts -1 to 65535', function (): void {
        $result = Helpers::nswtuw(-1);
        expect($result)->toBe(65535);
    });

    it('converts -32768 to 32768', function (): void {
        $result = Helpers::nswtuw(-32768);
        expect($result)->toBe(32768);
    });

    it('wraps large positive values correctly within the 16-bit range', function (): void {
        $result = Helpers::nswtuw(70000);
        expect($result)->toBe(4464); // 70000 & 0xFFFF
    });

    it('wraps large negative values correctly within the 16-bit range', function (): void {
        $result = Helpers::nswtuw(-70000);
        expect($result)->toBe(61072); // (-70000 + 0x10000) & 0xFFFF
    });

    it('handles an arbitrary negative value correctly', function (): void {
        $result = Helpers::nswtuw(-12345);
        expect($result)->toBe(53191); // -12345 + 0x10000
    });
});
