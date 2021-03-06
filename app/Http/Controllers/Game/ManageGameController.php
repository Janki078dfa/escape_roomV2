<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageGameController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('/home')->with(['games' => $games, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function view()
    {
        $rooms = Room::all();
        $games = Game::all();
        return view('/game.game')->with(['games' => $games, 'rooms' => $rooms, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_game(Request $request)
    {

        if ($request->only('delete')):
            Game::destroy($request->only('game_id'));
            return redirect('/games');
        endif;

        if ($request->only('edit')):
            $game = DB::table('games')->where('id', $request->only('game_id'))->get()->first();
            $rooms = Room::all();
            $games = Game::all();
            return view('game.edit_game')->with(['games' => $games, 'game' => $game, 'rooms' => $rooms, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
        endif;

        return redirect('/game')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_game(Request $request)
    {
        $name = $request->only('name');
        $image = $request->only('image');
        $players = $request->only('players');

        $game = DB::table('games')->where('id', $request->only('id'));
        $game->update(['name' => $name['name'], 'image' => $image['image'], 'players' => $players['players']]);
        return redirect('/games')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function create_game(Request $request)
    {
        $data = $request->all();

        $game = Game::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'available' => 1,
            'game_id' => $data['form-select'],
        ]);

        $game->save();
        return redirect('/rooms');
    }
}
