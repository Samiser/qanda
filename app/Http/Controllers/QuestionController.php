<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')->get();

        $examples = array("why are vegans so cool?",
                          "how can i best reduce my carbon footprint?",
                          "why is the sky blue?",
                          "why did the chicken cross the road?",
                          "how are baby cows so cute?",
                          "why is hacktivism useful?",
                          "who made this epic web app?",
                          "whats the meaning of life?",
                          "has anyone really been far even as decided to use even go want to do look more like?");

        return view('questions', [
            'questions' => $questions,
            'placeholder' => $examples[array_rand($examples)],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|max:5000|min:5|ends_with:?',
        ]);

        Question::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answers = Answer::where('question_id','=',$id)->orderBy('created_at', 'asc')->get();

        return view('answers', [
            'answers' => $answers,
            'question' => Question::find($id),
        ]);
    }
}
