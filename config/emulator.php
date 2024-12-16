<?php

return [
    /*
     * Enable experimental color support.
     */
    'enable_color' => env('ENABLE_COLOR', true),

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

    /*
     * Whether to use the legacy 2016 graphics renderer instead.
     */
    'use_legacy_renderer' => env('USE_LEGACY_RENDERER', false),
];
