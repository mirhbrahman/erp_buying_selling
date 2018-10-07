@extends('layouts.admin')
@section('content')
    <div class="col-md-12" style="padding:0">
        <div class="card">
            <div class="card-header">Update E-Wallet</div>

            <div class="card-body">
                @include('includes.errors.validation_errors')

                <form action="{{ route('user-e-wallet.update', $userEWallet->id) }}" method="post" enctype="" class="form-horizontal">
                    @csrf @method('put')

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="role-input" class=" form-control-label">E-Wallet Name</label></div>
                        <div class="col-12 col-md-9">
                            <select name="e_wallet_id" id="" class="form-control">
                                <option value="">Please select</option>
                                @if ($eWallets)
                                    @foreach ($eWallets as $eWallet)
                                        <option {{ $userEWallet->e_wallet_id == $eWallet->id ? 'selected' : '' }} value="{{ $eWallet->id }}">{{ ucwords($eWallet->name) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">E-wallet Email/Number</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="ewallet_number" value="{{ $userEWallet->ewallet_number }}" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <input type="submit" value="Update E-Wallet" class="btn btn-sm btn-primary pull-left">
                        <a class="btn btn-sm btn-danger pull-right" href="{{ route('user-e-wallet.destroy', $userEWallet->id) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
