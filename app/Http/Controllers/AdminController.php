<?php

namespace App\Http\Controllers;

use App\User;
use Session, Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('home.index')->with('user', $user);
    }

    public function create()
    {
        return view('home.create');
    }

    public function store(UserRequest $request)
    {
        $credentials = [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'email'      => $request->input('email'),
            'password'   => $request->input('password'),
        ];
        
        Sentinel::registerAndActivate($credentials);
        Session::flash('notice', 'Success create new user');
        return redirect()->route('user');
    }

    public function show()
    {
        $user = User::all();
        return view('home.table')->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('home.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id)->update($request->all());
        Session::flash('notice', 'Update user success');
        return redirect()->route('user', $id);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route("user");
    }

    public function card()
    {
        return view('home.card');
    }

}
