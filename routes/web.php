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
    return view('questions');
});

/*
 * Create a new question
 */
route::post('/question', function (Request $request) {
    return view('/');
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
