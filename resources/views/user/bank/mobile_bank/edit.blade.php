@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update Mobile Bank</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-mobile-bank.update', $userMobileBank->id) }}" method="post" enctype="" class="form-horizontal">
                    @csrf @method('put')

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Country Name</label></div>
                        <div class="col-12 col-md-9">
                            <select name="country_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($countries)
                                    @foreach ($countries as $country)
                                        <option {{ $userMobileBank->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ ucwords($country->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">Mobile Bank Name</label></div>
                        <div class="col-12 col-md-9">
                            <select name="mobile_bank_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($mobilebanks)
                                    @foreach ($mobilebanks as $mobilebank)
                                        <option {{ $userMobileBank->mobile_bank_id == $mobilebank->id ? 'selected' : '' }} value="{{ $mobilebank->id }}">{{ ucwords($mobilebank->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Account Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="account_number" value="{{ $userMobileBank->account_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Update Mobile Bank" class="btn btn-sm btn-primary pull-left">
                        <a class="btn btn-sm btn-danger pull-right" href="{{ route('user-mobile-bank.destroy', $userMobileBank->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
