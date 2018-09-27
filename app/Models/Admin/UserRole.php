<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function getNameAttribute($value){
        return strtoupper($value);
    }
}
