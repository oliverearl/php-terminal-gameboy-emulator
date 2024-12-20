<?php

declare(strict_types=1);

use App\Exports\MemoryExporter;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->dumper = new MemoryExporter();
    $this->filename = 'test-memory-dump.csv';
    $this->filepath = getcwd() . DIRECTORY_SEPARATOR . $this->filename;

    if (file_exists($this->filepath)) {
        unlink($this->filepath);
    }

    expect(file_exists($this->filepath))->toBeFalse();
});

it('creates a valid CSV file for an empty memory array', function () {
    $this->dumper->export([], $this->filename);

    expect(file_exists($this->filepath))->toBeTrue();
    $contents = file_get_contents($this->filepath);

    // Expect just the header row:
    expect($contents)->toContain('StartAddr,+0,+1,+2,+3,+4,+5,+6,+7,+8,+9,+A,+B,+C,+D,+E,+F' . PHP_EOL);

    // No additional rows.
    $lines = explode(PHP_EOL, trim($contents));
    expect($lines)->toHaveCount(1);
});

it('creates a valid CSV file for a small memory array (less than 16 bytes)', function () {
    // Example memory: 3 bytes: [0x01, 0xFF, 0x10]
    $this->dumper->export([0x01, 0xFF, 0x10], $this->filename);

    $contents = file_get_contents($this->filepath);
    $lines = explode(PHP_EOL, trim($contents));

    // 1 line header + 1 line data.
    expect($lines)
        ->toHaveCount(2)
        ->and(head($lines))->toContain('StartAddr,+0,+1,+2,+3');

    // Check data line.
    $dataColumns = str_getcsv($lines[1]);
    expect($dataColumns[0])
        ->toBe('0x0000') // Address
        ->and($dataColumns[1])->toBe('01')
        ->and($dataColumns[2])->toBe('FF')
        ->and($dataColumns[3])->toBe('10');

    // The rest should be empty.
    for ($i = 4; $i <= 16; $i++) {
        expect($dataColumns[$i])->toBeEmpty();
    }
});

it('creates a valid CSV file for exactly 16 bytes', function () {
    // 16 bytes: 0x00 to 0x0F.
    $memory = range(0x00, 0x0F);
    $this->dumper->export($memory, $this->filename);

    $contents = file_get_contents($this->filepath);
    $lines = explode(PHP_EOL, trim($contents));

    // 1 line header + 1 line data.
    expect($lines)->toHaveCount(2);

    $dataColumns = str_getcsv($lines[1]);
    expect($dataColumns[0])->toBe('0x0000');

    // Check all 16 bytes in hex:
    for ($i = 0; $i < 16; $i++) {
        $expectedHex = Str::upper(sprintf('%02X', $i));
        expect($dataColumns[$i + 1])->toBe($expectedHex);
    }
});

it('handles arrays larger than 16 bytes, producing multiple rows', function () {
    // 20 bytes: 0x10 to 0x23: (just an example)
    $memory = range(0x10, 0x23);
    $this->dumper->export($memory, $this->filename);

    $contents = file_get_contents($this->filepath);
    $lines = explode(PHP_EOL, trim($contents));

    // Header + 2 data lines. (since 20 bytes = 16 on first line, 4 on second)
    expect(count($lines))->toBe(3);

    // First data line should start at 0x0000.
    $firstData = str_getcsv($lines[1]);
    expect($firstData[0])->toBe('0x0000');

    // Should have 16 bytes from 0x10 to 0x1F.
    for ($i = 0; $i < 16; $i++) {
        $expectedHex = sprintf('%02X', 0x10 + $i);
        expect($firstData[$i + 1])->toBe($expectedHex);
    }

    // Second data line starts at 0x0010. (decimal 16)
    $secondData = str_getcsv($lines[2]);
    expect($secondData[0])->toBe('0x0010');

    // Should contain 4 remaining bytes: 0x20,0x21,0x22,0x23
    for ($i = 0; $i < 4; $i++) {
        $expectedHex = sprintf('%02X', 0x20 + $i);
        expect($secondData[$i + 1])->toBe($expectedHex);
    }

    // The rest of that line should be empty.
    for ($i = 5; $i < 17; $i++) {
        expect($secondData[$i])->toBeEmpty();
    }
});
