<?php

namespace App\Http\Controllers;

use Sentinel; 
use Session; 
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use App\Jobs\Register;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function signup() 
    {
        return view('users.signup');
    }

    public function signup_store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            //cari role 'user'
            $role = Sentinel::findRoleBySlug('user');
            $role_id = $role->id;

        $credentials = [
            'first_name' => $request->input('first_name'),
            'last_name'  => $request->input('last_name'),
            'tanggal_lahir'  => $request->input('tanggal_lahir'),
            'email'      => $request->input('email'),
            'password'   => $request->input('password'),
        ];
        
            $user = Sentinel::registerAndActivate($credentials);
            //tambahkan role_id pada table relasi
            $user->roles()->attach($role_id);
            Session::flash('notice', 'Success create new user');
            DB::commit(); // simpan db

        } catch (\Throwable $errors) {
            DB::rollback(); //rollback jika ada error saat insert ke db
            Session::flash('error', $errors);
        }
        return redirect()->route('login');
    }
}
