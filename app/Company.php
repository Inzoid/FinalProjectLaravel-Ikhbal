<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'nama_perusahaan', 'judul_pekerjaan', 'alamat','gaji',
        'waktu_bekerja', 'deskrpisi', 'image',
    ];

    
    
}
