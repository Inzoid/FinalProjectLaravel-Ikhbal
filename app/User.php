<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Role;
use App\Biodata;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'users';
    protected $fillable = [
        'email', 'password','first_name','last_name','tanggal_lahir'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                   abort(401, 'This action is unauthorized');
        }
            return $this->hasRole($roles) ||
                   abort(401, 'This action is unauthorized');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function img_users()
    {
        //cek file exist di folder img
        if (file_exists(public_path().'/images/users/'.$this->profile_image) && $this->profile_image != null) {
            //jika ada tapilkan image hasil upload
            return url('/images/users/'.$this->profile_image);
        }else {
            //jika tidak ada, tampilkan gambar default
            return url('/images/user.png');
        }
        
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    public function apply() 
    {
        return $this->belongsTo(Apply::class, 'id', 'user_id');
    }
}
