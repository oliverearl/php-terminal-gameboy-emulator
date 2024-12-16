<?php

declare(strict_types=1);

namespace App\Emulator\Input;

enum JoypadInput: int
{
    case INVALID_INPUT = -1;
    case DPAD_RIGHT = 0;
    case DPAD_LEFT = 1;
    case DPAD_UP = 2;
    case DPAD_DOWN = 3;
    case BTN_A = 4;
    case BTN_B = 5;
    case BTN_SELECT = 6;
    case BTN_START = 7;
}
