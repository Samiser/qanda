<!-- resources/views/questions.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- display errors -->
    <div class="row justify-content-center">
        @include('common.errors')   
    </div>

    <!-- new question form -->
    <div class="row justify-content-center text-center">
        <form action="{{ route('question.store') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- question input -->
            <div class="form-group">
                <textarea cols="50" placeholder="{{ $placeholder }}" type="text" name="question" id="question" class="form-control">{{ old('question') }}</textarea>
            </div>

            <!-- submit question button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Post Question
                </button>
            </div>
        </form>
    </div>

    @if (count($questions) > 0)
    <!-- render the questions -->
    <div class="row justify-content-center">
        <div class="col-12">
            <table class="table question-table">

                <!-- table headings -->
                <thead class="thead-light">
                    <th>Question</th>
                    <th class="w-25 text-center">Answers</th>
                </thead>

                <!-- table body -->
                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <!-- question name -->
                            <td class="table-text">
                                <div><a href="{{ route('question.show', ['question' => $question]) }}/">{{ $question->question }}</a></div>
                            </td>
                            <td class="table-text text-center">
                                <div>{{ count($question->answers) }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@endsection
