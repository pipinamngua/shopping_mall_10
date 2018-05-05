let mix = require('laravel-mix');

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
mix.copyDirectory(['resources/assets/css',], 'public/css');
mix.copyDirectory(['resources/assets/js',], 'public/js');
mix.copyDirectory(['resources/assets/fonts',], 'public/fonts');
mix.copyDirectory(['resources/assets/font-awesome',], 'public/font-awesome');
mix.copyDirectory(['resources/assets/lineicons',], 'public/lineicons');
mix.copyDirectory(['resources/assets/images',], 'public/images');
