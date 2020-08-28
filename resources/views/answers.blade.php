<!-- resources/views/answers.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <h1 class="display-6 text-center">{{ $question->question }}</h1>
    </div>

    <!-- answers -->
    @if (count($answers) > 0)
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table question-table">

                    <!-- table headings -->
                    <thead class="thead-light">
                        <th>Answers</th>
                    </thead>

                    <!-- table body -->
                    <tbody>
                        @foreach ($answers as $answer)
                            <tr>
                                <!-- answer -->
                                <td class="table-text">
                                    <div>{{ $answer->answer }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <!-- display errors -->
    <div class="row justify-content-center">
    @include('common.errors')
    </div>

    <!-- answer form -->
    <div class="row justify-content-center text-center">
        <div class="col-12">
        <form action="{{ route('question.answer.store', ['question' => $question]) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- answer -->
            <div class="form-group">
                <textarea cols="50" type="text" name="answer" id="answer" class="form-control">{{ count($errors) > 0 ? old('answer') : "" }}</textarea>
                <input type="hidden" id="question_id" name="question_id" value="{{ $question->id }}">
            </div>

            <!-- add question button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Submit Answer
                </button>
            </div>
        </form>
        </div>
    </div>

@endsection
