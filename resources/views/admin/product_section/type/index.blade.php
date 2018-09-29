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
                        <li><a href="{{ route('product-section-type.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add Product Type</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Product Type</div>

        <div class="card-body">
            @if ($types)
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                    <tr>
                        <td>{{ ucwords($type->name) }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('product-section-type.edit', $type->id) }}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('product-section-type.destroy', $type->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i>Delete</a>
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
