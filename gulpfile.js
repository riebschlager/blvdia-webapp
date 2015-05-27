var elixir = require('laravel-elixir');
elixir.config.sourcemaps = false;

elixir(function(mix) {

  mix.scripts([
  'jquery/dist/jquery.min.js',
  'angular/angular.min.js',
  'underscore/underscore-min.js',
  'socket.io-client/socket.io.js'
  ], 'public/js/vendor.js', 'resources/lib');

  mix.scripts([
  'module.js',
  'controllers.js'
  ], 'public/js/app.js', 'resources/assets/js');

  mix.scripts([
  'admin.js'], 'public/js/admin.js', 'resources/assets/js');

  mix.scripts([
  'admin-photos.js'], 'public/js/admin-photos.js', 'resources/assets/js');

  mix.scripts([
  'photo.js'], 'public/js/photo.js', 'resources/assets/js');

  mix.scripts([
  'collage.js'], 'public/js/collage.js', 'resources/assets/js');

  mix.sass('main.scss', undefined, {
    outputStyle: 'compressed'
  });

  mix.copy('resources/lib/angular/angular.min.js.map', 'public/js/angular.min.js.map');
  mix.copy('resources/lib/underscore/underscore-min.map', 'public/js/underscore-min.map');

});
