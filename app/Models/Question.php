<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public $fillable = ['question', 'type'];

    function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    function limitedOptions()
    { 
        return $this->hasMany(QuestionOption::class);
    }
}
