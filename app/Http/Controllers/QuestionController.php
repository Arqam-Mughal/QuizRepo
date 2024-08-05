<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();

        return view('question.list', compact('questions'));
    }

    public function create()
    {
        return view('question.create');
    }

    public function store(Request $req)
    {
         // dd($req->options);
         $question = new Question;
         $question->question = $req->question;
         $question->options = $req->options;
         $question->correct = $req->correct;
         $question->save();

         return redirect()->route('question.index');
    }

    public function show(string $id)
    {
        // Code to show a single question
    }

    public function edit(string $id)
    {
        $question = Question::findorfail($id);
        return view('Question.edit', compact('question'));
    }

    public function update(Request $request, string $id)
    {
        $question = Question::findorfail($id);

        $question->question = $request->question;
        $question->options = $request->options;
        $question->correct = $request->correct;
        $question->save();

        return redirect()->route('question.index');
    }

    public function destroy(string $id)
    {
        $question = Question::findorfail($id);

        $question->delete();
        return redirect()->route('question.index');
    }
}
