# This is a very minimal repo for reproducing Filament issue.

Issue:
using none native in a modal, a console error is shown after closing the modal
![screenshot](/Screenshot.png)

Steps to reproduce:
- pull the repo
- `artisan test:init`
- navigate to Task > create/edit > click Create task item (relation manager) > close, don't need to create or open dropdown
  
  
## For maintainer/tester
- Bring your own .env
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
