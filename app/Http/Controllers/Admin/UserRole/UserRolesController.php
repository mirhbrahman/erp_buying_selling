<?php

namespace App\Http\Controllers\Admin\UserRole;

use Illuminate\Http\Request;
use App\Models\Admin\UserRole;
use App\Http\Controllers\Controller;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user_role.index')
            ->with('userRoles', UserRole::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_role.create');
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
            'name' => 'required|min:2|max:200|unique:user_roles',
        ]);
  
        $userRole = new UserRole();
        $userRole->name = strtolower($request->name);
  
        if ($userRole->save()) {
            $request->session()->flash('success', 'User role create successful');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userRole)
    {
        return view('admin.user_role.edit')
          ->with('ur', $userRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:200|unique:user_roles,name,'.$userRole->id,
        ]);
  
        $userRole->name = strtolower($request->name);
  
        if ($userRole->save()) {
            $request->session()->flash('success', 'User role update successful');
        }
        return redirect()->route('user-roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserRole $userRole)
    {
        if($userRole->delete()){
            $request->session()->flash('success', 'User role delete successfull.');
        }
        return redirect()->back();
    }
}
