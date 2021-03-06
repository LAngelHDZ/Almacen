<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Dashboard',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Panel de Control</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => 'bg-light',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'buscar',
        ],

         ['header' => 'GENERAL',
         'can'     => 'userG.dashboard.index',
        ],

        // [
        //     'text'    => 'GENERAL',
        //     'icon'    => 'fas fa-fw fa-user-tie',
        //     'can'     => 'root.dashboard.gen',
        //     'submenu' => [
                 [
                    'icon'    => 'fas fa-ms fa-file-alt',
                    'text' => 'requisicion',
                    'can'     => 'userg.dashboard.index',
                    'route'  => 'solicitud',
                ],
                [
                    'icon'    => 'fas fa-clipboard-list',
                    'text' => 'solicitudes',
                    'can'     => 'userg.dashboard.index',
                    'route'  => 'h_requisiciones_gral',
                ],
                [
                    'icon'    => 'fas fa-sm fa-vials',
                    'text' => 'materiales',
                    'can'     => 'userg.dashboard.index',
                    'route'  => 'materiales',
                ],
                [
                    'icon'    => 'fas fa-list-ul',
                    'text' => 'historial',
                    'can'     => 'userg.dashboard.index',
                    'route'  => 'historial_general',
                ],
            // ],
        // ],

        ['header' => 'ALMACEN',
        'can'     => 'almacen.dashboard.index',
       ],

        // [
        //     'text'    => 'Almacen',
        //     'icon'    => 'fas fa-fw fa-archive',
        //     'can'     => 'root.dashboard.almacen',
        //     'submenu' => [
                [
                    'text' => 'Requisiciones',
                    'icon'    => 'fas fa-sm fa-clipboard-list',
                    'can'     => 'almacen.dashboard.index',
                    'route'  => 'requisicionesAlmacen',
                ],
                [
                    'text' => 'Stock',
                    'icon'    => 'fas fa-sm fa-chart-line',
                    'can'     => 'almacen.dashboard.show',
                    'route'  => 'stock',
                ],
                [
                    'text' => 'Facturas',
                    'icon'    => 'fas fa-sm fa-file-invoice-dollar',
                    'can'     => 'almacen.dashboard.show',
                    'route'  => 'facturas',
                ],
                [
                    'icon'    => 'fas fa-sm fa-list-ul',
                    'text' => 'Historial',
                    'can'     => 'almacen.dashboard.index',
                    // 'url'  => 'admin/blog',
                ],
                [
                    'icon'    => 'fas fa-sign-out-alt',
                    'text' => 'Salida',
                    'can'     => 'almacen.dashboard.index',
                    'route'  => 'salida_producto',
                ],
            // ],
        // ],


            [
                'text'    => 'Recursos Materiales',
                'icon'    => 'fas fa-fw fa-boxes',
                'can'     => 'rm.dashboard.index',

                'submenu' => [
                    ['header' => 'REQUISICIONES'],

                    [
                        'icon'    => 'fas fa-clipboard-list',
                        'text' => 'Lista de requisiciones',
                        'route' => 'requisiciones-rm',
                    ],
                    [
                        'icon'    => 'fas fa-sm fa-list',
                        'text' => 'Historial',
                        'route' => 'historial-rm',
                    ],

                    ['header' => 'COTIZACIONES'],

                    [
                        'icon'    => ' fas fa-sm fa-dollar-sign',
                        'text' => 'Cotizaci??n',
                        'route' => 'catalogo',
                    ],

                    ['header' => 'ALTAS y ACTUALZACIONES'],
                    [
                        'icon'    => 'fas fa-sm fa-truck',
                        'text' => 'Proveedores',
                        'route' => 'proveedor',
                    ],

                    [
                        'icon'    => 'fas fa-sm fa-prescription-bottle',
                        'text' => 'Producto',
                        'route' => 'producto',
                    ],


                ],
            ],

        [
            'text'    => 'Administraci??n',
            'icon'    => 'fas fa-fw fa-globe',
            'can'     => 'admin.dashboard.index',
            'submenu' => [
                // [
                    ['header' => 'ADMINISTRADOR'],
                        [
                        'icon'    => 'fas fa-clipboard-list',
                        'text' => 'Lista de requisiciones',
                        'can'     => 'admin.dashboard.index',
                        'route' => 'requisicionesA',
                        ],
                        [
                            'text' => 'Stock',
                            'icon'    => 'fas fa-sm fa-chart-line',
                            'can'     => 'admin.dashboard.index',
                        'route' => 'stock',
                        ],

                        [
                        'icon'    => 'fas fa-sm fa-list',
                        'text' => 'Historial',
                        'can'     => 'admin.dashboard.index',
                        'route' => 'historialReq-Admin',
                        ],
                        [
                            'text' => 'Facturas',
                            'icon'    => 'fas fa-sm fa-file-invoice-dollar',
                            'can'     => 'admin.dashboard.index',
                            'route'  => 'facturas',
                        ],

                    
                // ],

                // [
                //     'text' => 'Director',
                //     'url'  => 'admin/blog',
                //     'submenu' => [
                //         [
                //             'text' => 'opcion 1',
                //             'url' => '#',
                //         ],
                //         [
                //             'text' => 'opcion 2',
                //             'url' => '#',
                //         ],

                //         [
                //             'text' => 'opcion 3',
                //             'url' => '#',
                //         ],

                //     ],
                // ],


            ],
        ],


            ['header' => 'SUPER ADMIN',
            'can'     => 'root.dashboard.index',
        ],

                [
                    'icon'    => 'fas fa-sm fa-users',
                    'text' => 'usuarios',
                    'can'     => 'root.dashboard.index',
                    'route'  => 'users',
                ],
                [
                    'icon'    => 'fas fa-key',
                    'text' => 'permisos',
                    'can'     => 'root.dashboard.index',
                    'route'  => 'permisos',
                ],
                [
                    'icon'    => 'fas fa-unlock-alt',
                    'text' => 'roles',
                    'can'     => 'root.dashboard.index',
                    'route'  => 'roles',
                ],
                [
                    'text' => 'opcion 4',
                    'can'     => 'root.dashboard.index',
                    // 'url'  => 'admin/blog',
                ],



        // [
        //     'text'        => 'pages',
        //     'url'         => 'admin/pages',
        //     'icon'        => 'far fa-fw fa-file',
        //     'label'       => 4,
        //     'label_color' => 'success',
        // ],

        [
            'text' => 'profile',
            'route'  => 'profile',
            'icon' => 'fas fa-fw fa-address-card',
            'can'     => 'profile.dashboard.index',
        ],


        // ['header' => 'labels'],
        // [
        //     'text'       => 'important',
        //     'icon_color' => 'red',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'warning',
        //     'icon_color' => 'yellow',
        //     'url'        => '#',
        // ],
        // [
        //     'text'       => 'information',
        //     'icon_color' => 'cyan',
        //     'url'        => '#',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
