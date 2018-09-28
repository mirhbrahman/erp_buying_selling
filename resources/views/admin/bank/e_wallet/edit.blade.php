@extends('layouts.admin')

@section('content')
    <div class="">
        <div class="card">
            <div class="card-header">
                <h4>Edit E-Wallet</h4>
            </div>
            <div class="card-body">
                @include('includes.errors.validation_errors')
                {{Form::model($eWallet,['route'=>['e-wallet.update',$eWallet->id],'method'=>'PUT'])}}
                <label for="">E-Wallet Name / Type</label>
                {{Form::text('name',null,['required','class'=>'form-control'])}}
            <br>
                {{Form::submit('Update E-Wallet',['class'=>'btn btn-info'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
