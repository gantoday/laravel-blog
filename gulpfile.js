var elixir = require('laravel-elixir');

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
    
    mix.sass('app.scss', 'resources/assets/css');
    
    mix.styles([
    	'libs/bootstrap.min.css',
    	'libs/select2.min.css',
    	'app.css',
        'auth.css'
    ],'public/assets/home/all.css', 'resources/assets/css');

    mix.scripts([
    	'libs/jquery.min.js',
    	'libs/bootstrap.min.js',
    	'libs/select2.min.js',
        'libs/inline-attachment.js',
        'libs/jquery.inline-attachment.js',
    ],'public/assets/home/all.js', 'resources/assets/js')

});
