@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Profile</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-profile.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                    <label for="">Phone Number</label>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Work</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="work_number" value="{{ $userProfile->work_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">personal</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="personal_number" value="{{ $userProfile->personal_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Fax Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" name="fax_number" value="{{ $userProfile->fax_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Date of Birth</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" name="date_of_birth" value="{{ $userProfile->date_of_birth }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Old Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <img src="{{ $userProfile->avater }}" alt="" width="200px">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">New Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" name="avater" value="" class="btn btn-sm form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Update Profile" class="btn btn-sm btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
