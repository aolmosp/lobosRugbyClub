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
        screens: {
            'lg': '1024px',
            'xl': '1280px',
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            padding: {
                '31': '124px',
            },
            gridColumn: {
                'span-17': 'span 17 / span 17',
            },
            gridTemplateColumns: {
                '17': 'repeat(17, minmax(6.5rem, 1fr))',
            },
            gridColumnEnd: {
                '17': '17',
              }
        },
    },

    plugins: [forms],
    
};