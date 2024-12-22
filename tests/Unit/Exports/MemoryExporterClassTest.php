<?php

declare(strict_types=1);

namespace Tests\Unit\Exports;

use App\Exports\MemoryExporter;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use PHPUnit\Framework\TestCase;

/**
 * Class MemoryExporterClassTest.
 *
 * Some tests that involve mocking native PHP functions don't work properly within Pest closure-based tests.
 */
final class MemoryExporterClassTest extends TestCase
{
    use PHPMock;

    /**
     * Exporter instance used for testing.
     */
    private readonly MemoryExporter $memoryExporter;

    /** @inheritDoc */
    protected function setUp(): void
    {
        parent::setUp();

        $this->memoryExporter = new MemoryExporter();
    }

    /** @inheritDoc */
    protected function tearDown(): void
    {
        parent::tearDown();

        $files = ['memory-dump-test-failure.csv', 'memory-dump-test-flatten.csv'];

        foreach ($files as $file) {
            $filePath = getcwd() . DIRECTORY_SEPARATOR . $file;

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    #[Test]
    public function export_throws_exception_when_fopen_fails(): void
    {
        $memory = [0 => 255, 1 => 0, 2 => 127];
        $filename = 'memory-dump-test-failure.csv';
        $expectedFilePath = getcwd() . DIRECTORY_SEPARATOR . $filename;

        // Mock 'fopen' in the 'App\Exports' namespace to return false.
        $fopenMock = $this->getFunctionMock('App\Exports', 'fopen');
        $fopenMock->expects($this->once())->with($expectedFilePath, 'w')->willReturn(false);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Unable to open file for writing: {$filename}");

        $this->memoryExporter->export($memory, $filename);
    }

    #[Test]
    public function export_flattens_nested_memory_arrays_and_writes_csv(): void
    {
        $filename = 'memory-dump-test-flatten.csv';
        $expectedFilePath = getcwd() . DIRECTORY_SEPARATOR . $filename;
        $nestedMemory = [
            [
                '0' => 0xFF,
                '1' => 0x00,
                '2' => 0x7F,
                '3' => 0x80,
                '4' => 0x12,
                '5' => 0x34,
                '6' => 0x56,
                '7' => 0x78,
                '8' => 0x9A,
                '9' => 0xBC,
                '10' => 0xDE,
                '11' => 0xF0,
                '12' => 0x11,
                '13' => 0x22,
                '14' => 0x33,
                '15' => 0xAA,
                '16' => 0xBB,
            ],
        ];

        // Mock 'fopen' to return a temporary in-memory stream.
        $fopenMock = $this->getFunctionMock('App\Exports', 'fopen');
        $tempStream = fopen('php://memory', 'w+');
        $fopenMock->expects($this->once())
            ->with($expectedFilePath, 'w')
            ->willReturn($tempStream);

        // Mock 'fclose' to close the temporary stream.
        $fcloseMock = $this->getFunctionMock('App\Exports', 'fclose');
        $fcloseMock->expects($this->once())
            ->with($tempStream)
            ->willReturn(true);

        $this->memoryExporter->export($nestedMemory, $filename);

        // Move pointer to the beginning of the stream to read its content.
        rewind($tempStream);
        $csvContent = stream_get_contents($tempStream);

        // Define the expected CSV content:
        $expectedCsv = <<<CSV
StartAddr,+0,+1,+2,+3,+4,+5,+6,+7,+8,+9,+A,+B,+C,+D,+E,+F
0x0000,FF,00,7F,80,12,34,56,78,9A,BC,DE,F0,11,22,33,AA
0x0010,BB,,,,,,,,,,,,,,,

CSV;

        $this::assertEquals($expectedCsv, $csvContent);
    }
}
