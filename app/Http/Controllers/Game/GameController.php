<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('home')->with(['games' => $games, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }
}
