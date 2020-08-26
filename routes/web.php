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
});

/*
 * create a new question
 */
route::post('/question', function (Request $request) {
    $data = $request->validate([
        'question' => 'required|max:5000|min:5|ends_with:?',
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
        'answer' => 'required|max:5000|min:5',
        'question_id' => 'required',
    ]);

    $question = tap(new Answer($data))->save();

    return redirect('/question/' . strval($request->input('question_id')));
});
