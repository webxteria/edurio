<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $cast = [
        'options' => 'array'
    ];

    public $fillable = ['count', 'average', 'options', 'question_id'];

}
