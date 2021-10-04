<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Resources\QuestionsResource;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return  QuestionsResource::collection(Question::paginate(10));
    }

}
