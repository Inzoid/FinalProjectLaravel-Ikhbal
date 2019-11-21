<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Biodata;
use Sentinel;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = Company::all();
        return view('users.dashboard')->with('dashboard', $dashboard);
    }

    public function profile()
    {
        $biodata = Biodata::all();
        return view('users.profile')->with('biodata', $biodata);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Sentinel::logout();
        Session::flash('notice', 'Logout berhasil');
        return redirect('/dashboard');
    }
}
