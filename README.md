# Installation

## Install PyroCMS
First of all, you need to make sure you install PyroCMS. Follow the instructions on its hompage or [see how i prefer doing it on this page.](https://williamastrom.se/blog/pyrocms-vue-laravel-and-bootstrap-4-get-started-quickly)


## Install Avviare

```
composer require "pixney/avviare-extension"
composer dump
php artisan addon:install avviare
``` 



## Get started

This is how you create your theme:
```
php artisan theme:setup mycompany.theme.themename
``` 

### After install
When everything is completed, your theme is ready to be used. Unless you already have, you need to run `npm install` and after completion you can run the regular `npm run watch/prod` commands.

## Important 1
Don't forget to visit `settings->display` and make sure you select your new theme as the public one.

## Important 2
Because of some changes in the metadata.twig file, you need to either remove the lines for the favicon and open graph image or add those images. If you don't - then you will experience some issues trying to view your site.
