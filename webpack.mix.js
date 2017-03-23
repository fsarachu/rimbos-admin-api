const {mix} = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */



mix.js('resources/assets/js/app.js', 'public/js')
    .styles([
        'resources/assets/semantic/dist/semantic.css',
        'node_modules/semantic-ui-calendar/dist/calendar.css'
    ], 'public/css/app.css')
    .copy('resources/assets/semantic/dist/themes/default/assets/fonts', 'public/fonts')
    .copy('resources/assets/semantic/dist/themes/default/assets/images', 'public/images');
