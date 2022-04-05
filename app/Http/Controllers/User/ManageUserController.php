<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManageUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('/user.manage_user')->with(['users' => $users, 'user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function manage_user(Request $request)
    {
        if ($request->only('delete')):
            User::destroy($request->only('user_id'));
        endif;

        if ($request->only('edit')):
            $user = DB::table('users')->where('id', $request->only('user_id'))->get()->first();

            return view('user.edit_user')->with(['user' => $user]);
        endif;

        return redirect('/manage_user')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }

    public function edit_user(Request $request)
    {
        $name = $request->only('name');
        $dni = $request->only('id_number');
        $phone = $request->only('phone');
        $email = $request->only('email');

        $user = DB::table('users')->where('id', $request->only('id'));
        $user->update(['name' => $name['name'], 'dni' => $dni['id_number'], 'phone' => $phone['phone'], 'email' => $email['email']]);
        return redirect('/manage_user')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }
}
