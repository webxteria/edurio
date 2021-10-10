<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Resources\QuestionsResource;
use Illuminate\Http\Request;
use DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scalar(Request $request)
    {
        $openQuestions = Question::where('type', 'scalar')
            ->with('answers')
            ->withSum('answers', 'scalar_answer')
            ->withCount('answers');
        $openQuestions = $openQuestions->limit(9)->get();

        return QuestionsResource::collection($openQuestions);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request)
    {

        $scalarQuestions = Question::where('type', 'open')->with('answers')->limit(9)->get();

        return  QuestionsResource::collection($scalarQuestions);
    }
}
