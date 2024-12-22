<?php

namespace App\Emulator\Config;

use Illuminate\Support\Facades\Config;

/**
 * Class ConfigBladder
 *
 * Provides a high-performance, flattened configuration cache for rapid access.
 * Values are initially loaded from Laravel's config and periodically resynced
 * to ensure consistency while minimizing performance overhead. Updates to the
 * config are deferred and pushed to Laravel during the resync process.
 */
class ConfigBladder
{
    /**
     * Flat representation of the config array for rapid lookups.
     *
     * @var array<string, mixed>
     */
    private array $storage = [];

    /**
     * Nested representation of the config array for rebuilding structure.
     *
     * @var array<string, mixed>
     */
    private array $nestedStorage = [];

    /**
     * Deferred updates for Laravel's config storage, stored as key-value pairs.
     *
     * @var array<string, mixed>
     */
    private array $pendingUpdates = [];

    /**
     * Frame counter used to track when to resync.
     *
     * @var int
     */
    private int $frameCounter = 0;

    /**
     * Number of frames after which the config is resynced.
     */
    private readonly int $resyncThresholdFrames;

    /**
     * Frames per second of the emulator, used to calculate resync intervals.
     */
    private readonly int $framesPerSecond;

    /**
     * ConfigBladder constructor.
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Initializes the flattened config cache and calculates resync intervals
     * based on Laravel's config values.
     * */
    public function init(): void
    {
        $this->nestedStorage = Config::array('emulator', []);
        $this->storage = $this->flatten($this->nestedStorage);

        // TODO: Implement a means to retrieve these values from elsewhere in the program.
        $this->framesPerSecond = 60;
        $resyncIntervalSeconds = 30;

        $this->resyncThresholdFrames = $resyncIntervalSeconds * $this->framesPerSecond;
    }

    /**
     * Retrieve a flattened config value by key.
     *
     * @param string $key     The dot-notation key to retrieve.
     * @param mixed  $default The default value if the key does not exist.
     *
     * @return mixed The retrieved config value.
     */
    public function get(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $this->storage) && $this->storage[$key] !== null) {
            return $this->storage[$key];
        }

        // Falls back to the Laravel configuration if it's not stored locally.
        $value = Config::get("emulator.{$key}", $default);
        $this->set($key, $value);

        return $value;
    }

    /**
     * Retrieve a config value as a Boolean.
     *
     * @param string $key     The dot-notation key to retrieve.
     * @param bool   $default The default value if the key does not exist.
     *
     * @return bool The retrieved Boolean value.
     */
    public function getBoolean(string $key, bool $default = false): bool
    {
        return (bool) $this->get($key, $default);
    }

    /**
     * Retrieve a config value as an integer.
     *
     * @param string $key     The dot-notation key to retrieve.
     * @param int    $default The default value if the key does not exist.
     *
     * @return int The retrieved integer value.
     */
    public function getInteger(string $key, int $default = 0): int
    {
        return (int) $this->get($key, $default);
    }

    /**
     * Retrieve a config value as a string.
     *
     * @param string $key     The dot-notation key to retrieve.
     * @param string $default The default value if the key does not exist.
     *
     * @return string The retrieved string value.
     */
    public function getString(string $key, string $default = ''): string
    {
        return (string) $this->get($key, $default);
    }

    /**
     * Set a value in flattened, nested storage and mark it for deferred update.
     *
     * @param string $key   The dot-notation key to set.
     * @param mixed  $value The value to set.
     */
    public function set(string $key, mixed $value): void
    {
        $this->storage[$key] = $value;
        $this->setNestedValue($this->nestedStorage, explode('.', $key), $value);

        // Mark the key for deferred syncing.
        $this->pendingUpdates[$key] = $value;
    }

    /**
     * Increment the frame counter and resync periodically.
     */
    public function tick(): void
    {
        $this->frameCounter++;

        if ($this->frameCounter >= $this->resyncThresholdFrames) {
            $this->resync();
            $this->frameCounter = 0;
        }
    }

    /**
     * Resync storage with Laravel's config and flush pending updates.
     */
    private function resync(): void
    {
        // Push all pending updates to Laravel's config.
        foreach ($this->pendingUpdates as $key => $value) {
            Config::set("emulator.{$key}", $value);
        }

        $this->pendingUpdates = [];

        // Reload nested storage from Laravel's config.
        $this->nestedStorage = Config::array('emulator', []);

        // Re-flatten nested storage for fast lookups.
        $this->storage = $this->flatten($this->nestedStorage);
    }

    /**
     * Flatten a nested array using dot notation.
     *
     * @param array<string, mixed> $array  The nested array to flatten.
     * @param string               $prefix The key prefix used during recursion.
     *
     * @return array<string, mixed> The flattened array.
     */
    private function flatten(array $array, string $prefix = ''): array
    {
        $flattened = [];

        foreach ($array as $key => $value) {
            $fullKey = $prefix === '' ? $key : "{$prefix}.{$key}";

            if (is_array($value)) {
                $flattened += $this->flatten($value, $fullKey);
            } else {
                $flattened[$fullKey] = $value;
            }
        }

        return $flattened;
    }

    /**
     * Set a value in a nested array structure using dot notation.
     *
     * @param array<string, mixed> $array The array to update.
     * @param array<int, string>   $keys  The exploded dot-notation keys.
     * @param mixed                $value The value to set.
     */
    private function setNestedValue(array &$array, array $keys, mixed $value): void
    {
        $current = &$array;

        foreach ($keys as $key) {
            if (!isset($current[$key]) || !is_array($current[$key])) {
                $current[$key] = [];
            }

            $current = &$current[$key];
        }

        $current = $value;
    }
}
