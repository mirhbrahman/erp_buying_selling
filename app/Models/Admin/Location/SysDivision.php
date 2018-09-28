<?php

namespace App\Models\Admin\Location;

use Illuminate\Database\Eloquent\Model;

class SysDivision extends Model
{
    protected $fillable = ['country_id','name'];

    public function getNameAttribute($value='')
    {
        return strtoupper($value);
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Admin\Location\SysCountry');
    }
}
