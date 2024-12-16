<?php

declare(strict_types=1);

namespace App\Emulator\Canvas;

use App\Emulator\Settings;
use Illuminate\Support\Facades\Config;
use SplFixedArray;

class LaravelCanvas implements DrawContextInterface
{
    /**
     * The width of the Game Boy screen in pixels.
     * The original Game Boy has a screen width of 160 pixels.
     */
    private const int SCREEN_WIDTH = 160;

    /**
     * The height of the Game Boy screen in pixels.
     * The original Game Boy has a screen height of 144 pixels.
     */
    private const int SCREEN_HEIGHT = 144;

    /**
     * When determining if a pixel is "on" in color mode,
     * we sum its R, G, and B values and compare against this threshold.
     * If sum > 350, we consider the pixel bright enough to be "on."
     */
    private const int COLOR_THRESHOLD = 350;

    /**
     * The total number of Braille characters representing the entire screen.
     * Calculation: (SCREEN_WIDTH/2) * (SCREEN_HEIGHT/4) = (160/2)*(144/4) = 80*36 = 2880 chars.
     * Each Braille character represents a 2x4 block of pixels.
     */
    private const int TOTAL_BRAILLE_CHARS = 2880;

    /**
     * Base Braille character offset: U+2800 is the "blank" Braille cell.
     * We start from this base and logically OR with offsets to create patterns.
     */
    private const string BRAILLE_CHAR_OFFSET = "\u{2800}";

    /**
     * The Braille pixel map. Each 2x4 block maps pixels to Unicode Braille patterns.
     * For each pixel in the 2(width)x4(height) cell:
     * - The top-left pixel is 0x2801
     * - The top-right pixel is 0x2808
     * - And so forth, forming the Braille character by OR-ing these together.
     *
     * We store these as Unicode characters directly.
     *
     * @var array<int, string>
     */
    private const array PIXEL_MAP = [
        ["\u{2801}", "\u{2808}"],
        ["\u{2802}", "\u{2810}"],
        ["\u{2804}", "\u{2820}"],
        ["\u{2840}", "\u{2880}"],
    ];

    /**
     * Indicates whether the canvas is in color mode.
     * If true, pixels are represented by RGBA values and a color background is used.
     * If false, pixels are Boolean and represented as black/white Braille patterns.
     */
    private readonly bool $colorEnabled;

    /**
     * The timestamp of the current second used to calculate FPS.
     */
    protected int $currentSecond = 0;

    /**
     * The number of frames rendered in the current second.
     */
    private int $framesInSecond = 0;

    /**
     * The calculated frames-per-second value.
     */
    private int $fps = 0;

    /**
     * The canvas buffer from the last frame.
     * Used to determine if the frame has changed before rendering.
     *
     * @var null|array<int, int|bool>
     */
    private ?array $lastFrameCanvasBuffer = null;

    /**
     * LaravelCanvas constructor.
     */
    public function __construct()
    {
        $this->colorEnabled = Config::boolean('emulator.enable_color');
    }

    /**
     * Draws the current frame buffer to the terminal using Braille characters.
     * If color is enabled, calculates the average color of each Braille block
     * and sets the background color accordingly.
     *
     * @inheritDoc
     */
    public function draw(array $canvasBuffer): void
    {
        $this->calculateFps();

        // Only redraw if the frame changed.
        if ($canvasBuffer === $this->lastFrameCanvasBuffer) {
            return;
        }

        $this->lastFrameCanvasBuffer = $canvasBuffer;
        $chars = new SplFixedArray(self::TOTAL_BRAILLE_CHARS);

        for ($i = 0; $i < self::TOTAL_BRAILLE_CHARS; $i++) {
            $chars[$i] = self::BRAILLE_CHAR_OFFSET;
        }

        $frame = $this->buildFrameString($canvasBuffer, $chars);

        // Clear screen and print FPS + frame.
        // \e[H moves cursor to top-left, \e[2J clears the screen.
        $content = "\e[H\e[2J";
        $frameSkip = Settings::$frameskipAmout;
        $content .= sprintf('FPS: %3d - Frame Skip: %3d' . PHP_EOL, $this->fps, $frameSkip) . $frame;

        echo $content;
    }

    /** @inheritDoc */
    public function isColorEnabled(): bool
    {
        return $this->colorEnabled;
    }

    /**
     * Increments the frame count and calculates the FPS once per second.
     */
    private function calculateFps(): void
    {
        $now = time();

        if ($this->currentSecond !== $now) {
            $this->fps = $this->framesInSecond;
            $this->currentSecond = $now;
            $this->framesInSecond = 1;
        } else {
            $this->framesInSecond++;
        }
    }

