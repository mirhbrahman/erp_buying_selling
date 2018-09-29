<?php

namespace App\Http\Controllers\Admin\ProductSection\Category;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSection\SysProductType;
use App\Models\Admin\ProductSection\SysProductCategory;

class SysProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_section.category.index')
                ->with('types', SysProductType::all())
                ->with('categories', SysProductCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_section.category.create')
                ->with('types', SysProductType::all());
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
            'type_id' => 'required',
            'name' => 'required|min:2',
        ]);

        $category = new SysProductCategory();

        $category->product_type_id = $request->type_id;
        $category->name = strtolower($request->name);
        $category->slug = str_slug($request->name);

        if ($category->save()) {
            Session::flash('success', 'Product category create successful ');
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
        return view('admin.product_section.category.edit')
                ->with('types', SysProductType::all())
                ->with('category', SysProductCategory::find($id));
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
        $category = SysProductCategory::find($id);

        $this->validate($request, [
            'type_id' => 'required',
            'name' => 'required|min:2',
        ]);

        $category->product_type_id = $request->type_id;
        $category->name = strtolower($request->name);
        $category->slug = str_slug($request->name);

        if ($category->save()) {
            Session::flash('success', 'Product category update successful ');
        }

        return redirect()->route('product-section-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SysProductCategory::find($id);

        if ($category->delete()) {
            Session::flash('success', 'Product category delete successful ');
        }
        return redirect()->back();
    }
}
