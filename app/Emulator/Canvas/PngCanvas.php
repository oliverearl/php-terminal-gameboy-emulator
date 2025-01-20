<?php

declare(strict_types=1);

namespace App\Emulator\Canvas;

use RuntimeException;

class PngCanvas implements DrawContextInterface
{
    /**
     * Serial number for the PNG file.
     */
    private int $serial = 0;

    /**
     * PngCanvas constructor.
     *
     * @throws \RuntimeException
     */
    public function __construct()
    {
        if (! extension_loaded('gd')) {
            throw new RuntimeException('GD extension is required to use PNG canvas.');
        }
    }

    /** @inheritDoc */
    public function draw(array $canvasBuffer): void
    {
        $width = 160;
        $height = 144;

        $image = imagecreatetruecolor($width, $height);

        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $index = ($x + ($y * $width)) * 4;

                $color = imagecolorallocate(
                    $image,
                    $canvasBuffer[$index],
                    $canvasBuffer[$index + 1],
                    $canvasBuffer[$index + 2],
                );

                imagesetpixel($image, $x, $y, $color);
            }
        }

        if (! is_dir('screen')) {
            mkdir('screen');
        }

        imagepng($image, sprintf('screen/%08d.png', $this->serial++));
    }

    /** @inheritDoc */
    public function isColorEnabled(): bool
    {
        return true;
    }
}
