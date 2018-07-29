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

// const CleanWebpackPlugin = require('clean-webpack-plugin');

// mix.webpackConfig({
//   plugins: [
//     new CleanWebpackPlugin(['public/dist'])
//   ]
// });

mix.js('resources/assets/js/app.js', 'public/dist/js')
   .sass('resources/assets/sass/app.scss', 'public/dist/css');

mix.js('resources/assets/js/components/usuarios/app.js', 'public/dist/js/usuarios');
mix.js('resources/assets/js/components/roles/app.js', 'public/dist/js/roles');
mix.js('resources/assets/js/components/tipoHerramientas/app.js', 'public/dist/js/tipoHerramientas');
