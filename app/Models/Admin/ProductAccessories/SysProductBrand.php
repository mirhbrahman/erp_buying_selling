<?php

namespace App\Models\Admin\ProductAccessories;

use Illuminate\Database\Eloquent\Model;

class SysProductBrand extends Model
{
    public function productType()
    {
        return $this->belongsTo('App\Models\Admin\ProductSection\SysProductType');
    }

    public function getBrandLogoAttribute($value)
    {
        return asset('uploads/product_accessories/brand_logo/' . $value);
    }
}
