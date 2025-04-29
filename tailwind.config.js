const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    safelist: [
        {
          pattern: /./
        },
    ],
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('daisyui')],

    // config daisyui
    daisyui: {
        themes: ["light"], // Solo incluye el tema claro
        darkTheme: false, // Desactiva explícitamente el tema oscuro automático
    },
};
