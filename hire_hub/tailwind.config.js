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
                softBlue: 'hsl(231, 69%, 60%)',
                ClearBlue: 'hsl(239,88%,67%)',
                softRed: 'hsl(0, 94%, 66%)',
                grayishBlue: 'hsl(229, 8%, 60%)',
                veryDarkBlue: 'hsl(229, 31%, 21%)',
              },
        },
    },

    plugins: [forms],
};
