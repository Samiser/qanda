<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;

/*
 * show question list
 * and form for new questions
 */
Route::get('/', function () {
    $questions = Question::orderBy('created_at', 'desc')->get();

    return view('questions', [
        'questions' => $questions
    ]);
});

/*
 * create a new question
 */
route::post('/question', function (Request $request) {
    $data = $request->validate([
        'question' => 'required',
    ]);

    $question = tap(new Question($data))->save();

    return redirect('/');
});

/*
 * show question detail, answers
 * and form for answering
 */
route::get('/question/{question}', function (Question $question) {
    $answers = Answer::where('question_id','=',$question->id)->orderBy('created_at', 'asc')->get();

    return view('answers', [
        'answers' => $answers,
        'question' => $question,
    ]);
});

/*
 * create a new answer
 */
route::post('/answer', function (Request $request) {
    $request->flash();

    $data = $request->validate([
        'answer' => 'required',
        'question_id' => 'required',
    ]);

    $question = tap(new Answer($data))->save();

    return redirect('/question/' . strval($request->input('question_id')));
});
