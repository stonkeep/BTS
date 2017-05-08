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
    // .js('resources/assets/js/bootstrap-table/bootstrap-table.js', 'public/js')
    // .js('resources/assets/js/bootstrap-table/bootstrap-table-locale-all.js', 'public/js')
    // .js('resources/assets/js/bootstrap-table/extensions/accent-neutralise/bootstrap-table-accent-neutralise.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
