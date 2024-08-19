import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#f5c387',
                secondary: '#ffecb3',
                base: {
                    100: '#2d2522',
                    200: '#282120',
                    300: '#231d1d',
                    400: '#1e191a',
                    500: '#191517',
                    600: '#141113',
                    700: '#0f0d10',
                    800: '#0a090d',
                    900: '#05050a',
                },
              },
        },
    },

    plugins: [forms],
};
