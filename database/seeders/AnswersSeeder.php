<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Answer;


class AnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create scalar questions
        $questionList = Question::factory(9)->create([
            'type' => 'scalar'
        ]);

        foreach ($questionList->pluck('id') as $questionId) {
            $this->insertQuestionOptionRecord($questionId, 50, 'scalar');
            $this->insertQuestionOptionRecord($questionId, 5, 'scalar');
        }

        // create open questions
        $questionList = Question::factory(1)->create([
            'type' => 'open'
        ]);

        $this->insertQuestionOptionRecord($questionList->first()->id, 5, 'open');
    }


    function insertQuestionOptionRecord($questionId, $quantity, $type)
    {
        $answer = [
            'question_id' => $questionId,

        ];

        if ($type == 'open') {
            $answer['scalar_answer'] = null;
            $answer['open_answer'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
           // dd($type, $answer);
        }


        $answers = Answer::factory($quantity)->make($answer);


        $scalarOptionsChunk = $answers->chunk(100);

        $scalarOptionsChunk->each(function ($chunk) {
            Answer::insert($chunk->toArray());
        });


        return $questionId;
    }
}
