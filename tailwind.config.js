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
                "hanken-grotesk": ["Hanken Grotesk", "sans-serif"],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                "2xs": ".625rem", //10px
            },
            colors: {
                "black": "#060606"
            },
        },
    },

    plugins: [forms],
};
