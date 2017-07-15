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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $questions = Question::all(); // using Eloquent
//        $questions = Question::inRandomOrder()->limit(10)->get();  //  SHOULD USE IN PRODUCTION!!!!
        $questions = Question::limit(9)->get();
//        $result = $questions;
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
        $u_count_correct = 0;   //  The number of user's correct choices
        $u_count_incorrect = 0; //  The number of user's incorrect choices
        /*
        /   the $userInput has the choice-id which I read the choice database with
        /   to get the iscorrect boolean (see which one is the correct choice)
        /   */
        foreach($userInput as $input){
            $u_count_total = (count($userInput));   //  The number of user's total answers
            $choice = Choice::find($input);
            if ($choice->iscorrect){
                $u_count_correct++;
            }
            else {
                $u_count_incorrect++;
            }
        }
        //TODO:     check how many are right
//        dd("u_count_correct: ".$u_count_correct." u_count_incorrect: ".$u_count_incorrect." u_count_total: ".$u_count_total);
        return view('game/results',compact('u_count_correct','u_count_incorrect','u_count_total'));
        //TODO:     pass results into view
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
