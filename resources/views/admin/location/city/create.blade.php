@extends('layouts.admin')

@section('content')
           <div class="card">
                <div class="card-header">
                    Add New District / City
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::open(['route'=>'sys-city.store','method'=>'POST'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,null,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}
                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" required>
                        <option value="">Choose</option>
                    </select>
                    <label for="">District / City Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add District / City',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
