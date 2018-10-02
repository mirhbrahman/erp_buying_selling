<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\SysProductBrand;

class ProductAccessoriesController extends Controller
{
    public function getBrand(Request $request)
    {
        $type_id = $request->type_id ? $request->type_id : 0;
        if ($type_id) {
            $brands = SysProductBrand::where('product_type_id', $type_id)->get()->toArray();
            return $brands;
        } else {
            return 'not ok';
        }
    }

}
