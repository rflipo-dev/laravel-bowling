const elixir = require('laravel-elixir');

require('ws-laravel-elixir-typescript');

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
    /** Bower **/
    mix.styles([
        'bower_components/admin-lte/bootstrap/css/bootstrap.min.css',
        'bower_components/admin-lte/dist/css/AdminLTE.min.css',
        'bower_components/admin-lte/plugins/iCheck/square/green.css',
        'bower_components/admin-lte/dist/css/skins/skin-green.min.css',
        'resources/assets/js/dist/dropzone.min.css'

    ], 'public/css/admin_vendor.css', './');

    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/admin-lte/bootstrap/js/bootstrap.min.js',
        'bower_components/admin-lte/plugins/iCheck/icheck.min.js',
        'bower_components/admin-lte/dist/js/app.min.js',
        'resources/assets/js/dist/dropzone.min.js',
        'resources/assets/js/admin.js',

    ], 'public/js/admin_vendor.js', './');

    /** Bower **/
    mix.styles([
        'bower_components/normalize-css/normalize.css',
        'bower_components/owl.carousel/dist/assets/owl.carousel.min.css',
        'resources/assets/js/dist/dropzone.min.css',
        'resources/assets/js/dist/jquery-ui.min.css',
        'bower_components/remodal/dist/remodal.css',
        'bower_components/datedropper/datedropper.min.css'

    ], 'public/css/vendor.css', './');

    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/owl.carousel/dist/owl.carousel.min.js',
        'bower_components/jquery-mask-plugin/src/jquery.mask.js',
        'bower_components/remodal/dist/remodal.min.js',
        'bower_components/datedropper/datedropper.min.js'
    ], 'public/js/vendor.js', './');

    /** Versioning **/
    mix.version([
        '/js/vendor.js',
        '/css/vendor.css'
    ]);

    mix.copy('bower_components/datedropper/dd-icon', 'public/build/css/dd-icon');
});
