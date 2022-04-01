const mix = require('laravel-mix');

mix
    .sass('app/sass/app.sass', 'css/app.css')
    .js('app/js/app.js', 'web/js/app.js')
    .setPublicPath('web')
    .vue();