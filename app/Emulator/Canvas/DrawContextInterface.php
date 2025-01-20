<?php

declare(strict_types=1);

namespace App\Emulator\Canvas;

/**
 * Interface to draw the Game Boy output.
 */
interface DrawContextInterface
{
    /**
     * Draw image on canvas.
     *
     * @param array<int, int|bool> $canvasBuffer If colored, each pixel => 4 items on array (RGBA).
     */
    public function draw(array $canvasBuffer): void;

    /**
     * Returns whether color support is enabled for this canvas.
     */
    public function isColorEnabled(): bool;
}
