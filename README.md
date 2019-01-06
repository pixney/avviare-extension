# Installation
Add the following to your composer.json file: `"pixney/avviare-extension":"~0.2.0"` then run composer update. Once it is done, you probably need to run `composer dump`.

## Install
`php artisan addon:install avviare`

## Scaffold your theme
Do this how you normally do with PyroCMS. Example: `php artisan make:addon mycompany.theme.themename` 

## Set yourself up for using laravel mix
When your theme is scaffolded, it's finally time to have Avviare delete directories we don't need and set you up for using laravel mix: `php artisan setup:theme mycompany.theme.themename`

## Final step
`npm install`

### oh....
Don't forget that once you are done, go to settings->display and make sure you select your new theme as the public one. You gotta run `php artisan streams:compile` afterwards.