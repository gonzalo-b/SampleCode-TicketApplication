const { mix } = require('laravel-mix');

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
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false
    });

mix.styles([
    'bower_components/font-awesome/css/font-awesome.css',
    'bower_components/sb-admin-2/dist/css/sb-admin-2.css',
], 'public/css/packages.css');

mix.scripts([
    'bower_components/sb-admin-2/dist/js/sb-admin-2.js',
], 'public/js/all.js');

mix.combine([
    'public/css/packages.css',
    'public/css/app.css',
    'resources/assets/css/styles.css',
], 'public/css/mix.css');

mix.scripts([
    'public/js/all.js',
    'public/js/app.js',
], 'public/js/mix.js');

