<?php

namespace App\Http\Controllers\User\Profile;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;
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
        return view('user.account.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        return view('user.profile.create')
                ->with('userProfile', UserProfile::where('user_id', $user_id)->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $user_profile = UserProfile::where('user_id', $user_id)->first();

        $this->validate($request, [
            'avater' => 'image| mimes:jpeg,jpg,png,bmp | max:1000',
        ]);

        if ($user_profile) {
            // Update...
            $user_profile->user_id = $user_id;
            $user_profile->work_number = $request->work_number ? $request->work_number : '';
            $user_profile->personal_number = $request->personal_number ? $request->personal_number : '';
            $user_profile->fax_number = $request->fax_number ? $request->fax_number : '';
            $user_profile->date_of_birth = $request->date_of_birth ? $request->date_of_birth : '';

            if ($avater= $request->file('avater')) {
                $avater->move('uploads/user/avater/', $user_profile->avater);
            }

            if ($user_profile->save()) {
                Session::flash('success', 'User profile update successfull');
            }

        } else {
            // Create...
            $user_profile = new UserProfile();
            $user_profile->user_id = $user_id;
            $user_profile->work_number = $request->work_number ? $request->work_number : '';
            $user_profile->personal_number = $request->personal_number ? $request->personal_number : '';
            $user_profile->fax_number = $request->fax_number ? $request->fax_number : '';
            $user_profile->date_of_birth = $request->date_of_birth ? $request->date_of_birth : '';

            if ($avater = $request->file('avater')) {
                $avater_name = str_slug(Auth::user()->name).'-'.time().'.'.$avater->getClientOriginalExtension();
                $user_profile->avater = $avater_name;
                $avater->move('uploads/user/avater/', $avater_name);
            }

            if ($user_profile->save()) {
                Session::flash('success', 'User profile create successfull');
            }
        }

        return redirect()->route('user-account.index');
    }
}
