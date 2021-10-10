<?php

namespace Database\Seeders;

use App\Models\AnswersOption;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;

use function PHPSTORM_META\type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AnswersSeeder::class);
    }
}
