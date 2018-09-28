@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header">
                    Add Upazila / Police Station
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::open(['route'=>'sys-police-station.store','method'=>'POST'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,null,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}

                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" onChange ="get_city(this.value);" required>
                        <option value="">Choose</option>
                    </select>

                    <label for="">District / City Name</label>
                    <select class="form-control" name="city_id" id="city"  required>
                        <option value="">Choose</option>
                    </select>

                    <label for="">Upazila / Police Station Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add Upazila / Police Station',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>
@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
