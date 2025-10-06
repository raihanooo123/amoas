const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application.
 |
 */

// 1. Corrected JS Path
mix.js('resources/assets/js/app.js', 'public/js') 
   
// 2. Corrected SASS Path
   .sass('resources/assets/sass/app.scss', 'public/css')
   
// 3. PostCSS/Tailwind configuration (which we previously fixed)
   .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'), 
        require('autoprefixer'),
    ]);