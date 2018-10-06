@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Profile
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if ($userProfile)
                        <img src="{{ $userProfile->avater }}" alt="Image not found" class="img-rounded img-responsive" />
                    @else
                        <img src="{{ asset('imgs/default_avatar.png') }}" alt="Image not found" class="img-rounded img-responsive" />
                    @endif

                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td><b>{{ ucwords(Auth::user()->name) }}</b></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><b>{{ Auth::user()->email }}</b></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>
                                <p style="margin:0px;"><span>Work: </span> {{ $userProfile ? $userProfile->work_number : '' }}</p>
                                <p style="margin:0px;"><span>Personal: </span> {{ $userProfile ? $userProfile->personal_number : '' }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>Fax Number</td>
                            <td>{{ $userProfile ? $userProfile->fax_number : ''}}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>{{ $userProfile ? $userProfile->date_of_birth : '' }}</td>
                        </tr>
                    </table>
                    <div class="pull-right">
                        <a href="{{ route('user-profile.create') }}" class="btn btn-success btn-sm"><i class="fa fa-wrench"></i> Profile Setting</a>
                    </div>

                </div>
            </div>
            <!-- ROW END -->

        </div>

        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="{{ asset('js/jquery-1.11.1.js') }}"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>


@endsection
