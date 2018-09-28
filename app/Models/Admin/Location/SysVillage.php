<?php

namespace App\Models\Admin\Location;

use Illuminate\Database\Eloquent\Model;

class SysVillage extends Model
{
    protected $fillable = ['country_id','division_id','city_id','police_station_id','word_id','name'];

    public function getNameAttribute($value='')
    {
        return strtoupper($value);
    }
    
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
}
