<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CreateUserController extends Controller
{

    public function create_user(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'dni' => $data['id_number'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        $user->roles()->attach(Role::where('name', $data['form-select'])->first());
        return redirect('/')->with(['user' => Session::get('user'), 'admin' => Session::get('admin')]);
    }
}
