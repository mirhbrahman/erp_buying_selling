@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{ route('product-location.create') }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Update Location</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Location Informations</div>

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><label for="">Country</label></td>
                            <td>{{ isset($user_location->country) ?  $user_location->country->name : ''}}</td>
                        </tr>
                        <tr>
                            <td><label for="">Division/State</label></td>
                            <td>{{ isset($user_location->division) ? $user_location->division->name : '' }}</td>
                        </tr>
                        <tr>
                            <td><label for="">District/City</label></td>
                            <td>{{ isset($user_location->city) ? $user_location->city->name : '' }}</td>
                        </tr>
                        <tr>
                            <td><label for="">Upazila/Police Station</label></td>
                            <td>{{ isset($user_location->policeStation) ? $user_location->policeStation->name : '' }}</td>
                        </tr>
                        <tr>
                            <td><label for="">Union/Word</label></td>
                            <td>{{ isset($user_location->word) ? $user_location->word->name : '' }}</td>
                        </tr>
                        <tr>
                            <td><label for="">Village/Moholla</label></td>
                            <td>{{ isset($user_location->village) ? $user_location->village->name : '' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
