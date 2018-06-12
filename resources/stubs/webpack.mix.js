/*
 |--------------------------------------------------------------------------
 | Avviare Extension by Pixney AB
 |--------------------------------------------------------------------------
 | 
 | The following has been added when you ran the Avviare extension.
 | 
 */

let mix = require('laravel-mix');
mix.setPublicPath(path.normalize('DummyPublicPath'));
mix.js('DummyAppJS', 'js')
.sass('DummyAppCSS', 'css')
.sourceMaps().version();
