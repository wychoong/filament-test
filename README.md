# This is a very minimal repo for reproducing Filament issue.

## For maintainer/tester
- Bring your own .env
- `composer install`
- Run `artisan test:init`

## For using this as your repo base
- Bring your own .env
- `composer require {packages}` what is need for your issue
- Make sure you work with the correct packages version
- Customize `App\Console\Commands\InitBase` to setup your issue
- Make sure `artisan test:init` can bootstrap the app to replicate your issue

---------

###### note
- default User included
- a basic Todo list (Task, TaskItem model (Sushi) & resource included)
- Filament's Spatie packages included
