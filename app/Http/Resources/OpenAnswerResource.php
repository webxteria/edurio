<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OpenAnswerResource extends JsonResource
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
            'word_count' => $this->when($this->open_answer, function () {
                $data = array();
                $data =  array_merge($data, explode(" ", $this->open_answer));
                return array_count_values($data);
            })
        ];
    }
}
