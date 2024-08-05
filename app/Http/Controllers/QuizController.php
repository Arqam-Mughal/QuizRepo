<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index(){

        $randomQuestion = Question::inRandomOrder()->first();
        // return $randomQuestion;

        return view('quiz', compact('randomQuestion'));

    }
}
