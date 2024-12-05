<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CacheCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache'; // Changed to 'cache' for simplicity

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all Laravel caches (config, route, view, event)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Call the 'optimize:clear' command
        $this->call('optimize:clear');

        // Display success message
        $this->info('All caches have been cleared successfully!');
    }
}
