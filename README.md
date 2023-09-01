# This is a very minimal repo for reproducing Filament issue.

## For maintainer/tester
- Bring your own .env
- Run `artisan test:init`

## For using this as your repo base
- Bring your own .env
- `composer require {packages}`
- Customize `App\Console\Commands\InitBase` to suit your issue
- Make sure `artisan test:init` can bootstrap the app to replicate your issue
