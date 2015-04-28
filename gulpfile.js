var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

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

elixir(function(mix) {
    mix.sass('main.scss', undefined, {
        outputStyle: 'compressed'
    });
});