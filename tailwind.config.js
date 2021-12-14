const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                Teal: colors.teal,
                teal : colors.teal,
                trueGray: colors.trueGray,
                orange: colors.orange,
                Cyan : colors.cyan,
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
