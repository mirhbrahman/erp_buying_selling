<?php

namespace App\Http\Controllers\Admin\ProductSection\SubCategory;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSection\SysProductType;
use App\Models\Admin\ProductSection\SysProductCategory;
use App\Models\Admin\ProductSection\SysProductSubCategory;

class SysProductSubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_section.sub_category.index')
                ->with('types', SysProductType::all())
                ->with('categories', SysProductCategory::all())
                ->with('subCategories', SysProductSubCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_section.sub_category.create')
                ->with('types', SysProductType::all())
                ->with('categories', SysProductCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required|min:2',
            'type_id' =>'required',
            'category_id' =>'required',
        ]);

        $subCategory = new SysProductSubCategory();

        $subCategory->name = strtolower($request->name);
        $subCategory->product_type_id = $request->type_id;
        $subCategory->product_category_id = $request->category_id;
        $subCategory->slug = str_slug($request->name);

        if ($subCategory->save()) {
            Session::flash('success', 'Product sub-category create successful ');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product_section.sub_category.edit')
                ->with('types', SysProductType::all())
                ->with('categories', SysProductCategory::all())
                ->with('subCategory', SysProductSubCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subCategory = SysProductSubCategory::find($id);

        $this->validate($request, [
            'name' =>'required|min:2|max:200',
            'type_id' =>'required',
            'category_id' =>'required',
        ]);

        $subCategory->name = strtolower($request->name);
        $subCategory->product_type_id = $request->type_id;
        $subCategory->product_category_id = $request->category_id;
        $subCategory->slug = str_slug($request->name);

        if ($subCategory->save()) {
            Session::flash('success', 'Product sub-category update successful ');
        }

        return redirect()->route('product-section-sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = SysProductSubCategory::find($id);

        if ($subCategory->delete()) {
            Session::flash('success', 'Product sub-category delete successful ');
        }

        return redirect()->back();
    }


    public function getCategoryAjax(Request $request)
    {
        if ($request->types_id) {
            $categories = SysProductCategory::where('product_type_id', $request->types_id)->get()->toArray();
            return $categories;
        } else {
            return 'not ok';
        }
    }
}
