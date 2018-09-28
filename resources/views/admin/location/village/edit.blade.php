@extends('layouts.admin')

@section('content')
            <div class="card">
                <div class="card-header">
                    Edit Village / Moholla
                </div>
                <div class="card-body">
                    @include('includes.errors.validation_errors')
                    {{Form::model($village,['route'=>['sys-village.update',$village->id],'method'=>'PUT'])}}
                    <label for="">Country</label>
                    {{Form::select('country_id',[''=>'Choose']+$countries,$village->country_id,['required','class'=>'form-control','onChange'=>"get_division(this.value);"])}}

                    <label for="">Division / Province / State Name</label>
                    <select class="form-control" name="division_id" id="devision" onChange ="get_city(this.value);" required>
                        <option value="{{$village->division_id}}">{{$village->division->name}}</option>
                    </select>

                    <label for="">District / City Name</label>
                    <select class="form-control" name="city_id" id="city" onChange ="get_police_station(this.value);"  required>
                        <option value="{{$village->city_id}}">{{$village->city->name}}</option>
                    </select>

                    <label for="">Upazila / Police Station Name</label>
                    <select class="form-control" name="police_station_id" id="police_station" onChange ="get_word(this.value);"  required>
                        <option value="{{$village->police_station_id}}">{{$village->policeStation->name}}</option>
                    </select>

                    <label for="">Union / Word Name</label>
                    <select class="form-control" name="word_id" id="word"  required>
                            <option value="{{$village->word_id}}">{{$village->word->name}}</option>
                    </select>

                    <label for="">Village / Moholla Name</label>
                    {{Form::text('name',null,['required','class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Update Village / Moholla',['class'=>'btn btn-info'])}}
                    {{Form::close()}}

                </div>
            </div>
@endsection

@section('scripts')
    @include('includes.sysLocationAjaxScript')
@endsection
