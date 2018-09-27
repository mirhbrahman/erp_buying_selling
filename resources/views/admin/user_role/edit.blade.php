@extends('layouts.admin') 
@section('content')
<div class="col-md-12" style="padding:0">
    <div class="card">
        <div class="card-header">Update User Role</div>

        <div class="card-body">
    @include('includes.errors.validation_errors')

            <form action="{{route('user-roles.update', $ur->id)}}" method="post" enctype="" class="form-horizontal">
                @csrf
                @method('put')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">User Role Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="name" value="{{$ur->name}}" class="form-control">
                    </div>
                </div>

                <div class="col-sm-12">
                    <input type="submit" value="Update User Role" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection