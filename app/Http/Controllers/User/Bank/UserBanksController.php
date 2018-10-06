<?php

namespace App\Http\Controllers\User\Bank;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\Bank\UserEWallet;
use App\Models\User\Bank\UserBankInfo;
use App\Models\User\Bank\UserMobileBank;

class UserBanksController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        return view('user.bank.index')
                ->with('userbankinfos', UserBankInfo::where('user_id', $user_id)->get())
                ->with('userMobileBanks', UserMobileBank::where('user_id', $user_id)->get())
                ->with('userEWallets', UserEWallet::where('user_id', $user_id)->get());
    }
}
