<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Game;
use Auth;
use App\Question;
use App\Choice;

class GameOneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
//
//    public function about() {
//        $title = 'About Us';
////        return view('pages.about');
//        return view('pages/about')->with('title', $title);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::inRandomOrder()->limit(51)->get();  //  Should use 9 or 15 in Production
        $choices = Choice::all(); // using Eloquent
        return view('game/gameone', compact('questions','choices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO:     grab choice-id from request
        $userInput = $request->except('_token');

//      dd("HELLO REQUEST as userInput",$userInput);
        //TODO:     check how many are right/wrong
        $u_count_correct = 0;   //  The number of user's correct choices
        $u_count_incorrect = 0; //  The number of user's incorrect choices
        /*
        /   the $userInput has the choice-id which I read the choice database with
        /   to get the iscorrect boolean (see which one is the correct choice)
        /   */
        $chosenArray = [];
        $actualArray = [];
        $questionsArray = [];
        $u_count_total = (count($userInput));   //  The number of user's total answers
        foreach($userInput as $input){
            $choice = Choice::find($input);
            array_push($chosenArray,$choice->body);     //  Always put the selected choice

            $questionsAnswered = Question::find($choice->question_id);
            array_push($questionsArray,$questionsAnswered->body);

            if ($choice->iscorrect){
                $u_count_correct++;
                array_push($actualArray,$choice->body);     //  Will compare to selected later in blade
            }
            else {
                $u_count_incorrect++;
                //  use question_id and get choice from db where iscorrect is true (1)
                $correctAnswer = Choice::where([
                                ['question_id', '=', $choice->question_id],
                                ['iscorrect', '=', 1]
                ])->first();
                array_push($actualArray,$correctAnswer->body);     //  Will compare to selected later in blade
            }
        };
        //TODO:     pass results into view
        return view('game/results',compact('u_count_correct','u_count_incorrect',
            'u_count_total','actualArray','chosenArray','questionsArray'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