    /**
     * Builds the full frame string by iterating over each pixel,
     * updating Braille characters, and applying color if enabled.
     *
     * @param array<int, int|bool> $canvasBuffer The current frame's pixel data.
     * @param SplFixedArray<int, int> $chars The Braille character array representing the frame.
     */
    private function buildFrameString(array $canvasBuffer, SplFixedArray $chars): string
    {
        $frame = '';

        for ($y = 0; $y < self::SCREEN_HEIGHT; $y++) {
            for ($x = 0; $x < self::SCREEN_WIDTH; $x++) {
                $pixelIndex = $x + (self::SCREEN_WIDTH * $y);
                $this->handlePixel($canvasBuffer, $chars, $x, $y, $pixelIndex);

                // Once we have completed a 2x4 Braille block, append it to $frame.
                if ($x % 2 === 1 && $y % 4 === 3) {
                    $charPosition = intdiv($x, 2) + (intdiv($y, 4) * 80);
                    $frame .= $this->renderBrailleChar($canvasBuffer, $charPosition, $x, $y, $chars);

                    if ($x % 159 === 0) {
                        $frame .= PHP_EOL;
                    }
                }
            }
        }

        return $frame;
    }

    /**
     * Handles a single pixel, determining if it's "on" and updating the corresponding Braille char.
     *
     * @param array<int, int|bool> $canvasBuffer The current frame's pixel data.
     * @param SplFixedArray<int, int> $chars The Braille character array for this frame.
     * @param int $x The x-coordinate of the pixel on the screen.
     * @param int $y The y-coordinate of the pixel on the screen.
     * @param int $pixelIndex The linear index of the pixel in the buffer.
     */
    private function handlePixel(array $canvasBuffer, SplFixedArray $chars, int $x, int $y, int $pixelIndex): void
    {
        $pixelOn = $this->isPixelOn($canvasBuffer, $pixelIndex);

        if ($pixelOn) {
            $charPosition = intdiv($x, 2) + (intdiv($y, 4) * 80);
            $chars[$charPosition] |= self::PIXEL_MAP[$y % 4][$x % 2];
        }
    }

    /**
     * Determines if a pixel is "on." For color mode, checks if the pixel's brightness
     * exceeds the color threshold. For B/W mode, uses the Boolean pixel value directly.
     *
     * @param array<int, int|bool> $canvasBuffer The pixel data.
     * @param int $pixelIndex The index of the pixel in the buffer.
     */
    private function isPixelOn(array $canvasBuffer, int $pixelIndex): bool
    {
        if ($this->colorEnabled) {
            $r = $canvasBuffer[$pixelIndex * 4] ?? 0;
            $g = $canvasBuffer[$pixelIndex * 4 + 1] ?? 0;
            $b = $canvasBuffer[$pixelIndex * 4 + 2] ?? 0;

            return ($r + $g + $b > self::COLOR_THRESHOLD);
        }

        return ! empty($canvasBuffer[$pixelIndex]);
    }

    /**
     * Renders a single Braille character block. If color is enabled,
     * it averages the color of the 8 pixels forming that block and applies
     * an ANSI background color before printing the Braille char.
     *
     * @param array<int, int|bool> $canvasBuffer The pixel data.
     * @param int $charPosition The index of the Braille character in the $chars array.
     * @param int $x The x-coordinate of the top-right pixel in this Braille block.
     * @param int $y The y-coordinate of the bottom pixel in this Braille block.
     * @param SplFixedArray<int, string> $chars The Braille character array.
     */
    private function renderBrailleChar(
        array $canvasBuffer,
        int $charPosition,
        int $x,
        int $y,
        SplFixedArray $chars,
    ): string {
        $char = $chars[$charPosition];

        if (! $this->colorEnabled) {
            // Just return the Braille char as is.
            return $char;
        }

        // Color enabled: average the 8 pixels of this Braille character.
        [$rAvg, $gAvg, $bAvg] = $this->averageBlockColor($canvasBuffer, $x, $y);

        return sprintf('[48;2;%d;%d;%dm%s[0m', $rAvg, $gAvg, $bAvg, $char);
    }

    /**
     * Averages the RGB values of the 8 pixels comprising a single Braille character block.
     * Each Braille character covers a 2x4 region of pixels. We loop through these pixels
     * and sum their RGB values, then divide by 8 for the average.
     *
     * @param array<int, int> $canvasBuffer The pixel data.
     * @param int $x The x-coordinate of the rightmost pixel in the Braille block.
     * @param int $y The y-coordinate of the bottom pixel in the Braille block.
     *
     * @return array<int, int> Contains [rAvg, gAvg, bAvg] - the average RGB values.
     */
    private function averageBlockColor(array $canvasBuffer, int $x, int $y): array
    {
        $rSum = 0;
        $gSum = 0;
        $bSum = 0;

        // Each Braille char covers a block of 2 pixels wide (x-1 to x) and 4 pixels tall (y-3 to y).
        // $pixelX and $pixelY represent the pixel coordinates within this block.
        for ($pixelY = $y - 3; $pixelY <= $y; $pixelY++) {
            for ($pixelX = $x - 1; $pixelX <= $x; $pixelX++) {
                $pIndex = $pixelX + (self::SCREEN_WIDTH * $pixelY);
                $r = $canvasBuffer[$pIndex * 4] ?? 0;
                $g = $canvasBuffer[$pIndex * 4 + 1] ?? 0;
                $b = $canvasBuffer[$pIndex * 4 + 2] ?? 0;

                $rSum += $r;
                $gSum += $g;
                $bSum += $b;
            }
        }

        $rAvg = (int) ($rSum / 8);
        $gAvg = (int) ($gSum / 8);
        $bAvg = (int) ($bSum / 8);

        return [$rAvg, $gAvg, $bAvg];
    }
}
