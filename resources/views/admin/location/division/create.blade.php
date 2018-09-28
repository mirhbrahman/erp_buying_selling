@extends('layouts.admin')

@section('content')
   
            <div class="card">
                <div class="card-header">
                    Add New Division / Province / State
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::open(['route'=>'sys-division.store','method'=>'POST'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,null,['required','class'=>'form-control'])}}
                    <label for="">Division / Province / State Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Add Division',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>

@endsection
