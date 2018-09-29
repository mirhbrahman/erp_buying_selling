<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Color;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\SysProductColor;

class SysProductColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.color.index')
                ->with('colors', SysProductColor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_accessories.color.create');
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
            'name' => 'required|min:2',
            'color_code' => 'required',
            'pantone_code' => 'required|min:2',
        ]);

        $color = new SysProductColor();

        $color->name = strtolower($request->name);
        $color->color_code = $request->color_code;
        $color->pantone_code = $request->pantone_code;

        if ($color->save()) {
            Session::flash('success', 'Product color create successful');
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
        return view('admin.product_accessories.color.edit')
                ->with('color', SysProductColor::find($id));
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
        $color = SysProductColor::find($id);

        $this->validate($request, [
            'name' => 'required|min:2',
            'color_code' => 'required',
            'pantone_code' => 'required|min:2',
        ]);

        $color->name = strtolower($request->name);
        $color->color_code = $request->color_code;
        $color->pantone_code = $request->pantone_code;

        if ($color->save()) {
            Session::flash('success', 'Product color update successful');
        }

        return redirect()->route('product-accessories-color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = SysProductColor::find($id);

        if ($color->delete()) {
            Session::flash('success', 'Product color delete successful');
        }

        return redirect()->back();
    }
}
