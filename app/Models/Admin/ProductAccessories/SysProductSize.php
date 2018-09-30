<?php

namespace App\Models\Admin\ProductAccessories;

use Illuminate\Database\Eloquent\Model;

class SysProductSize extends Model
{
    public function setNameAttribute($value=''){
        return strtolower($value);
    }
    public function getNameAttribute($value=''){
        return strtoupper($value);
    }
}
