<?php

declare(strict_types=1);

namespace App\Commands;

use App\Emulator\Canvas\DrawContextInterface;
use App\Emulator\Canvas\LaravelCanvas;
use App\Emulator\Canvas\LegacyCanvas;
use App\Emulator\Core;
use App\Emulator\Input\Keyboard;
use App\Exceptions\Rom\RomMissingOrBadException;
use Illuminate\Support\Facades\Config;
use LaravelZero\Framework\Commands\Command;

use function Laravel\Prompts\info;

class RunEmulator extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'run
    {rom : The path to the GB/GBC ROM to execute (required)}
    {--legacy : Use the legacy graphical renderer}';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Start the emulator.';

    /**
     * Begins execution of the emulator.
     */
    public function handle(): never
    {
        $romPath = $this->argument('rom');

        if (!  file_exists($romPath)) {
            throw new RomMissingOrBadException();
        }

        $core = new Core(
            file_get_contents($romPath),
            $this->loadCanvas(),
        );

        $keyboard = new Keyboard($core);

        $core->start();

        while (true) {
            $core->run();
            $keyboard->check();
        }
    }

    /**
     * Loads the appropriate canvas depending on options.
     */
    private function loadCanvas(): DrawContextInterface
    {
        if ($this->option('legacy') || Config::boolean('emulator.use_legacy_renderer')) {
            info('Using legacy renderer.');

            return new LegacyCanvas();
        }

        return new LaravelCanvas();
    }
}
