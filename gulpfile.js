var elixir = require('laravel-elixir');
//require('laravel-elixir-imagemin');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')

    .styles([

            "fonts/font-awesome/font-awesome.css",

    ],"./public/css/fonts/awesome-fonts.css").styles([

            "custom/main.min.css",

        ],"./public/css/custom/custom.min.css").styles([

            "libs/sweetalert.css",

        ],"./public/css/libs/libs.css")

        .scripts([
            "plugins/plugins.js",

        ],"./public/js/plugins/plugins.js")

        .scripts([
            "plugins/vendors.js",
            'plugins/sweetalert-dev.js'

        ],"./public/js/plugins/vendors.js")


});
