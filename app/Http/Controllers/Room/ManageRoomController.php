<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('/room.room')->with(['rooms' => $rooms, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_room(Request $request)
    {
        if ($request->only('delete')):
            Room::destroy($request->only('user_id'));
        endif;

        if ($request->only('edit')):
            $room = DB::table('rooms')->where('id', $request->only('room_id'))->get()->first();
            $rooms = Room::all();
            return view('room.edit_room')->with(['room' => $room, 'rooms' => $rooms]);
        endif;

        return redirect('/rooms')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_room(Request $request)
    {
        dd($request->all());
    }

    public static function get_game($id)
    {
        $game = Game::find($id);
        return $game->name;
    }
}
