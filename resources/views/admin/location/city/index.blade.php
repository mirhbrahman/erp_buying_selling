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
                                    <li><a href="{{route('sys-city.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add City</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="card">
            <div class="card-header">
                All District / City
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Country Name</th>
                            <th>Division / State Name</th>
                            <th>District / City Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($cities))
                            @foreach ($cities as $city)
                                <tr>
                                    <td>{{$city->country->name}}</td>
                                    <td>{{$city->division->name}}</td>
                                    <td style="background:#ececec">{{$city->name}}</td>
                                    <td>
                                        <a style="margin-right:5px" href="{{route('sys-city.edit',$city->id)}}" class="btn btn-sm btn-outline-primary pull-left">Edit</a>

                                        {{Form::open(['route'=>['sys-city.destroy',$city->id],'method'=>'DELETE'])}}
                                        {{Form::submit('Delete',['onclick'=>"return confirm('Are you sure you want to delete this item?');",'class'=>'btn btn-sm btn-outline-danger'])}}
                                        {{Form::close()}}

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->
    </div>
@endsection
