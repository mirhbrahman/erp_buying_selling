<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Size;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\SysProductSize;

class SysProductSizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.size.index')
                ->with('sizes', SysProductSize::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_accessories.size.create');
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
            'name' => 'required|min:1|max:200|unique:sys_product_sizes',
        ]);

        $size = new SysProductSize();

        $size->name = strtolower($request->name);
        $size->slug = str_slug($request->name);

        if ($size->save()) {
            Session::flash('success', 'Product size create successful');
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
        return view('admin.product_accessories.size.edit')
                ->with('size', SysProductSize::find($id));
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
        $size = SysProductSize::find($id);

        $this->validate($request, [
            'name' => 'required|min:1|max:200|unique:sys_product_sizes,name,' . $size->id,
        ]);

        $size->name = strtolower($request->name);
        $size->slug = str_slug($request->name);

        if ($size->save()) {
            Session::flash('success', 'Product size update successful');
        }

        return redirect()->route('product-accessories-size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = SysProductSize::find($id);

        if ($size->delete()) {
            Session::flash('success', 'Product size delete successful');
        }

        return redirect()->back();
    }
}
