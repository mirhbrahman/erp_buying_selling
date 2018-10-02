<?php

namespace App\Http\Controllers\User\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Location\SysCountry;
use App\Models\User\Location\UserLocation;

class UserLocationsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user_location = UserLocation::where('user_id', Auth::user()->id)->first();
        return view('user.location.index')
        ->with('user_location', $user_location);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('user.location.create')
        ->with('countries', SysCountry::all());
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

        $user_location = UserLocation::where('user_id', $user_id)->first();
        if ($user_location) {
            // Update
            $user_location->user_id = $user_id ;
            $user_location->country_id = $request->country_id ;
            $user_location->division_id = $request->division_id ;
            $user_location->city_id = $request->city_id ;
            $user_location->police_station_id = $request->police_station_id ;
            $user_location->word_id = $request->word_id ;
            $user_location->village_id = $request->village_id ;
            if ($user_location->save()) {
                $request->session()->flash('success', 'Location update successfull');
            }
        }else{
            // Create
            $user_location = new UserLocation();
            $user_location->user_id = $user_id ;
            $user_location->country_id = $request->country_id ;
            $user_location->division_id = $request->division_id ;
            $user_location->city_id = $request->city_id ;
            $user_location->police_station_id = $request->police_station_id ;
            $user_location->word_id = $request->word_id ;
            $user_location->village_id = $request->village_id ;
            if ($user_location->save()) {
                $request->session()->flash('success', 'Location create successfull');
            }
        }

        return redirect()->route('user-location.index');
    }



}
