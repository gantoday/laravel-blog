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
	
	//mix.sass('app.scss', 'resources/assets/css');
	
	mix.styles([
		'bootstrap.min.css',
		'home.css',
		'highlight-default.css'
	]);

	mix.scripts([
		'jquery.min.js',
		'bootstrap.min.js',
		'highlight.js'
	])

	mix.version(['css/all.css', 'js/all.js']);
});
