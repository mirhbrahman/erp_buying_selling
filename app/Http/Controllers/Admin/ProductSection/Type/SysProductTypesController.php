<?php

namespace App\Http\Controllers\Admin\ProductSection\Type;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSection\SysProductType;

class SysProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_section.type.index')
                ->with('types', SysProductType::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_section.type.create');
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
            'name' => 'required|min:2|unique:sys_product_types',
        ]);

        $type = new SysProductType();

        $type->name = strtolower($request->name);
        $type->slug = str_slug($request->name);

        if ($type->save()) {
            Session::flash('success', 'Product type create successful');
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
        return view('admin.product_section.type.edit')
                ->with('type', SysProductType::find($id));
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
        $type = SysProductType::find($id);

        $this->validate($request, [
            'name' => 'required|min:2|unique:sys_product_types,name,' . $type->id,
        ]);

        $type->name = strtolower($request->name);
        $type->slug = str_slug($request->name);

        if ($type->save()) {
            Session::flash('success', 'Product type update successful');
        }

        return redirect()->route('product-section-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = SysProductType::find($id);

        if ($type->delete()) {
            Session::flash('success', 'Product type delete successful');
        }

        return redirect()->back();
    }
}
