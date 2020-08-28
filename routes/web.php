<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::resource('', 'QuestionController')->only([
    'index'
]);

Route::resource('question', 'QuestionController')->only([
    'store', 'show'
]);

Route::resource('question.answer', 'AnswerController')->only([
    'store'
]);
