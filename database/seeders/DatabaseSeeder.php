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
        $questionList = Question::factory(20)->create();
        
        foreach ($questionList->pluck('id') as $questionId) {
           $this->insertQuestionOptionRecord($questionId, 50000);
           $this->insertQuestionOptionRecord($questionId, 50000);
     
        }

    }

    function insertQuestionOptionRecord($questionId, $quantity) {
        
        echo $questionId;

        $answers = Answer::factory($quantity)->make([
            'question_id' => $questionId
        ]); 


        $scalarOptionsChunk = $answers->chunk(500);

        $scalarOptionsChunk->each(function ($chunk) {
            Answer::insert($chunk->toArray());
        });


        return $questionId;
    }
}
