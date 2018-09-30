<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSection\SysProductCategory;
use App\Models\Admin\ProductSection\SysProductSubCategory;

class ProductSectionController extends Controller
{
    public function getCategory(Request $request)
    {
        $type_id = $request->type_id ? $request->type_id : 0;
        if ($type_id) {
            $cats = SysProductCategory::where('product_type_id', $type_id)->get()->toArray();
            return $cats;
        } else {
            return 'not ok';
        }
    }

    public function getSubCategory(Request $request)
    {
        $cat_id = $request->cat_id ? $request->cat_id : 0;
        if ($cat_id) {
            $sub_cats = SysProductSubCategory::where('product_category_id', $cat_id)->get()->toArray();
            return $sub_cats;
        } else {
            return 'not ok';
        }
    }
}
