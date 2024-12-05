<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RollbackCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rollback {--step=1 : Number of migrations to rollback}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback database migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve the step option from the command input
        $step = $this->option('step');

        // Call the 'migrate:rollback' Artisan command
        $this->call('migrate:rollback', [
            '--step' => $step,
        ]);

        // Display success message
        $this->info("Rolled back $step migration(s) successfully!");
    }
}
