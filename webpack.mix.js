const { mix } = require('laravel-mix');

var bowerDir = './bower_components/';

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
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'font-awesome/css/font-awesome.css',
    'sb-admin-2/dist/css/sb-admin-2.min.css',
], 'public/css/packages.css', bowerDir);

mix.scripts([
    'sb-admin-2/dist/js/sb-admin-2.min.js',
], 'public/js/all.js', bowerDir);

