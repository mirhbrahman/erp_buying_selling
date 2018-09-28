@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header">
                    Edit Add District / City
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::model($city,['route'=>['sys-city.update',$city->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,$city->country_id,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}
                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" required>
                        <option value="{{$city->division_id}}">{{$city->division->name}}</option>
                    </select>
                    <label for="">District / City Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update District / City',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
