<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogInController extends Controller
{
    public function logIn(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))):
            $user = User::find(Auth::id());
            if ($user->hasRole('user')):
                Session::put('user', $user);
            endif;

            if ($user->hasRole('admin')):
                Session::put('admin', $user);
            endif;

            return redirect('/');
        endif;


        return redirect("/login")->withSuccess('Login details are not valid');
    }
}
