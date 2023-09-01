<?php

namespace App\Console\Commands;

use App\Console\Commands\Concerns\EnsureDatabaseExists;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Migrations\MigrateCommand;

class InitBase extends Command
{
    use EnsureDatabaseExists;

    protected $signature = 'test:init';

    protected $description = 'Setup the base for issue test case';

    protected function setup()
    {
        // setup your issue, for example seeder
    }

    public function handle()
    {
        if (! $this->ensureDatabaseExists()) {
            $this->error('no database');

            return Command::FAILURE;
        }

        $this->call(MigrateCommand::class);

        return $this->setup();
    }
}
