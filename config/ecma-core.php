<?php

return [
    'route_name' => 'cma',

    'app_name' => 'EcmaPro',
    'app_name_small' => '<span class="text-white-75">E</span><span class="text-white">P</span>',
    'app_name_large' => '<span class="text-white-75">Ecma</span><span class="text-white">Pro</span>',

    'show_sidebar_toggle' => true,
    'show_sidebar_mini_toggle' => true,

    'show_right_sidebar_btn' => true,
    'right_sidebar_btn_icon' => 'fas fa-fw fa-question-square',
    'right_sidebar_title' => 'Help',
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
    /*
    |------------------------------------------------------------------------
    | Panel layout
    |------------------------------------------------------------------------
    |   'enable-cookies'        Remembers active color
    |
    | SIDEBAR & SIDE OVERLAY
    |
    |   'sidebar-r'             Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    |   'sidebar-mini'          Mini hoverable Sidebar (screen width > 991px)
    |   'sidebar-o'             Visible Sidebar by default (screen width > 991px)
    |   'sidebar-o-xs'          Visible Sidebar by default (screen width < 992px)
    |   'sidebar-dark'          Dark themed sidebar
    |
    |   'side-overlay-hover'    Hoverable Side Overlay (screen width > 991px)
    |   'side-overlay-o'        Visible Side Overlay by default
    |
    |   'enable-page-overlay'   Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens
    |
    |   'side-scroll'           Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)
    |
    | HEADER
    |
    |   ''                      Static Header if no class is added
    |   'page-header-fixed'     Fixed Header
    |
    | Footer
    |
    |   ''                      Static Footer if no class is added
    |   'page-footer-fixed'     Fixed Footer (please have in mind that the footer has a specific height when is fixed)
    |
    | HEADER STYLE
    |
    |   ''                      Classic Header style if no class is added
    |   'page-header-dark'      Dark themed Header
    |   'page-header-glass'     Light themed Header with transparency by default
    |   'page-header-glass page-header-dark'    Dark themed Header with transparency by default
    |
    | MAIN CONTENT LAYOUT
    |
    |   ''                      Full width Main Content if no class is added
    |   'main-content-boxed'    Full width Main Content with a specific maximum width (screen width > 1200px)
    |   'main-content-narrow'   Full width Main Content with a percentage width (screen width > 1200px)
    */
    'layout' => 'sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed page-footer-fixed page-header-light',

    'modules' => [],

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
