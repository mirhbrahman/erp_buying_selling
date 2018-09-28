@extends('layouts.admin')

@section('content')
            <div class="card panel-default">
                <div class="card-header">
                    <h4>Edit New Division / Province / State</h4>
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::model($division,['route'=>['sys-division.update',$division->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,null,['required','class'=>'form-control'])}}
                    <label for="">Division / Province / State Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Division',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

@endsection
