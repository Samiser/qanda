<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Answer;

class AnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'answer' => 'required|max:5000|min:5',
            'question_id' => 'required',
        ]);

        $answer = Answer::create($request->all());

        return redirect('/question/' . $answer->question_id);
    }
}
