@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header">
                    Update country
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::model($country,['route'=>['sys-country.update',$country->id],'method'=>'PUT'])}}
                    <label for="">Name</label>
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Country',['class'=>'btn btn-info'])}}
                    {{Form::close()}}
                </div>
            </div>
@endsection
