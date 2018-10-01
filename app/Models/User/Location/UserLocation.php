<?php

namespace App\Models\User\Location;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysCountry');
    }
    public function division()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysDivision');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysCity');
    }
    public function policeStation()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysPoliceStation');
    }
    public function word()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysWord');
    }
    public function village()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysVillage');
    }
}
