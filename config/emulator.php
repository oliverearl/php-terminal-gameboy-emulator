<?php

return [
    /*
     * Enable experimental color support.
     */
    'enable_color' => env('ENABLE_COLOR', false),

    /*
     * If using a color display, attempt to add color to GB games?
     */
    'enable_gb_colorize' => env('ENABLE_GB_COLORIZE', false),

    /*
     * Keyboard control mappings.
     */
    'controls' => [
        'right' => env('CONTROLS_RIGHT', 'd'),
        'left' => env('CONTROLS_LEFT', 'a'),
        'up' => env('CONTROLS_UP', 'w'),
        'down' => env('CONTROLS_DOWN', 's'),
        'a' => env('CONTROLS_A', ','),
        'b' => env('CONTROLS_B', '.'),
        'select' => env('CONTROLS_SELECT', 'n'),
        'start' => env('CONTROLS_START', 'm'),
    ],

    'advanced' => [
        'performance' => [
            /*
             * Sampling of audio every x many machine cycles.
             */
            'audio_granularity' => env('AUDIO_GRANULARITY', 20),

            /*
             * Automatically skip frames for performance improvements.
             */
            'auto_frame_skip' => env('AUTO_FRAME_SKIP', true),

            /*
             * Number of frames to skip. Auto frame-skip allows the script to change this.
             */
            'frame_skip_amount' => env('FRAME_SKIP_AMOUNT', 0),

            /*
             * Base factor of how many frames to skip.
             */
            'frame_skip_base_factor' => env('FRAME_SKIP_BASE_FACTOR', 10),

            /*
             * Maximum number of skipped frames per second.
             */
            'frame_skip_maximum' => env('FRAME_SKIP_MAXIMUM', 29),

            /*
             * Interval for the emulator loop.
             */
            'loop_interval' => env('LOOP_INTERVAL', 17),

            /*
             * Target number of machine cycles per loop (4,194,300 / 1000 * 17)
             */
            'machine_cycles_per_loop' => env('MACHINE_CYCLES_PER_REQUEST', 17_826),
        ],

        'emulation' => [
            /*
             * Override MBC RAM disabling and always allow reading and writing to the banks.
             */
            'override_mbc' => env('OVERRIDE_MBC', true),

            /*
             * Override to allow for MBC1 instead of ROM only.
             * (Compatibility for broken 3rd-party cartridges.)
             */
            'override_mbc_1' => env('OVERRIDE_MBC_1', true),

            /*
             * Give priority to Game Boy mode.
             */
            'prioritize_gb_mode' => env('PRIORITIZE_GB_MODE', true),
        ],
    ],

    /*
     * Whether to use the legacy 2016 graphics renderer instead.
     */
    'use_legacy_renderer' => env('USE_LEGACY_RENDERER', false),
];
