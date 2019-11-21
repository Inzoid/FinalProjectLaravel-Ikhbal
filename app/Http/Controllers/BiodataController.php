<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\User;
use App\Role;
use Sentinel;
use Session;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::all();
        return view('biodata.index')->with('biodata', $biodata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biodata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patchImage = '/images/biodata';
        $modelBiodata = new Biodata();
        if ($request->profile_image) {
            //rename file yang diupload menjadi users-random.extension file
            $profile_image ='biodata-'.str_random(5).time().'.'.$request->file('profile_image')->getClientOriginalExtension();
            //path lokasi penyimpanan file public/profile_images/users/
            $request->profile_image->move(public_path($patchImage), $profile_image);
            //simpan nama file profile_image ke field profile_image
            $modelBiodata->profile_image = $profile_image;
        }

        //relasi ke tabel
        $biodata = Biodata::where('user_id', Sentinel::getUser()->id)->first();
        $user_id = Sentinel::getUser()->id;

        $biodata->user_id = $user_id;
        $biodata->nama = $request->nama;
        $biodata->tempat_lahir = $request->tempat_lahir;
        $biodata->tgl_lahir = $request->tgl_lahir;
        $biodata->alamat = $request->alamat;
        $biodata->kota = $request->kota;
        $biodata->negara = $request->negara;
        $biodata->kode_pos = $request->kode_pos;
        $biodata->keterangan = $request->keterangan;
        $biodata->cv = $request->cv;
        $biodata->pendidikan = $request->pendidikan;
        $biodata->save();
        Session::flash('notice', 'Update Profile Sukses');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $biodata = Biodata::get();
        return view('biodata.show')->with('biodata', $biodata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
