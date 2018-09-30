@extends('layouts.admin') 
@section('styles')
<link rel="stylesheet" href="{{asset('css/multiple-select.css')}}">
@endsection
 
@section('content')
<style>
    .form-control {
        display: block;
        width: 100%;
        padding: .175rem .25rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    select.form-control:not([size]):not([multiple]) {
        height: auto;
    }

    .form-group {
        margin-bottom: .50rem;
    }
</style>

<div class="col-md-12" style="padding:0">
    <div class="card">
        <div class="card-header">Create Your Product</div>

        <div class="card-body">
    @include('includes.errors.validation_errors')
            <form action="{{route('products.store')}}" method="post" enctype="" class="form-horizontal">
                {{ csrf_field() }}

                <div class="col-sm-12" style="padding:0">
                    <div class="col-sm-6" style="padding:0">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Supplier</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p style="margin:0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Product Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="product_title" value="{{old('title')}}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Type</label></div>
                            <div class="col-12 col-md-9">
                                <select name="type_id" id="type" class="form-control" onchange="get_category(this.value)">
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
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="category_id" id="category" class="form-control" onchange="get_sub_category(this.value)">
                                    <option value="">Please select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Sub-Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="sub_category_id" id="sub_category" class="form-control">
                                    <option value="">Please select</option>
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Product Size</label></div>
                            <div class="col-12 col-md-9">
                                <select name="product_sizes[]" id="" class="form-control multiple_select" multiple>
                                    @if ($product_sizes)
                                        @foreach ($product_sizes as $ps)
                                            <option value="{{ $ps->id }}">{{ $ps->name }}</option>
                                        @endforeach
                                    @endif    
                                  
                                </select>
                            </div>
                        </div>

                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Product Color</label></div>
                            <div class="col-12 col-md-9">
                                <select name="product_colors[]" id="" class="form-control multiple_select" multiple>
                                    @if ($product_colors)
                                        @foreach ($product_colors as $pc)
                                            <option value="{{ $pc->id }}">{{ $pc->name }} | {{ $pc->pantone_code }}</option>
                                        @endforeach
                                    @endif    
                                  
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6" style="padding:0">

                    </div>
                </div>

                <div class="col-sm-12">
                    <input type="submit" value="Create User Role" class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
    @include('includes.ajaxs.productSectionAjaxScript')
<script src="{{asset('js/multiple-select.js')}}"></script>
<script>
    $('.multiple_select').multipleSelect();

</script>
@endsection