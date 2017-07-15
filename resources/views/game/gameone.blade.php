@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game One!</h1>
    </div>
    <div class="container">
        @if(count($questions) > 0)
            <div class="all-questions">
                <form action="/game1" method="post">
                    {{ csrf_field() }}
                    @foreach($questions as $question)
                        {{$question->body}}<br>
                        @if (count($choices) > 0)
                            @foreach($choices as $choice)
                                @if ($choice->question_id == $question->id)
                                    <input type="radio" name="{{$question->id}}" value="{{$choice->id}}">{{$choice->body}}<br>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <input type="submit" value="Submit" />
                </form>
            </div>
        @else
            <p>No Questions found</p>
        @endif
    </div>
@endsection