<?php

namespace App\Http\Controllers;

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
}
