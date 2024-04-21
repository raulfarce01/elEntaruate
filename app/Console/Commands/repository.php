<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {repositoryName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a repository to make the calls to the database without using the model directly';

    /**
     * Execute the console command.
     */
    public function handle($repositoryName)
    {
        $route = "app/Http/Repositories";

        if(is_dir($route)) {
            Storage::disk('http')->put($repositoryName . '.php', '');
        }else{
            mkdir($route,777, true);
            Storage::disk('http')->put($repositoryName . '.php', '');
        }
    }
}
