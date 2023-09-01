<?php

namespace App\Console\Commands\Concerns;

use Illuminate\Support\Facades\DB;

trait EnsureDatabaseExists
{
    protected function ensureDatabaseExists(): bool
    {
        try {
            DB::connection()->getPDO();

            $dbExists = true;
        } catch (\Exception $e) {
            $dbExists = false;
        }

        if (! $dbExists) {
            if (config('database.default') == 'sqlite') {
                if ($path = config('database.connections.sqlite.database')) {
                    file_put_contents($path, null);

                    if ($this->ensureDatabaseExists()) {
                        $this->line('sqlite database created as '.str($path)->after(database_path()));

                        return true;
                    }
                }
            }

            return false;
        }

        return true;
    }
}
