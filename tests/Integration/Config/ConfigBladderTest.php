<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Config;
use App\Emulator\Config\ConfigBladder;

beforeEach(function (): void {
    Config::set('emulator', []);
});

describe('ConfigBladder', function (): void {
    it('retrieves and caches a config value from Laravel', function (): void {
        Config::set('emulator.test_key', 'value');

        $configBladder = new ConfigBladder();
        $result = $configBladder->get('test_key');

        expect($result)
            ->toBe('value')
            ->and($configBladder->get('test_key'))->toBe('value');
    });

    it('uses a default value if the config key does not exist', function (): void {
        $configBladder = new ConfigBladder();
        $result = $configBladder->get('non_existent_key', 'default_value');

        expect($result)->toBe('default_value');
    });

    it('deferred updates sync with Laravel but only during resync', function (): void {
        $configBladder = new ConfigBladder();
        $configBladder->set('test_key', 'updated_value');

        // Verify Laravel's config hasn't been updated yet.
        expect(Config::get('emulator.test_key'))->toBeNull();

        // Tick forward, but not enough to trigger a resync.
        $configBladder->tick();

        expect(Config::get('emulator.test_key'))->toBeNull();
    });

    it('updates local cache when a value is changed in Laravel', function (): void {
        Config::set('emulator.dynamic_key', 'original_value');

        $configBladder = new ConfigBladder();
        $configBladder->get('dynamic_key');
        Config::set('emulator.dynamic_key', 'new_value');

        // Force a resync.
        for ($i = 0; $i < 1800; $i++) { // Assuming 30-second resync interval at 60 FPS.
            $configBladder->tick();
        }

        $result = $configBladder->get('dynamic_key');
        expect($result)->toBe('new_value');
    });

    it('increments the frame counter and performs resyncs at threshold', function (): void {
        $configBladder = new ConfigBladder();

        for ($i = 0; $i < 1800; $i++) { // Assuming 30-second resync interval at 60 FPS.
            $configBladder->tick();
        }

        Config::set('emulator.test_key', 'new_value');

        // Ensure resync occurred
        $result = $configBladder->get('test_key');
        expect($result)->toBe('new_value');
    });

    it('flattens nested config arrays correctly', function (): void {
        Config::set('emulator', [
            'nested' => [
                'key1' => 'value1',
                'key2' => 'value2',
            ],
        ]);

        $configBladder = new ConfigBladder();

        expect($configBladder->get('nested.key1'))
            ->toBe('value1')
            ->and($configBladder->get('nested.key2'))->toBe('value2');
    });

    it('handles updating nested config values and resyncing', function (): void {
        $configBladder = new ConfigBladder();
        $configBladder->set('nested.key', 'updated_value');

        // Verify Laravel's config hasn't been updated yet.
        expect(Config::get('emulator.nested.key'))->toBeNull();

        // Trigger a resync.
        for ($i = 0; $i < 1800; $i++) { // Assuming 30-second resync interval.
            $configBladder->tick();
        }

        expect(Config::get('emulator.nested.key'))->toBe('updated_value');
    });

    it('retrieves values in specific types', function (): void {
        Config::set('emulator.boolean_key', true);
        Config::set('emulator.integer_key', 42);
        Config::set('emulator.string_key', 'string_value');

        $configBladder = new ConfigBladder();

        expect($configBladder->getBoolean('boolean_key'))
            ->toBeTrue()
            ->and($configBladder->getInteger('integer_key'))->toBe(42)
            ->and($configBladder->getString('string_key'))->toBe('string_value');
    });
});
