@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>Game One!</h1>
    </div>
    <div class="container">

    <?php
    // creating a random number for later use
    $randNum = rand(1,51);
//    $number = (int) $_GET['n'];

//    $query = "SELECT * FROM `questions` WHERE question_id < 10";
    ?>
    {{--@component('components.questionArray')--}}
    {{--@endcomponent--}}
    @if(count($questions) > 0)
        <div class="all-questions">
            @foreach($questions as $question)
                   *****QUESTION: {{$question->body}}<br>
                    @if (count($choices) > 0)
{{--                      @if ($choice->question_id = $question->id)--}}
                        @foreach($choices as $choice)

                            {{--@if ($choice->question_id = $question->id)--}}
 -----CHOICE BODY: {{$choice->body}} CHOICE Q_ID: {{$choice->question_id}} Q-ID: {{$question->id}}<br>
           <input type="radio" name="hello" id="{!! $choice->id !!}" @if ($choice{0}) {!! "checked" !!} @endif>{{$choice->body}}<br>
        {{--<ul>--}}
            {{--<li><input type="radio" name="choice" value="{{$choice->id}}"></li>--}}
        {{--</ul>--}}
        {{--<input type="submit" value="Submit" />--}}
    {{--</form>--}}



                        {{--{{ Form::label('choiceForQ-0', 'what') }}--}}
                        {{--{{ Form::radio('choiceForQ', 'what', false, array('id'=>'penyakit-0')) }}--}}
                        @endforeach
                      {{--@endif--}}
                    @endif
{{--                </form>--}}
            @endforeach


        </div>
    @else
        <p>No Questions found</p>
    @endif
    </div>
@endsection