<?php

namespace App\Http\Controllers\Admin\User;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Models\Admin\UserRole;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urs = UserRole::get()->pluck('name','id');
        return view('admin.user.create')
            ->with('urs', $urs);
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
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:30|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        // If contain user role
        $user->role_id = $request->role_id ? $request->role_id : 0;

        $user->is_active = $request->is_active ? 1 : 0;
        $user->is_admin = $request->is_admin ? 1 : 0;
        // Default verification
        $user->is_verify = User::UNVERIFY;
        $user->verification_token = User::generateVerificationToken();

        if ($user->save()) {
            $request->session()->flash('success', 'User create successful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $urs = UserRole::get()->pluck('name','id');
        return view('admin.user.edit')
            ->with('user', $user)
            ->with('urs', $urs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->name = $request->name;
        // If user provide new email need to be verify
        if ($user->email != $request->email) { 
            $user->email = $request->email;
            $user->is_verify = User::UNVERIFY;
            $user->verification_token = User::generateVerificationToken();
        }
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        // If contain user role
        $user->role_id = $request->role_id ? $request->role_id : 0;

        $user->is_active = $request->is_active ? 1 : 0;
        $user->is_admin = $request->is_admin ? 1 : 0;
        
        if ($user->save()) {
            $request->session()->flash('success', 'User update successful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        //User can not delete yourself
        if($user->id == Auth::user()->id){
            $request->session()->flash('info', 'You cannot delete yourself');
            return redirect()->back();
        }

        if($user->delete()){
            $request->session()->flash('success', 'User delete successfull');
        }
        return redirect()->route('users.index');
    }

    // Verify user by admin
    public function verifyByAdmin(Request $request, User $user)
    {
        $user->is_verify = User::VERIFY;
        $user->verification_token = null;
        // Verified user automaticaly activated
        $user->is_active = User::ACTIVE;
        
        if($user->save()){
            $request->session()->flash('success', 'User verified');
        }
        return redirect()->route('users.index');
    }
}
