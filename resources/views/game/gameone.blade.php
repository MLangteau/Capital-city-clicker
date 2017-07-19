@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1 class="">Guess the United States' Capitals</h1>
        <h2>Answer as many questions as you dare.</h2>
    </div>
    <div class="container">
                @if(count($questions) > 0)
                    <div class="row">
                    <form action="/game1" method="post">
                        {{ csrf_field() }}
                        @foreach($questions as $question)
                            <div class="col-xs-6 col-md-4 col-lg-4 quiz-rect">
                                <h5>What is the capital of: {{$question->body}}?</h5>
                                @if (count($choices) > 0)
                                    @foreach($choices as $choice)
                                        @if ($choice->question_id == $question->id)
                                            <input type="radio" name="{{$question->id}}"
                                                   value="{{$choice->id}}">{{$choice->body}}<br>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                        <input class="btn-success btn-lg center-block extraSP" type="submit" value="Submit"/>
                    </form>

                @else
                    <p>No Questions found</p>
                @endif
            </div>
        {{--</div>--}}
    </div>
@endsection