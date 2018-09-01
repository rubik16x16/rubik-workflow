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

const CleanWebpackPlugin = require('clean-webpack-plugin');

mix.webpackConfig({
  plugins: [
    new CleanWebpackPlugin(['public/dist'])
  ]
});

mix.js('resources/assets/js/app.js', 'public/dist/js')
   .sass('resources/assets/sass/app.scss', 'public/dist/css');

mix.js('resources/assets/js/components/usuarios/app.js', 'public/dist/js/usuarios-app.js');
mix.js('resources/assets/js/components/roles/app.js', 'public/dist/js/roles-app.js');
mix.js('resources/assets/js/components/herramientas/app.js', 'public/dist/js/herramientas-app.js');

mix.js('resources/assets/js/components/proyectos/app.js', 'public/dist/js/proyectos/proyectos-app.js');
mix.js('resources/assets/js/components/proyectos/herramientas/app.js', 'public/dist/js/proyectos/herramientas-app.js');
mix.js('resources/assets/js/components/proyectos/operadores/app.js', 'public/dist/js/proyectos/operadores-app.js');
mix.js('resources/assets/js/components/proyectos/tipoHerramientas/app.js', 'public/dist/js/proyectos/tipo-herramientas-app.js');
