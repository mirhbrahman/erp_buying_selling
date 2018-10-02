@extends('layouts.admin') 
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet"
    type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet"
    type="text/css" />
<style type="text/css">
    .main-section {
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 20px #c1c1c1;
    }

    .fileinput-remove,
    .fileinput-upload {
        display: none;
    }
</style>
<div class="col-md-12" style="padding:0">
    <div class="card">
        <div class="card-header">Product Image</div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-10 col-sm-12 col-11 main-section">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="file-loading">
                            <input id="file-1" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="2">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <a href="" class="btn btn-info pull-right">Next</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    

    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
@endsection