var elixir = require('laravel-elixir');
require('laravel-elixir-stylus');
var postStylus = require('poststylus');
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
	mix.browserSync({
        proxy: 'truck.dev'
    });
    mix.stylus('main.styl', null, {
   		use: [postStylus(['lost', 'autoprefixer','rucksack-css'])],
   		compress:true
	});
	mix.stylus('user.styl', null, {
   		use: [postStylus(['lost', 'autoprefixer','rucksack-css'])],
   		compress:true
	});
	mix.stylus('home.styl', null, {
   		use: [postStylus(['lost', 'autoprefixer','rucksack-css'])],
   		compress:true
	});
	mix.rollup('maps.js', 'public/js/maps.js');
	mix.rollup('book.maps.js', 'public/js/book.maps.js');
	//mix.webpack([ 'libs/jquery.js','maps.js'], 'public/js/maps.js');
});
