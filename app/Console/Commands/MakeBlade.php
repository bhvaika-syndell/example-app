<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeBlade extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:blade {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Blade view file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path("views/{$name}.blade.php");

        if (File::exists($path)) {
            $this->error("Blade file {$name}.blade.php already exists!");
            return 1;
        }

        File::put($path, '');
        $this->info("Blade file {$name}.blade.php created successfully.");
        return 0;
    }
}
