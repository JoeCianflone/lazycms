const { mix } = require('laravel-mix');

mix.copy('resources/themes/2017/assets/images', 'public/assets/images')
   .js('resources/themes/2017/assets/js/app.js', 'public/assets/js')
   .sass('resources/themes/2017/assets/sass/app.scss', 'public/assets/css')
   .version();
