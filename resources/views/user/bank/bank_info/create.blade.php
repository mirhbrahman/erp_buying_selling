@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Add Bank Info</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-bank-info.store') }}" method="post" enctype="" class="form-horizontal">
                    @csrf

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Bank Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="bank_name" value="{{ old('bank_name') }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Account Name</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="account_name" value="{{ old('account_name') }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Account Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="account_number" value="{{ old('account_number') }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">IBAN/Routing Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="iban_number" value="{{ old('iban_number') }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Swift Code</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="swift_code" value="{{ old('swift_code') }}" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Bank Address</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="form-control" name="bank_address" rows="4" cols="80">{{ old('bank_address') }}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Add Bank Info" class="btn btn-primary pull-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
