<?php

namespace App\Models\Admin\ProductSection;

use Illuminate\Database\Eloquent\Model;

class SysProductCategory extends Model
{
    public function productType()
    {
        return $this->belongsTo('App\Models\Admin\ProductSection\SysProductType');
    }
}
