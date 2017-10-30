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

mix.js('resources/assets/js/backend.js', 'public/assets/js')
    .js('resources/assets/js/backend/modules/user.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/category.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/page.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/slide.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/post.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/product.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/config.js', 'public/assets/js/backend/modules')
    .js('resources/assets/js/backend/modules/home.js', 'public/assets/js/backend/modules')
    .sass('resources/assets/sass/backend/app.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/login.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/page.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/post.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/product.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/config.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/slide.scss', 'public/assets/css/backend')
    .sass('resources/assets/sass/backend/modules/category.scss', 'public/assets/css/backend');

mix.js('resources/assets/vue/dropzone.js', 'public/assets/vue/');
mix.copyDirectory('resources/assets/img', 'public/img');
mix.copyDirectory('resources/assets/vendor', 'public/frontend');

mix.copy('resources/assets/bower/summernote/dist/summernote.min.js', 'public/assets/js/backend/summernote.min.js');
