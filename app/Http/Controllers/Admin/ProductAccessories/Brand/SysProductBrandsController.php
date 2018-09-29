<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Brand;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\SysProductBrand;
use App\Models\Admin\ProductSection\SysProductType;

class SysProductBrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.brand.index')
                ->with('brands', SysProductBrand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_accessories.brand.create')
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
            'name' => 'required|min:2|max:191',
            'type' => 'required',
            'brand_logo' => 'required|image',
        ]);

        $brand = new SysProductBrand();

        $brand->product_type_id = $request->type;
        $brand->name = strtolower($request->name);
        $brand->slug = str_slug($request->name);

        if ($logo = $request->file('brand_logo')) {
            $brand_logo = str_slug($request->name.' '.time()).'.'.$logo->getClientOriginalExtension();
            $brand->brand_logo = $brand_logo;
            $logo->move('uploads/product_accessories/brand_logo/', $brand_logo);
        }

        if ($brand->save()) {
            Session::flash('success', 'Product brand create successful');
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
        return view('admin.product_accessories.brand.edit')
                ->with('types', SysProductType::all())
                ->with('brand', SysProductBrand::find($id));
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
        $this->validate($request, [
            'name' => 'required|min:2|max:191',
            'type' => 'required',
        ]);

        $brand = SysProductBrand::find($id);

        $brand->product_type_id = $request->type;
        $brand->name = strtolower($request->name);
        $brand->slug = str_slug($request->name);

        if ($logo = $request->file('brand_logo')) {
            $logo->move('uploads/product_accessories/brand_logo/', $brand->brand_logo);
        }

        if ($brand->save()) {
            Session::flash('success', 'Product brand update successful');
        }

        return redirect()->route('product-accessories-brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = SysProductBrand::find($id);

        if ($brand->delete()) {
            unlink('uploads/product_accessories/brand_logo/' . $brand->getOriginal('brand_logo'));
            Session::flash('success', 'Product brand delete successful');
        }

        return redirect()->back();
    }
}
