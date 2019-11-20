<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Session, Sentinel;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view('company.index')->with('company',$company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //upload profile_image
        $patchImage = '/images/company';
        if ($request->profile_image) {
            //rename file yang diupload menjadi users-random.extension file
            $profile_image ='company-'.str_random(5).time().'.'.$request->file('image')->getClientOriginalExtension();
            //path lokasi penyimpanan file public/images/users/
            $request->profile_image->move(public_path($patchImage), $profile_image);
            $company->image = $profile_image;
        }

        $company = new Company;
        $company->nama_perusahaan = $request->nama_perusahaan;
        $company->judul_pekerjaan = $request->judul_pekerjaan;
        $company->alamat = $request->alamat;
        $company->gaji = $request->gaji;
        $company->waktu_bekerja = $request->waktu_bekerja;
        $company->deskripsi = $request->deskripsi;
        $company->save();
        // dd($request->all());
        Session::flash("notice", "Job success created");
        return redirect()->route("company");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit')->with('company',$company);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        Session::flash('notice', 'Hapus Data Company Sukeses');
        return redirect()->back();
    }

    public function job()
    {
        $company = Company::all();
        return view('company.job')->with('company', $company);
    }
}
