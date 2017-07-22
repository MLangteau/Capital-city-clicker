<?php

namespace App\Http\Controllers;

use App\Choice;
use Illuminate\Http\Request;
use App\Game;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  defines the guard to protect/not the user guard (only allows users)
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all(); // using Eloquent
        return view('admin')->with('games',$games);
    }

    public function add()
    {
        $choices = Choice::all(); // using Eloquent
        return view('admin')->with('choices',$choices);
    }

    public function store(Request $request)
    {
        $games = Game::all(); // using Eloquent
        return view('admin.choice-save');
    }

    public function view(Choice $choice)
    {
        return view('admin.choice-view')
            ->with('choice',$choice);
    }
}
