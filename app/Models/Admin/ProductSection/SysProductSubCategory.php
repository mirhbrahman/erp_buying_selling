<?php

namespace App\Models\Admin\ProductSection;

use Illuminate\Database\Eloquent\Model;

class SysProductSubCategory extends Model
{
    public function productType()
    {
        return $this->belongsTo('App\Models\Admin\ProductSection\SysProductType');
    }

    public function productCategory()
    {
        return $this->belongsTo('App\Models\Admin\ProductSection\SysProductCategory');
    }
}
