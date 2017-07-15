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
        $questions = Question::limit(3)->get();
//        $result = $questions;
        $choices = Choice::all(); // using Eloquent
        return view('game/gameone')->with('questions',$questions)->with('choices',$choices);
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
//        $userInput = $request->all();     this includes the token
//        $userInput = array_except($request->all(),['_token']); this excludes the token, but is
        $userInput = $request->except('_token');
        dd("HELLO REQUEST as userInput",$userInput);
        $num_total = 0;
        $num_correct = 0;
        $num_incorrect = 0;
         foreach($userInput as $input){
             $choice = Choice::find($input);
             if ($choice->iscorrect){
                $num_correct++;
             }
             else {
                $num_incorrect++;
             }
        }
//        for($i = 1; $i < count($userInput); $i++) {  old way with the token still there
//            $choice = Choice::find($userInput[$i]);
//            if ($choice->iscorrect){
//                $num_correct++;
//            }
//            else {
//                $num_incorrect++;
//            }
//        };
        dd("num_correct: ". $num_correct . " num_incorrect". $num_incorrect);
        //TODO:     check how many are right
        //TODO:     pass into view
        //TODO:     results view
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
