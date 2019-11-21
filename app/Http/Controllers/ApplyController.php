<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Apply;
use App\Biodata;
use Sentinel, Session;

class ApplyController extends Controller
{
    public function index()
    {
        $apply = Apply::all();
        return view('apply.index')->with('apply', $apply);
    }

    public function store($job_id)
    {
        
        $data = User::where('id',Sentinel::getUser()->id)->first();
            $apply = new Apply();
            $apply->user_id = Sentinel::getUser()->id;
            $apply->job_id = $job_id;
            $apply->status_apply = 'Menunggu';
            $apply->save();
            Session::flash('notice', 'Berhasil apply pekerjaan silahkan tunggu');
            return back();
        
    }

    public function edit()
    {
        $apply = Apply::with('user')->with('company')->get();
        return view('home.apply')->with('apply', $apply);
    }
}
