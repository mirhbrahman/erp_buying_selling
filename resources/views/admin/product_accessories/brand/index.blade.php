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
                        <li><a href="{{route('product-accessories-brand.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i>Add Product Brand</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Product Brand</div>

        <div class="card-body">
            @if ($brands)
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Brand</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td> <img width="64px" src="{{ $brand->brand_logo }}" alt=""> </td>
                        <td>{{ ucwords($brand->name) }}</td>
                        <td>{{ ucwords($brand->productType->name) }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="{{route('product-accessories-brand.edit', $brand->id)}}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-sm btn-outline-danger" href="{{route('product-accessories-brand.destroy', $brand->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>Delete</a>
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
