<?php

declare(strict_types=1);

namespace App\Emulator\Input;

enum MagicKeypress: string
{
    case TOGGLE_MENU = "\e";
    case DUMP_STATE = "\e[19~";
}
