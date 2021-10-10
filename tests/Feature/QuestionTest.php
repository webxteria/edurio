<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuestionTest extends TestCase
{
    /**
     * Test to check api working for open.
     *  @test 
     * @return void
     */
    public function it_should_response_with_200_on_opening_questions_list()
    {
        $response = $this->get('/api/questions/open');
        $response->assertStatus(200);
    }

    /**
     * Test to check api working for scalar.
     *  @test 
     * @return void
     */
    public function it_should_response_with_200_on_scalar_questions_list()
    {
        $response = $this->get('/api/questions/scalar');
        $response->assertStatus(200);
    }


    /**
     * Test to check api working for open.
     *  @test 
     * @return void
     */
    public function it_should_response_with_scalar_questions_list()
    {
        $response = $this->get('/api/questions/scalar');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'question',
                    'count',
                    'average',
                    'options' => [
                        '*' => [
                            'order',
                            'count',
                            'average',
                            'percentage'
                        ]
                    ]
                ]
            ]
        ]);
    }

       /**
     * Test to check api working for open.
     *  @test 
     * @return void
     */
    public function it_should_response_with_opening_questions_list()
    {
        $response = $this->get('/api/questions/open');
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'question',
                    'count',
                    'average',
                    'options' => [
                        '*' => [
                            'order',
                            'word_count'
                        ]
                    ]
                ]
            ]
        ]);
    }

}
