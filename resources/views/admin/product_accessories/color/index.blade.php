@extends('layouts.admin')
@section('content')
<div class="col-md-12" style="padding:0">
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
                        <li><a href="{{route('product-accessories-color.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i>Add Product Color</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Product Color</div>

        <div class="card-body">
            @if ($colors)
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Color</th>
                        <th>Pantone Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $color)
                    <tr>
                        <td>{{ ucwords($color->name) }}</td>
                        <td>
                            <div style="width: 30px; height: 30px; background-color: {{$color->color_code}}; border: 1px solid black"></div>
                        </td>
                        <td>{{ $color->pantone_code }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="{{route('product-accessories-color.edit', $color->id)}}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-sm btn-outline-danger" href="{{route('product-accessories-color.destroy', $color->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
