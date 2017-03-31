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


/*
 |--------------------------------------------------------------------------
 | Admin Assets
 |--------------------------------------------------------------------------
*/

mix.js('resources/assets/admin/js/app.js', 'public/js/admin.js')
    .styles([
        'resources/assets/admin/semantic/dist/semantic.css',
        'node_modules/semantic-ui-calendar/dist/calendar.css'
    ], 'public/css/admin.css')
    .copy('resources/assets/admin/semantic/dist/themes/default/assets/fonts', 'public/fonts')
    .copy('resources/assets/admin/semantic/dist/themes/default/assets/images', 'public/images');


/*
 |--------------------------------------------------------------------------
 | Front Assets
 |--------------------------------------------------------------------------
*/

mix.js('resources/assets/front/survey/js/survey.js', 'public/js/survey.js')
    .styles('resources/assets/front/survey/css/survey.css', 'public/css/survey.css');


/*
 |--------------------------------------------------------------------------
 | Common Assets
 |--------------------------------------------------------------------------
*/

mix.styles(['resources/assets/common/css/40x.css'], 'public/css/40x.css');