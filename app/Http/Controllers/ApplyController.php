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
        $apply = Apply::with('user')->with('company')->get();
        return view('home.apply')->with('apply', $apply);
    }

    public function store(Request $request, $job_id)
    {
        $user_id = Sentinel::getuser()->id;
        $biodata = Biodata::where('user_id', $user_id)
        ->where('cv', 'like', '%.pdf')
        ->first();
        if ($biodata) {
            // dd($biodata->cv);
            $modelApply = new Apply();
            $modelApply->user_id = $user_id;
            $modelApply->job_id = $job_id;
            $modelApply->status_apply = 'Menunggu';
            $modelApply->save();
            Session::flash('notice', 'Apply job berhasil silahkan tunggu kabar dari kami');
        } else {
            Session::flash('error', 'Untuk Apply harus Update Biodata & Upload CV dulu gan');
        }
        return redirect()->route('dashboard');
    }

    public function edit()
    {
        $apply = Apply::with('user')->with('company')->get();
        return view('home.apply')->with('apply', $apply);
    }

    public function update(Request $request, $id)
    {
        $modelApply = Apply::find($id);
        $status = $request->status_apply;
        $modelApply->status_apply = $status;
        $modelApply->save();

        if ($status == 'Diterima') {
            Session::flash('notice', 'Selamat pelamar diterima!');
            //aksi email terima
        } else {
            Session::flash('error', 'Maaf Pelamar ditolak');
            //aksi email tolak
        }
        return redirect()->route('apply');
        
    }
}
