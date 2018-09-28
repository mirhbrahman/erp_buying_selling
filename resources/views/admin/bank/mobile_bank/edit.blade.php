@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h4>Edit Mobile Bank</h4>
            </div>
            <div class="card-body">
                @include('includes.errors.validation_errors')
                {{Form::model($mobileBank,['route'=>['mobile-bank.update',$mobileBank->id],'method'=>'PUT'])}}
                <label for="">Mobile Bank Name / Type</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update Mobile Bank',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
