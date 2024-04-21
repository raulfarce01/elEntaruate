<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:repository {repositoryName}', function ($repositoryName) {

    $modelFileRoute = "app/Http/Model/".$repositoryName;
    $mayusRepositoryName = ucfirst($repositoryName);

    if(!file_exists($modelFileRoute)){
        Artisan::call("make:model ".$mayusRepositoryName." -m");
    }

    Storage::disk('http')->put($mayusRepositoryName . '.php', "
        <?php

        namespace App\Models;

        use ".$mayusRepositoryName.";
        use Illuminate\Database\Eloquent\Model;
        use Illuminate\Database\Eloquent\Factories\HasFactory;

        class ".$mayusRepositoryName." extends Model
        {
            use HasFactory;

            public static function add".$mayusRepositoryName."(".$mayusRepositoryName. " $" . $repositoryName . "){


            }

            public static function delete".$mayusRepositoryName."(\$id" . $mayusRepositoryName . "){


            }

            public static function update".$mayusRepositoryName."(\$id" . $mayusRepositoryName . "){


            }
        }
    ");

})->purpose('Create a repository to avoid using the model to call the database');
