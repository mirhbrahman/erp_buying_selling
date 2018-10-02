<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Default const
    const ACTIVE = true;
    const DEACTIVE = false;
    const VERIFY = true;
    const UNVERIFY = false;
    const ADMIN = true;
    const REGULAR = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generateVerificationToken(){
        return str_random(60);
    }

    public function role(){
        return $this->belongsTo('App\Models\Admin\UserRole', 'role_id');
    }

    public function isActive(){
        return $this->is_active;
    }
    public function isVerified(){
        return $this->is_verify;
    }
    public function isAdmin(){
        return $this->is_admin;
    }

    // Supplier
    public function isSupplier(){
        if($this->role){
            return $this->role->name == 'SUPPLIER';
        }
    }
}
