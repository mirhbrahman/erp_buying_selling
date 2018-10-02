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
        <a href="{{ route('product.imageUpload.index') }}">Image</a>
        <div class="card-body">
    @include('includes.errors.validation_errors')
            <form action="{{route('products.store')}}" method="post" enctype="" class="form-horizontal">
                {{ csrf_field() }}

                <div class="col-sm-12" style="padding:0">
                    <div class="col-sm-6" style="padding:0;">
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
                                <label for="text-input" class="form-control-label">Product ID</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="product_id" value="{{ generate_product_id() }}" disabled class="form-control">
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
                                <select name="product_type" id="type" class="form-control" onchange="get_category(this.value); get_product_brand(this.value)">
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
                                <select name="product_category" id="category" class="form-control" onchange="get_sub_category(this.value)">
                                    <option value="">Please select</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="role-input" class=" form-control-label">Sub-Category</label></div>
                            <div class="col-12 col-md-9">
                                <select name="product_sub_category" id="sub_category" class="form-control">
                                    <option value="">Please select</option>
                                </select>
                            </div>
                        </div>
                        <hr>


                        <div class="row form-group">
                            <div class="col col-md-12">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label " style="margin-right:5px">
                                      <input type="radio" id="is_brand" name="is_brand" value="1" class="form-check-input">Brand
                                    </label>
                                    <label for="inline-radio2" class="form-check-label ">
                                      <input type="radio" id="non_brand" name="is_brand" value="0" class="form-check-input">Non-Brand
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="brand_view" style="display:none">
                            <div class="form-group">
                                <div class="col col-md-3"><label for="role-input" class=" form-control-label">Product Brand</label></div>
                                <div class="col-12 col-md-9">
                                    <p style="margin-bottom:5px">Please select produce type before brand</p>
                                    <select name="product_brand" id="product_brand" class="form-control">
                                        <option value="">Please select</option>
                                    </select>
                                </div>
                            </div>


                            <div class="from_group" style="margin-top:5px">
                                 <div class="col col-md-3"><label for="role-input" class=" form-control-label">Brand Type</label></div>
                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                        <label for="inline-radio1" class="form-check-label " style="margin-right:5px">
                                                  <input type="radio" id="" name="brand_type" value="1" class="form-check-input">Genuine
                                                </label>
                                        <label for="inline-radio2" class="form-check-label ">
                                                  <input type="radio" id="" name="brand_type" value="0" class="form-check-input">Copy
                                                </label>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="col-sm-6" style="padding-right:0">
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
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Product Weight</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="product_weight" value="{{old('product_weight')}}" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Key Features</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="text-input" name="product_key_features" value="{{old('product_key_features')}}" class="form-control"
                                    placeholder="Multiple values separated by comma (,)">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class="form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" name="product_description" id="" cols="30" rows="2">{{old('product_description')}}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-12">
                    <button type="submit" name="action" value="next" class="btn btn-primary pull-right">Next</button>
                    <button style="margin-right:5px;" type="submit" name="action" value="save" class="btn btn-success pull-right">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
    @include('includes.ajaxs.productSectionAjaxScript')
    @include('includes.ajaxs.productAccessoriesAjaxScript')
<script src="{{asset('js/multiple-select.js')}}"></script>
<script>
    $('.multiple_select').multipleSelect();
    $(document).ready(function(){
    $("#non_brand").click(function(){
        $("#brand_view").hide(100);
    });
    $("#is_brand").click(function(){
        $("#brand_view").show(100);
    });
});

</script>
@endsection