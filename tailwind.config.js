import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                nirmala: ['"Nirmala UI"', 'sans-serif'],
                sspro: ['Source Sans Pro', 'sans-serif'],
                ssprobold: ['Source Sans Pro Bold', 'sans-serif'],
            },
            gridTemplateColumns:
            {
              '12/22/22/22/22': '12% 22% 22% 22% 22%',
              '20/40/40': '20% 40% 40%',
            }
        },
    },
    plugins: [],
};
