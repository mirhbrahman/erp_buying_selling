@extends('layouts.admin') 
@section('content')
<div class="">
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1></h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{route('sys-village.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Village</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            All Village / Moholla
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Division/State</th>
                        <th>District/City</th>
                        <th>Upazila/Police Station</th>
                        <th>Union / Word</th>
                        <th>Village / Moholla</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($villages)) @foreach ($villages as $village)
                    <tr>
                        <td>{{$village->country->name}}</td>
                        <td>{{$village->division->name}}</td>
                        <td>{{$village->city->name}}</td>
                        <td>{{$village->policeStation->name}}</td>
                        <td>{{$village->word->name}}</td>
                        <td style="background:#ececec">{{$village->name}}</td>
                        <td>
                            <a style="margin-right:5px" href="{{route('sys-village.edit',$village->id)}}" class="btn btn-sm btn-outline-primary pull-left">Edit</a>                            {{Form::open(['route'=>['sys-village.destroy',$village->id],'method'=>'DELETE'])}} {{Form::submit('Delete',['onclick'=>"return
                            confirm('Are you sure you want to delete this item?');",'class'=>'btn btn-sm btn-outline-danger'])}}
                            {{Form::close()}}

                        </td>
                    </tr>
                    @endforeach @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- END DEFAULT DATATABLE -->
</div>
@endsection