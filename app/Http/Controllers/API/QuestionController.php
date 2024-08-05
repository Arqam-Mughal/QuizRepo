<?php

namespace App\Http\Controllers\API;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();

        return response()->json([
            'status' => true,
            'questions' => $questions
        ], 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'options' => 'required',
            'correct' => 'required'
        ]);

        try{

            $question = new Question;
            $question->question = $request->question;
            $question->options = $request->options;
            $question->correct = $request->correct;
            $question->save();

            return response()->json([
                'status' => true,
                'message' => 'Question Created SuccessFully!'
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $question = Question::find($id);
        if($question != ''){
            $request->validate([
                'question' => 'required',
                'options' => 'required',
                'correct' => 'required'
            ]);

            try{

                $question->question = $request->question;
                $question->options = $request->options;
                $question->correct = $request->correct;
                $question->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Question Updated SuccessFully!'
                ], 200);

            }catch(\Exception $e){
                return response()->json([
                    'status' => false,
                    'error' => $e->getMessage()
                ], 500);
            }

        }else{
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found!'
            ]);
        }


}


    public function destroy(string $id)
    {
        $question = Question::find($id);
        if($question != ''){

            $question->delete();
            return response()->json([
                'status' => true,
                'message' => 'Question Deleted SuccessFully!'
            ]);

        }else{
            return response()->json([
                'status' => false,
                'message' => 'Record Not Found!'
            ]);
        }
    }
}
