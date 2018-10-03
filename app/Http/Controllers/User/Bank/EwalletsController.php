<?php

namespace App\Http\Controllers\User\Bank;

use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Bank\EWallet;
use App\Http\Controllers\Controller;
use App\Models\User\Bank\UserEWallet;

class EwalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.bank.e_wallet.create')
                ->with('eWallets', EWallet::all());
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
            'e_wallet_id' => 'required',
            'ewallet_number' => 'required|min:2|max:191',
        ]);

        $userEWallet = new UserEWallet();

        $userEWallet->e_wallet_id = $request->e_wallet_id;
        $userEWallet->ewallet_number = $request->ewallet_number;

        if ($userEWallet->save()) {

            Session::flash('success', 'E-Wallet create successfull');

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
        return view('user.bank.e_wallet.edit')
                ->with('eWallets', EWallet::all())
                ->with('userEWallet', UserEWallet::find($id));
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
            'e_wallet_id' => 'required',
            'ewallet_number' => 'required|min:2|max:191',
        ]);

        $userEWallet = UserEWallet::find($id);

        $userEWallet->e_wallet_id = $request->e_wallet_id;
        $userEWallet->ewallet_number = $request->ewallet_number;

        if ($userEWallet->save()) {
            Session::flash('success', 'E-Wallet update successfull');
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
        $userEWallet = UserEWallet::find($id);

        if ($userEWallet->delete()) {
            Session::flash('success', 'E-Wallet delete successfull');
        }
        return redirect()->route('user-bank-info.index');
    }
}
