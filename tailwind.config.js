const defaultTheme = require('tailwindcss/defaultTheme');

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
            colors:{
                'primary': '#14213d',
                'action': '#ad2e24',
                'green': '#0CAE74',
                'dark': '#3d405b',
                'vibrant': '#f2cc8f',
                'lightyellow': '#f5d283',
                'florYellow': '#ffc800',
            },
            backgroundColor: {
                'primary': '#14213d',
                'action': '#ad2e24',
                'green': '#0CAE74',
                'lightyellow': '#f5d283',
                'dark': '#3d405b',
                'vibrant': '#f2cc8f'
            },
            maxWidth:{
                '100': '100px',
                '200': '200px',
                '400': '400px',
                '20' : '20px'
            },
            width:{
                '100': '100px',
                '150': '150px',
                '200': '200px',
                '400': '400px',
            },
            boxShadow: {
                amit: '0 1px 10px #ad2e24',
            },
            order: {
               none: '0',
                '1': '1',
                '2': '2'
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
