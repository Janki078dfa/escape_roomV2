<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ManageRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $games = Game::all();
        return view('/room.room')->with(['games' => $games, 'rooms' => $rooms, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_room(Request $request)
    {

        if ($request->only('delete')):
            Room::destroy($request->only('room_id'));
            return redirect('/rooms');
        endif;

        if ($request->only('edit')):
            $room = DB::table('rooms')->where('id', $request->only('room_id'))->get()->first();
            $rooms = Room::all();
            $games = Game::all();
            return view('room.edit_room')->with(['games' => $games, 'room' => $room, 'rooms' => $rooms, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
        endif;

        return redirect('/rooms')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_room(Request $request)
    {
        $name = $request->only('name');
        $date = $request->only('date');
        $game_id = $request->only('form-select');

        $room = DB::table('rooms')->where('id', $request->only('id'));
        $room->update(['name' => $name['name'], 'date' => $date['date'], 'game_id' => $game_id['form-select']]);
        return redirect('/rooms')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function create_room(Request $request)
    {
        $data = $request->all();

        $room = Room::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'available' => 1,
            'game_id' => $data['form-select'],
        ]);

        $room->save();
        return redirect('/rooms');
    }

    public static function get_game($id)
    {
        $game = Game::find($id);
        return $game->name;
    }

    public static function get_room($id)
    {
        $game = Room::find($id);
        return $game->name;
    }
}
