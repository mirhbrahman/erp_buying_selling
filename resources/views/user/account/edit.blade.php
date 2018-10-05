@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Profile</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-account.update', $user->id) }}" method="post" enctype="" class="form-horizontal">
                    @csrf @method('put')

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" value="{{ ucwords(Auth::user()->name) }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="email" id="text-input" name="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Old Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="text-input" name="old_password" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">New Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="text-input" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Confirm Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="text-input" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Update" class="btn btn-sm btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
