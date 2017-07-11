<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;

class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => 'index']);
    }
    /**
     * Show the application game options.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all(); // using Eloquent
        return view('games.index')->with('games',$games);
    }
}
