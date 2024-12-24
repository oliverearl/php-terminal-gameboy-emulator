<?php

declare(strict_types=1);

namespace App\Emulator\Input\Devices;

use App\Emulator\Debugger\Debugger;
use App\Emulator\Input\Interfaces\InputInterface;

class NullDevice implements InputInterface
{
    /**
     * The input device type.
     */
    public const string INPUT_DEVICE = 'null';

    /**
     * NullImplementation constructor.
     */
    public function __construct()
    {
        Debugger::print('Using null input.');
    }

    /** @inheritDoc */
    public function check(): void
    {
        // Do nothing.
    }
}
