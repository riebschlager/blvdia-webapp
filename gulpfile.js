var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.scripts([
        'jquery/dist/jquery.min.js',
        'angular/angular.min.js'
    ], 'public/js/vendor.js', 'resources/lib');
});

elixir(function(mix) {
    mix.scripts([
        'module.js',
        'controllers.js'
    ], 'public/js/app.js', 'resources/assets/js');
});