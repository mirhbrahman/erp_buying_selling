<?php

namespace App\Http\Controllers\User\Bank;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Bank\MobileBank;
use App\Models\Admin\Location\SysCountry;
use App\Models\User\Bank\UserMobileBank;

class MobileBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.bank.mobile_bank.create')
                ->with('countries', SysCountry::all())
                ->with('mobilebanks', MobileBank::all());
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
            'country_id' => 'required',
            'mobile_bank_id' => 'required',
            'account_number' => 'required|min:2|max:191',
        ]);

        $userMobileBank = new UserMobileBank();

        $userMobileBank->country_id = strtolower($request->country_id);
        $userMobileBank->mobile_bank_id = $request->mobile_bank_id;
        $userMobileBank->account_number = $request->account_number;

        if ($userMobileBank->save()) {

            Session::flash('success', 'Mobile Bank create successfull');

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
        return view('user.bank.mobile_bank.edit')
                ->with('countries', SysCountry::all())
                ->with('mobilebanks', MobileBank::all())
                ->with('userMobileBank', UserMobileBank::find($id));
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
            'country_id' => 'required',
            'mobile_bank_id' => 'required',
            'account_number' => 'required|min:2|max:191',
        ]);

        $userMobileBank = UserMobileBank::find($id);

        $userMobileBank->country_id = strtolower($request->country_id);
        $userMobileBank->mobile_bank_id = $request->mobile_bank_id;
        $userMobileBank->account_number = $request->account_number;

        if ($userMobileBank->save()) {

            Session::flash('success', 'Mobile Bank update successfull');

        }

        return redirect()->route('user-bank-info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userMobileBank = UserMobileBank::find($id);

        if ($userMobileBank->delete()) {
            Session::flash('success', 'Mobile Bank delete successfull');
        }
        return redirect()->route('user-bank-info.index');
    }
}
