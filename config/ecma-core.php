<?php

return [
    'route_name' => 'cma',
    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | Possible null, "xeco", "xinspire", "xmodern", "xsmooth", "xwork",
    | "xdream", "xpro", "xplay"
    |
    */
    'theme' => null,

    'modules' => [
        0 => [

        ],
        1 => [

        ]
    ],

    'settings' => [
        1 => [
            'class_name' => 'nav-main-item',
            'active_route' => 'maintenance',
            'single_route' => 1,
            'route' => 'maintenance',
            'name' => 'Onderhoud'
        ],
        0 => [
            'class_name' => 'nav-main-item',
            'active_route' => 'admins',
            'single_route' => 1,
            'route' => 'admins',
            'name' => 'Admins'
        ]
    ],

    'admin_types' => [
        0 => 'Geen admin',
        1 => 'Moderator',
        2 => 'Admin',
        3 => 'Super Admin'
    ],
];
