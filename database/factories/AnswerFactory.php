<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'count' => $this->faker->randomNumber(5),
            'average' => $this->faker->randomFloat(2, 2, 0, 100),
            'question_id' => 0,
            'options' => json_encode(
                [
                    $this->faker->randomElement(
                        [
                            [
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ],
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ],
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ],
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ],
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ],
                                [
                                    'type' => 'scalar',
                                    'order' =>  $this->faker->randomNumber(5),
                                    'count' => $this->faker->randomNumber(9),
                                    'percent' => $this->faker->randomFloat(2, 2, 0, 100)
                                ]
                            ]
                        ],
                        [
                            'type' => 'open',
                            'wordcloud' => 'data:image/png;base64,...'
                        ],
                        [
                            'type' => 'open',
                            'wordcloud' => [
                                'word' => 'school',
                                'frequency' => 20
                            ]
                        ]

                    )
                ]
            )
        ];
    }
}
