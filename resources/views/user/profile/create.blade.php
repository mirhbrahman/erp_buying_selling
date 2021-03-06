@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Profile</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-profile.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Work Phone No</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="work_number" value="{{ $userProfile ? $userProfile->work_number : '' }}" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Personal Phone No</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="personal_number" value="{{ $userProfile ? $userProfile->personal_number : '' }}" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Fax Number</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="fax_number" value="{{ $userProfile ? $userProfile->fax_number : '' }}" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Date of Birth</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" name="date_of_birth" value="{{ $userProfile ? $userProfile->date_of_birth : '' }}" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Old Image</label>
                            </div>
                            <div class="col-12 col-md-9">
                                @if ($userProfile)
                                    <img src="{{ $userProfile->avater }}" width="200px" alt="Image not found" class="img-rounded img-responsive" />
                                    @else
                                    <img src="{{ asset('imgs/default_avatar.png') }}" width="200px" alt="Image not found" class="img-rounded img-responsive" />
                                @endif
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
