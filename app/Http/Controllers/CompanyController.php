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
        $patchImage = '/images/company';
        $modelCompany = new Company();
        if ($request->image) {
            //rename file yang diupload menjadi users-random.extension file
            $image ='company-'.str_random(5).time().'.'.$request->file('image')->getClientOriginalExtension();
            //path lokasi penyimpanan file public/images/users/
            $request->image->move(public_path($patchImage), $image);
            //simpan nama file image ke field image
            $modelCompany->image = $image;
        }

        $nama_perusahaan = $request->input('nama_perusahaan');
        $judul_pekerjaan = $request->input('judul_pekerjaan');
        $alamat = $request->input('alamat');
        $gaji = $request->input('gaji');
        $waktu_bekerja = $request->input('waktu_bekerja');
        $deskripsi = $request->input('deskripsi');

        $modelCompany->nama_perusahaan = $nama_perusahaan;
        $modelCompany->judul_pekerjaan = $judul_pekerjaan;
        $modelCompany->alamat = $alamat;
        $modelCompany->gaji = $gaji;
        $modelCompany->waktu_bekerja = $waktu_bekerja;
        $modelCompany->deskripsi = $deskripsi;
        $modelCompany->save();
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
