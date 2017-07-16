@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Guess the United States Capitals!</h1>
        <h2>Answer as many questions as you want.</h2>
    </div>
    <div class="container">
        @if(count($questions) > 0)
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4 all-questions">
                <form action="/game1" method="post">
                    {{ csrf_field() }}
                    @foreach($questions as $question)
                        <h4>{{$question->body}}</h4>
                        @if (count($choices) > 0)
                            @foreach($choices as $choice)
                                @if ($choice->question_id == $question->id)
                                    <input type="radio" name="{{$question->id}}" value="{{$choice->id}}">{{$choice->body}}<br>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <input class="btn-success" type="submit" value="Submit" />
                </form>
            </div>
        </div>
        @else
            <p>No Questions found</p>
        @endif

    </div>
@endsection