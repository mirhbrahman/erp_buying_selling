<?php

namespace App\Models\User\Bank;

use Illuminate\Database\Eloquent\Model;

class UserMobileBank extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysCountry');
    }

    public function mobileBank()
    {
        return $this->belongsTo('App\Models\Admin\Bank\MobileBank');
    }
}
