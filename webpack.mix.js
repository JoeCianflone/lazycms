const { mix } = require('laravel-mix');

mix.copy('resources/assets/images', 'public/assets/images')
   .js('resources/assets/js/app.js', 'public/assets/js')
   .sass('resources/assets/sass/app.scss', 'public/assets/css')
   .version();
