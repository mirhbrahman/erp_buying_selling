@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Your location</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{route('product-location.store')}}" method="post" enctype="" class="form-horizontal">
                    @csrf

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Country</label></div>
                        <div class="col-12 col-md-9">
                            <select name="country_id" id="country" class="form-control" onchange="get_division(this.value)">
                                <option value="">Please select</option>
                                @if ($countries)
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ ucwords($country->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Division/State</label></div>
                        <div class="col-12 col-md-9">
                            <select name="division_id" id="devision" class="form-control" onchange="get_city(this.value)">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">District/City</label></div>
                        <div class="col-12 col-md-9">
                            <select name="city_id" id="city" class="form-control" onchange="get_police_station(this.value)">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Upazila/Police Station</label></div>
                        <div class="col-12 col-md-9">
                            <select name="police_station_id" id="police_station" class="form-control" onchange="get_word(this.value)">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Union/Word</label></div>
                        <div class="col-12 col-md-9">
                            <select name="word_id" id="word" class="form-control" onchange="get_village(this.value)">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Village/Moholla</label></div>
                        <div class="col-12 col-md-9">
                            <select name="village_id" id="village" class="form-control">
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Submit" class="btn btn-sm btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript');
@endsection
