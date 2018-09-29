@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Product Sub-Category</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{route('product-section-sub-category.update', $subCategory->id)}}" method="post" enctype="" class="form-horizontal">
                    @csrf @method('put')

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Type</label></div>
                        <div class="col-12 col-md-9">
                            <select name="type_id" id="type" class="form-control">
                                <option value="">Please select</option>
                                @if ($types)
                                    @foreach ($types as $type)
                                        <option {{ $subCategory->product_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ ucwords($type->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    {{-- <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Category</label></div>
                        <div class="col-12 col-md-9">
                            <select name="category_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div> --}}

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Category</label></div>
                        <div class="col-12 col-md-9">
                            <select name="category_id" id="category" class="form-control">
                                <option value="{{ $subCategory->product_category_id }}">{{ $subCategory->productCategory->name }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="name" value="{{ ucwords($subCategory->name) }}" class="form-control">
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

@section('scripts')
    <script type="text/javascript">
        $('#type').on('change', function(){
            var type_id = $(this).val();
            $.ajax({
                url: "{{ route('category-ajax') }}",
                type: "get",
                data: {types_id: type_id},
                success: function(data) {
                    if (data) {
                        $('#category').html("<option value=\"\">Please select</option>");
                        $.each(data, function(key, value) {
                            $('#category')
                            .append($("<option></option>")
                            .attr("value",value.id)
                            .text(value.name.toUpperCase()));
                        });
                    }
                }
            });
        });
    </script>
@endsection
