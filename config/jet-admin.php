<?php

// Config para IvanAquino/JetAdmin
return [
    /*
     |--------------------------------------------------------------------------
     | Navegación de aterrizaje
     |--------------------------------------------------------------------------
     |
     | nombre: Podría ser una cadena o una clave de traducción que se pasará a través de la función __()
     | ruta: Podría ser un url o un nombre de ruta
     |
     */
    'landing_navigation' => [
        [
            'name' => 'Home',
            'route' => '/',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Navegación de tablero
     |--------------------------------------------------------------------------
     |
     | Los elementos de esta matriz se utilizarán para generar la barra lateral del tablero
     | - nombre: La etiqueta que se mostrará en la barra lateral
     | - ruta: Podría ser un nombre de ruta o una URL
     | - active_route: El nombre de la ruta o URL que se utilizará para determinar si el elemento está activo
     | - icono: El icono que se mostrará en la barra lateral, el nombre de Heroicons.
     |
     */
    'dashboard_navigation' => [
        [
            'name' => 'Dashboard',
            'route' => 'dashboard',
            'active_route' => 'dashboard*',
            'icon' => 'home',
        ],
        //[

            //'name' => 'Profile',
            //'route' => 'profile.show',
            //'active_route' => 'profile.show',
            //'icon' => 'user', // Ícono para el perfil

        //],

        [
            'name' => 'Administración',
            'route' => '#',
            'icon' => 'cog',
            'sub_menu' => [ // Cambiado de subitems a sub_menu
                [
                    'name' => 'Roles',
                    'route' => 'admin.roles.index',
                    'active_route' => 'admin.roles.*',
                    'icon' => 'shield-check', // Ícono para roles
                ],
        
                [
                    'name' => 'Permisos',
                    'route' => 'admin.permissions.index',
                    'active_route' => 'admin.permissions.*',
                    'icon' => 'lock-open', // Ícono para permisos
                ],
        
                [
                    'name' => 'Usuarios',
                    'route' => 'admin.users.index',
                    'active_route' => 'admin.users.*',
                    'icon' => 'users', // Ícono para usuarios
                ],
            ],
        ],
        [
            'name' => 'Personas',
            'route' => 'admin.personas.index',
            'active_route' => 'admin.personas.*',
            'icon' => 'user-group',
        ],
        [
            'name' => 'Empresas',
            'route' => 'admin.empresas.index',
            'active_route' => 'admin.empresas.*',
            'icon' => 'briefcase',
        ],
        [
            'name' => 'Predios',
            'route' => 'admin.predios.index',
            'active_route' => 'admin.predios.*',
            'icon' => 'home',
        ],
        [
            'name' => 'Edificaciones',
            'route' => 'admin.edificacions.index',
            'active_route' => 'admin.edificacions.*',
            'icon' => 'home',
        ],
        [
            'name' => 'Vías',
            'route' => 'admin.vias.index',
            'active_route' => 'admin.vias.*',
            'icon' => 'home',
        ],


    ],

];
