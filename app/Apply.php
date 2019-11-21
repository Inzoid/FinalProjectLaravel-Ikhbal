<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'id','user_id','job_id'
    ];

    public function job() 
    {
        return $this->hasOne(Biodata::class, 'id', 'job_id');
    }

    public function user() 
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}




