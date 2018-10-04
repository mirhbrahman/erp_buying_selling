<?php

namespace App\Http\Controllers\User\Profile;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User\Profile\UserProfile;

class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.profile.index');
    }


    public function edit($id)
    {
        return view('user.profile.edit')
                ->with('user', Auth::user());
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
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|min:3|max:70',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'old_password' => 'required|min:6|max:50',
            'password' => 'required|min:6|max:50|confirmed',
            'password_confirmation' => 'required',

        ]);

        $user->name = strtolower($request->name);
        $user->email = $request->email;

        if ($user->email == $request->email) {
            $user->verification_token = "";
        } else {
            $user->verification_token = generateVerificationToken();
            $user->is_verify = User::UNVERIFY;
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
        } else {
            Session::flash('info', 'Please confirm your old password');
            return redirect()->back();
        }

        if ($user->save()) {
            Session::flash('success', 'Account setting update successfull');
        }

        return redirect()->route('user-profile.index');
    }

}
