@extends('layouts.admin')
@section('content')

    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4" style="text-align: center; ">
                    <img src="{{ asset('img/250x250.png') }}" class="img-rounded img-responsive" />
                    <br />
                    <br />
                    <a href="#" class="btn btn-success btn-sm">Upload Picture</a>
                    <br />
                </div>
                <div class="col-md-8">
                    <div class="form-group col-md-8">
                        <h3>User Profile</h3>
                        <br />

                        <div class="col-sm-4">
                            <label>Name: </label>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ ucwords(Auth::user()->name) }}</p>
                        </div>

                        <div class="col-sm-4">
                            <label>Email: </label>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ Auth::user()->email }}</p>
                        </div>

                        <a href="{{ route('user-profile.edit', Auth::user()->id) }}" class="btn btn-secondary btn-sm pull-right"><i class="fa fa-gear"></i> Account Setting</a>

                    </div>
                </div>
            </div>
            <!-- ROW END -->


        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="{{ asset('js/jquery-1.11.1.js') }}"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>


@endsection
