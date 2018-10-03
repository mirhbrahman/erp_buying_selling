@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Bank Info</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-bank-info.update', $userbankinfo->id) }}" method="post" enctype="" class="form-horizontal">
                    @csrf @method('put')

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Bank Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="bank_name" value="{{ ucwords($userbankinfo->bank_name) }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Account Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="account_name" value="{{ $userbankinfo->account_name }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Account Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="account_number" value="{{ $userbankinfo->account_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">IBAN/Routing Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="iban_number" value="{{ $userbankinfo->iban_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Swift Code</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="swift_code" value="{{ $userbankinfo->swift_code }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Bank Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="form-control" name="bank_address" rows="4" cols="80">{{ ucwords($userbankinfo->bank_address) }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Update Bank Info" class="btn btn-sm btn-primary pull-left">
                        <a class="btn btn-sm btn-danger pull-right" href="{{ route('user-bank-info.destroy', $userbankinfo->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
