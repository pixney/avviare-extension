# Installation

## Install PyroCMS
First of all, you need to make sure you install PyroCMS. Follow the instructions on its hompage or [see how i prefer doing it on this page.](https://williamastrom.se/blog/pyrocms-vue-laravel-and-bootstrap-4-get-started-quickly)


## Install Avviare
Add the following to your composer.json file: `"pixney/avviare-extension":"~0.2.0"` then run the install commands below:

```
composer dump
php artisan addon:install avviare
``` 



## Create a theme
**themename** is the name of your theme:

```
php artisan make:addon mycompany.theme.themename
``` 

## Setup everything for mix

When your theme is scaffolded, Avviare will delete directories not required and set you up for using laravel mix. It's important that you run **npm install** after setting up the theme since otherwise the old version prior to mix 4 will be used.

```
php artisan setup:theme mycompany.theme.themename
npm install
npm run watch or npm run prod
```

## Important 1
Don't forget to visit `settings->display` and make sure you select your new theme as the public one.

## Important 2
Because of some changes in the metadata.twig file, you need to either remove the lines for the favicon and open graph image or add those images. If you don't - then you will experience some issues trying to view your site.
