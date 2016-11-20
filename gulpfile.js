const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
    mix.less('app.less');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
    mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');
    mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/font-awesome/css/font-awesome.css',
        //'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
        'node_modules/angular-bootstrap-datetimepicker/src/css/datetimepicker.css',
        'resources/css/sb-admin-2.css',
        'resources/css/timeline.css',
        
    ], 'public/assets/stylesheets/styles.css', './');
    mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        'bower_components/font-awesome/css/font-awesome.css',
        'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
        'resources/css/sb-admin-2.css',
        'resources/css/timeline.css'
    ], 'public/assets/stylesheets/bootstrap.css', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/bootstrap/dist/js/bootstrap.js',
        'bower_components/chart.js/dist/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js',
        //'bower_components/moment/moment.js',
        //'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        
        'resources/js/sb-admin-2.js'
        
        
        
        
    ], 'public/assets/scripts/frontend.js', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
       //'bower_components/fvn-datatables/media/js/jquery.dataTables.js',
       'bower_components/angular/angular.min.js',
       //'bower_components/angular-datatables/dist/angular-datatables.min.js',
       'bower_components/moment/moment.js',
       'node_modules/angular-bootstrap-datetimepicker/src/js/datetimepicker.js',
       'node_modules/angular-bootstrap-datetimepicker/src/js/datetimepicker.templates.js',
        
    ], 'public/assets/scripts/angular.min.js', './');
     mix.scripts([
        
        'resources/js/test.js'
        
        
    ], 'public/assets/scripts/test.js', './');
     mix.scripts([
        'resources/angularJs/app.js',
        
        'resources/angularJs/controllers/carController.js',
        'resources/angularJs/controllers/reservationController.js',        
    ], 'public/assets/scripts/angularJs.js', './');
    
});