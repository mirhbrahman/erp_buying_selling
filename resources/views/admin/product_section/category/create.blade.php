@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Create Product Category</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{route('product-section-category.store')}}" method="post" enctype="" class="form-horizontal">
                    @csrf

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Type</label></div>
                        <div class="col-12 col-md-9">
                            <select name="type_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($types)
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ ucwords($type->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" value="{{old('name')}}" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Submit" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
