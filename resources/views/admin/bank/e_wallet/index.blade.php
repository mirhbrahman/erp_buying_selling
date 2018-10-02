@extends('layouts.admin') 
@section('content')
<div class="col-sm-12">
    <div class="col-sm-6">

        <div class="card">
            <div class="card-header">
                Add E-Wallet Type
            </div>
            <div class="card-body">
    @include('includes.errors.validation_errors') {{Form::open(['route'=>'e-wallet.store','method'=>'POST'])}}
                <label for="">E-Wallet Name / Type</label> {{Form::text('name',null,['required','class'=>'form-control'])}}
                <br> {{Form::submit('Add E-Wallet',['class'=>'btn btn-info'])}} {{Form::close()}}
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                E-Wallet Types
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>E-Wallet Type</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($eWallets)) @foreach ($eWallets as $eWallet)
                        <tr>
                            <td>{{$eWallet->name}}</td>
                            <td>
                                {{Form::open(['route'=>['e-wallet.destroy',$eWallet->id],'method'=>'DELETE'])}}
                                <a href="{{route('e-wallet.edit',$eWallet->id)}}" class="btn btn-sm btn-outline-info">Edit</a>                                
                                {{Form::submit('Delete',['class'=>'btn btn-sm btn-outline-danger', "onclick" => "return
                                confirm('Are you sure you want to delete this item?');"])}} 
                                {{Form::close()}}
                            </td>
                        </tr>
                        @endforeach 
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection