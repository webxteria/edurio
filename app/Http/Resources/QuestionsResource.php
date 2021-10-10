<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'count' => $this->answers_count,
            'average' => round($this->answers->sum('scalar_answer') / sizeof($this->answers), 2),
            'options' => $this->whenLoaded('answers', function () {
                if ($this->type == 'scalar') {
                    //created new collection
                    $answers = collect([1, 2, 3, 4, 5, 6]);

                    foreach ($this->answers as $srtData) {
                        $answers[$srtData->scalar_answer] = [
                            'order' => $srtData->scalar_answer,
                            'count' =>  $answers[$srtData->scalar_answer]['count'] + 1,
                            'total_answersed_count_against_question' =>  $this->answers_count,
                            'sum_of_scalar_answers' => ($answers[$srtData->scalar_answer]['sum_of_scalar_answers'] + $srtData->scalar_answer)
                        ];
                    }

                    return ScalarAnswerResource::collection($answers);
                }

                return OpenAnswerResource::collection($this->answers);
            })
        ];
    }
}
