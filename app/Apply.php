<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [
        'user_id','job_id','status_apply'
    ];

    public function company() 
    {
        return $this->hasOne(Company::class, 'id', 'job_id');
    }

    public function user() 
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}




