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

    <div class="row justify-content-center text-center">
        <div class="col-12">
        <!-- answer form -->
        <form action="{{ url('answer') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- answer -->
            <div class="form-group">
                <input type="text" name="answer" id="answer" class="form-control">
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
