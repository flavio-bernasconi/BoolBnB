const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/getCordinate.js', 'public/js')
    .js('resources/js/showMap.js', 'public/js')
    .js('resources/js/autocomplete.js', 'public/js')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/allFlats.scss', 'public/css')
    .sass('resources/sass/singleFlat.scss', 'public/css')
    .sass('resources/sass/menu.scss', 'public/css')
    .sass('resources/sass/12bool.scss', 'public/css')
    .sass('resources/sass/homepage.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');
