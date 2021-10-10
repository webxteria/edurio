<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Question extends Model
{
    use HasFactory;

    public $fillable = ['question', 'type'];

    function answers()
    { 
        return $this->hasMany(Answer::class);
    }

    function answersSum()
    { 
        return $this->hasMany(Answer::class)->sum('scalar_answer');
    }

//     public function scalar_answer(){
//         return  $this->answers()->sum('scalar_answer');
//   }
}
