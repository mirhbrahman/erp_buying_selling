<?php

namespace App\Http\Controllers\User\Bank;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Bank\UserBankInfo;
use App\Models\User\Bank\UserMobileBank;

class BankInformaionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.bank.bank_info.index')
                ->with('userbankinfos', UserBankInfo::all())
                ->with('userMobileBanks', UserMobileBank::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.bank.bank_info.create');
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
            'bank_name' => 'required|min:2|max:191',
            'account_name' => 'required|min:2|max:191',
            'account_number' => 'required|min:2|max:191',
            'iban_number' => 'required|min:2|max:191',
            'swift_code' => 'required|min:2|max:191',
            'bank_address' => 'required|min:2|max:191',
        ]);

        $userBankInfo = new UserBankInfo();

        $userBankInfo->bank_name = strtolower($request->bank_name);
        $userBankInfo->account_name = $request->account_name;
        $userBankInfo->account_number = $request->account_number;
        $userBankInfo->iban_number = $request->iban_number;
        $userBankInfo->swift_code = $request->swift_code;
        $userBankInfo->bank_address = $request->bank_address;
        $userBankInfo->slug = str_slug($request->bank_name);

        if ($userBankInfo->save()) {

            Session::flash('success', 'Bank Information create successfull');

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.bank.bank_info.edit')
                ->with('userbankinfo', UserBankInfo::find($id));
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
            'bank_name' => 'required|min:2|max:191',
            'account_name' => 'required|min:2|max:191',
            'account_number' => 'required|min:2|max:191',
            'iban_number' => 'required|min:2|max:191',
            'swift_code' => 'required|min:2|max:191',
            'bank_address' => 'required|min:2|max:191',
        ]);

        $userBankInfo = UserBankInfo::find($id);

        $userBankInfo->bank_name = strtolower($request->bank_name);
        $userBankInfo->account_name = $request->account_name;
        $userBankInfo->account_number = $request->account_number;
        $userBankInfo->iban_number = $request->iban_number;
        $userBankInfo->swift_code = $request->swift_code;
        $userBankInfo->bank_address = $request->bank_address;
        $userBankInfo->slug = str_slug($request->bank_name);

        if ($userBankInfo->save()) {

            Session::flash('success', 'Bank Information update successfull');

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
        $userBankInfo = UserBankInfo::find($id);

        if ($userBankInfo->delete()) {
            Session::flash('success', 'Bank Information delete successfull');
        }
        return redirect()->route('user-bank-info.index');
    }
}
