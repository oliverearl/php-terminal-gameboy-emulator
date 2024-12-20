<?php

declare(strict_types=1);

namespace App\Exports;

use Illuminate\Support\Carbon;
use RuntimeException;

class MemoryExporter
{
    /**
     * Dumps the provided memory array to a CSV file in a hex-dump style format.
     *
     * Each row represents a block of 16 bytes. The first column is the starting
     * address (in hex), followed by the 16 bytes (also in hex). If the memory size
     * is not a multiple of 16, the final row will have fewer columns filled.
     *
     * @param array<int, int> $memory An array of bytes (0-255) indexed by their address.
     *
     * @throws \RuntimeException
     */
    public function export(array $memory, ?string $filename = null): void
    {
        $filename ??= sprintf('memory-dump-%s.csv', Carbon::now()->format('d-m-Y-H-i-s'));
        $fp = fopen(getcwd() . DIRECTORY_SEPARATOR . $filename, 'w');

        if ($fp === false) {
            throw new RuntimeException("Unable to open file for writing: {$filename}");
        }

        // Flatten the array if it's nested like [[ "0"=>255, "1"=>0, ...]].
        if (isset($memory[0]) && is_array($memory[0])) {
            $memory = $memory[0];
        }

        // Reindex the array with numeric keys.
        $memory = array_values($memory);

        // The header: StartAddr + 16 columns for hex dump.
        $header = array_merge(['StartAddr'], array_map(fn(int $i): string => sprintf('+%X', $i), range(0, 15)));
        fputcsv($fp, $header, escape: '');

        $memorySize = count($memory);

        for ($addr = 0; $addr < $memorySize; $addr += 16) {
            $rowValues = [];
            $rowValues[] = sprintf('0x%04X', $addr);

            for ($i = 0; $i < 16; $i++) {
                $index = $addr + $i;
                $hexVal = ($index < $memorySize) ? sprintf('%02X', $memory[$index]) : '';
                $rowValues[] = $hexVal;
            }

            fputcsv($fp, $rowValues, escape: '');
        }

        fclose($fp);
    }
}
