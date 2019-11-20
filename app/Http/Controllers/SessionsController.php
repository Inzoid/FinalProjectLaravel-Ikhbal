<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Sentinel;
use Session;

class SessionsController extends Controller
{
    public function login()
    {
        if($user = Sentinel::check())
        {
            Session::flash('notice', ' You has login ' . $user->email );
            return redirect('/admin');
        }else {
            return view('users.login');
        }
    }

    public function login_store(Request $request)
    {
        if($user = Sentinel::authenticate($request->all())) {
            Session::flash('notice', 'Welcome ' . $user->email );
            return redirect('/admin/admin');
        } else {
            Session::flash('error', 'Login Gagal');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Sentinel::logout();
        Session::flash('notice', 'Logout berhasil');
        return redirect('/login');
    }
}

