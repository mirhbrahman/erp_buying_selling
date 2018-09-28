@extends('layouts.admin') 
@section('content')
<div class="col-sm-12">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                Add Mobile Bank Type
            </div>
            <div class="card-body">
    @include('includes.errors.validation_errors') {{Form::open(['route'=>'mobile-bank.store','method'=>'POST'])}}
                <label for="">Mobile Bank Name / Type</label> {{Form::text('name',null,['required','class'=>'form-control'])}}
                <br> {{Form::submit('Add Mobile Bank',['class'=>'btn btn-info'])}} {{Form::close()}}
            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                Mobile Bank Types
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <th>Mobile Bank Type</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @if (count($mobileBanks)) @foreach ($mobileBanks as $mobileBank)
                        <tr>
                            <td>{{$mobileBank->name}}</td>
                            <td>
                                {{Form::open(['route'=>['mobile-bank.destroy',$mobileBank->id],'method'=>'DELETE'])}}
                                <a href="{{route('mobile-bank.edit',$mobileBank->id)}}" class="btn btn-sm btn-outline-info">Edit</a>                                
                                {{Form::submit('Delete',['class'=>'btn btn-sm btn-outline-danger', "onclick" => "return confirm('Are
                                you sure you want to delete this item?');"])}} 
                                {{Form::close()}}
                            </td>
                        </tr>
                        @endforeach @else
                        <tr>
                            <td colspan="2">No data found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection