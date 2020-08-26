<!-- resources/views/questions.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="row justify-content-center text-center">
            <!-- new question form -->
            <form action="{{ url('question') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- question input -->
                <div class="form-group">
                    <input type="text" name="question" id="question" class="form-control">
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
                                <div><a href="/question/{{ $question->id }}/">{{ $question->question }}</a></div>
                            </td>
                            <td class="table-text text-center">
                                <div>0</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@endsection