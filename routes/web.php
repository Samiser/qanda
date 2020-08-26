<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Question;
use App\Answer;

/*
 * Show question list
 * and form for new questions
 */
Route::get('/', function () {
    $questions = Question::orderBy('created_at', 'asc')->get();

    return view('questions', [
        'questions' => $questions
    ]);
});

/*
 * Create a new question
 */
route::post('/question', function (Request $request) {
    $data = $request->validate([
        'question' => 'required',
    ]);

    $question = tap(new Question($data))->save();

    return redirect('/');
});

/*
 * Show question detail, answers
 * and form for answering
 */
route::get('/question/{question}', function (Question $question) {
    return view('question');
});

/*
 * Create a new answer
 */
route::post('/answer', function (Request $request) {
    return view('question');
});
