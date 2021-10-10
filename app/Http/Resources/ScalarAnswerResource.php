<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScalarAnswerResource extends JsonResource
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
            'order' => $this['order'],
            'count' => $this['count'],
            'average' => ($this['sum_of_scalar_answers'] / $this['count']),
            'percentage' =>  round((($this['count'] / $this['total_answersed_count_against_question']) * 100), 2),
        ];
    }
}
