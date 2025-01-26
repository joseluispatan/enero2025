import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',


       // otras configuraciones...

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    '50': '#eaf5ff',
                    '100': '#d9ecff',
                    '200': '#badbff',
                    '300': '#91c1ff',
                    '400': '#659bff',
                    '500': '#4273ff',
                    '600': '#2149ff',
                    '700': '#183bec',
                    '800': '#1533be',
                    '900': '#1b3494',
                    '950': '#101d56',
                },
            },
        },
    },

    plugins: [forms, typography],
    
};
