<?php

namespace App\Http\Controllers\Admin\Bank\MobileBank;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bank\SysMobileBank;


class MobileBanksController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $mobileBanks = MobileBank::all();
        return view('admin.bank.mobile_bank.index',compact('mobileBanks'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:2|max:100|unique:mobile_banks',
        ],[
            'name.required'=>'The Mobile Bank Name / Type field is required.'
        ]);


        if(MobileBank::create($request->all())){
            Session::flash('success','Mobile Bank create successfull.');
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
        return view('admin.bank.mobile_bank.edit')
        ->with('mobileBank',MobileBank::find($id));
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
        $mobileBank = MobileBank::find($id);
        $this->validate($request,[
            'name' => 'required|min:2|max:100|unique:mobile_banks,name,'.$mobileBank->id,
        ],[
            'name.required'=>'The Mobile Bank Name / Type field is required.'
        ]);

        if($mobileBank->update($request->all())){
            Session::flash('success','Mobile Bank update successfull.');
        }

        return redirect()->route('mobile-bank.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $mobileBank = MobileBank::find($id);

        if($mobileBank->delete()){
            Session::flash('success','Mobile Bank delete successfull.');
        }

        return redirect()->route('mobile-bank.index');
    }

}
