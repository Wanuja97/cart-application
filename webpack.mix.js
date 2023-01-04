const mix = require('laravel-mix');

mix.setPublicPath('public').js('resources/js/app.js','js').sass('resources/sass/app.scss','css');