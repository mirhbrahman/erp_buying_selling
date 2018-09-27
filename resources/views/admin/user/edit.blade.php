@extends('layouts.admin') 
@section('content')
<div class="col-md-12" style="padding:0">
    <div class="card">
        <div class="card-header">Update Users</div>

        <div class="card-body">
    @include('includes.errors.validation_errors')

            <form action="{{route('users.update', $user->id)}}" method="post" enctype="" class="form-horizontal">
                {{ csrf_field() }} @method('put')

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" value="{{$user->name}}" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="email" id="email-input" name="email" value="{{$user->email}}" class="form-control">

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" id="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
                    <div class="col-12 col-md-9"><input type="password" id="cpassword" name="password_confirmation" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">User Role</label></div>
                        <div class="col-12 col-md-9">
                            <select name="role_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($urs)
                                    @foreach ($urs as $key=> $value)
                                        <option value="{{$key}}" @if ($user->role_id == $key)
                                            selected
                                        @endif>{{$value}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Is Active</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="is_active" name="is_active" value="1" class="form-check-input" {{$user->is_active ? 'checked': ''}} >
                </label>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Is Admin</label></div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="checkbox1" class="form-check-label ">
                  <input type="checkbox" id="is_admin" name="is_admin" value="1" class="form-check-input" {{$user->is_admin ? 'checked': ''}}>
                </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <input type="submit" value="Update User" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection