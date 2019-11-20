<?php

namespace App\Http\Controllers;

use Sentinel; 
use Session; 
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
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
            //cari role 'admin'
            $role = Sentinel::findRoleBySlug('user');
            $role_id = $role->id;

            //upload profile_image
            $patchImage = '/images/users';
            if ($request->profile_image) {
                //rename file yang diupload menjadi users-random.extension file
                $profile_image ='user-'.str_random(5).time().'.'.$request->file('profile_image')->getClientOriginalExtension();
                //path lokasi penyimpanan file public/images/users/
                $request->profile_image->move(public_path($patchImage), $profile_image);
            }
            //simpan data user ke array
            $credentials = [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'profile_image' => $profile_image,
            ];
            
            //register sentinel
            // dd($credentials);
            $user = Sentinel::registerAndActivate($credentials);
            //tambahkan role_id pada table relasi
            $user->roles()->attach($role_id);
            Session::flash('notice', 'Success create new user');
            DB::commit(); // simpan db

        } catch (\Throwable $errors) {
            DB::rollback(); //rollback jika ada error saat insert ke db
            Session::flash('error', $errors);
        }
        return redirect('/login');
    }
}
