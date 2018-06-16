# Installation
Add the following to your composer.json file: `"pixney/avviare-extension":"~0.1.0"` then run composer update. Once it is done, you probably need to run `composer dump`.

## Scaffold your theme
Do this how you normally do with PyroCMS. Example: `php artisan make:addon mycompany.theme.themename` 

When your theme is scaffolded, it's finally time to have Avviare delete som directories and set you up for using laravel mix: `php artisan setup:theme mycompany.theme.themename`