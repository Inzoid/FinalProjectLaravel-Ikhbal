<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'nama_perusahaan', 'judul_pekerjaan', 'alamat','gaji',
        'waktu_bekerja', 'deskrpisi', 'image',
    ];

    public function image() {

        //cek file exist di folder tempat file image
        if (file_exists( public_path() . '/images/company/' .
        $this->image) && $this->image != null ) {
            //jika ada tampilkan gambar 
            return '/images/company/' . $this->image;
        } else {
            return url('/images/company/default_company.png');
        }
    }
    
    
}
