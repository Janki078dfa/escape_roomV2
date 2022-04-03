<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogOutController extends Controller
{
    public function logOut()
    {
        dd(Session::all());
        Session::flush();
        Auth::logout();
        //return redirect('/');
    }
}
