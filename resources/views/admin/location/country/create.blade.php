@extends('layouts.admin') 
@section('content')
<div class="card">
    <div class="card-header">
        Add new country
    </div>
    <div class="card-body">
    @include('includes.errors.validation_errors') 
    {{Form::open(['route'=>'sys-country.store','method'=>'POST'])}}
        <label for="">Name</label> 
        {{Form::text('name',null,['class'=>'form-control'])}}
        <br> 
        {{Form::submit('Add Country',['class'=>'btn btn-info'])}} 
    {{Form::close()}}
    </div>
</div>
@endsection