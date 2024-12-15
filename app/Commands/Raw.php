<?php

namespace App\Commands;

use App\Emulator\Canvas\LaravelCanvas;
use App\Emulator\Core;
use App\Emulator\Keyboard;
use LaravelZero\Framework\Commands\Command;

class Raw extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'raw {rom=Artisan}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Raw mounts the emulator';

    /**
     * Execute the console command.
     */
    public function handle(): never
    {
        $rom = file_get_contents($this->argument('rom'));
        $canvas = new LaravelCanvas();
        $core = new Core($rom, $canvas);
        $keyboard = new Keyboard($core);

        $core->start();

        if (($core->stopEmulator & 2) == 0) {
            throw new \RuntimeException('The GameBoy core is already running.');
        }

        if ($core->stopEmulator & 2 != 2) {
            throw new \RuntimeException('GameBoy core cannot run while it has not been initialized.');
        }

        $core->stopEmulator &= 1;
        $core->lastIteration = (int) (microtime(true) * 1000);

        while (true) {
            $core->run();
            $keyboard->check();
        }
    }
}
