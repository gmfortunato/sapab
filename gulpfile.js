var elixir = require('laravel-elixir');

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

// Gentelella vendors path : vendor/bower_components/gentelella/vendors

elixir(function(mix) {

    /********************/
    /* Copy Stylesheets */
    /********************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css', 'public/css/bootstrap.min.css');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css', 'public/css/font-awesome.min.css');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/css/custom.min.css', 'public/css/gentelella.min.css');

    /********************/
    /* Compile Custom CSS */
    /********************/

    // CUSTOM FRONTEND CSS
    mix.sass([
        'front/*.scss',
    ], 'public/css/front/style.min.css');

    mix.scripts([
        'front/*.js',
    ], 'public/js/front/scripts.min.js');

    // CUSTOM BACKEND CSS
    mix.sass([
        'admin/*.scss',
    ], 'public/css/admin/style.min.css');

    mix.scripts([
        'admin/*.js',
    ], 'public/js/front/scripts.min.js');


    /****************/
    /* Copy Scripts */
    /****************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js', 'public/js/bootstrap.min.js');

    // jQuery
    mix.copy('vendor/bower_components/gentelella/vendors/jquery/dist/jquery.min.js', 'public/js/jquery.min.js');

    // Gentelella
    mix.copy('vendor/bower_components/gentelella/build/js/custom.min.js', 'public/js/gentelella.min.js');

    // Smooth Scroll
    mix.copy('node_modules/smooth-scroll/dist/smooth-scroll.min.js', 'public/js/front/smooth-scroll.min.js');

    /**************/
    /* Copy Fonts */
    /**************/

    // Bootstrap
    mix.copy('vendor/bower_components/gentelella/vendors/bootstrap/fonts/', 'public/fonts');

    // Font awesome
    mix.copy('vendor/bower_components/gentelella/vendors/font-awesome/fonts/', 'public/fonts');

    /**************/
    /* Copy Images */
    /**************/

    mix.copy('resources/assets/images/', 'public/images');
});
