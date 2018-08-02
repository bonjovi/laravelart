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

var concat = require('concat-files');

// concat([
//    'resources/assets/sass/blocks'
// ], 'resources/assets/sass/blocks.scss', function(err) {
//     if (err) throw err
//     console.log('done');
// });




mix
   .setPublicPath('public/build')
   .setResourceRoot('build')
   .js('resources/assets/js/app.js', 'public/js')
   .then(function() {
       concat([
           'resources/assets/sass/blocks'
       ], 'resources/assets/sass/blocks.scss', function(err) {
           if (err) throw err
           console.log('done');
       });
   })
   .sass('resources/assets/sass/main.scss', 'css');
