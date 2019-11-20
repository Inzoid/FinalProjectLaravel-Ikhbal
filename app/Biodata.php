<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Role;

class Biodata extends Model
{
    protected $fillable = [
        'user_id','nama', 'alamat','tempat_lahir','tgl_lahir','kota','negara',
        'kode_pos','keterangan','pendidikan','cv'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
