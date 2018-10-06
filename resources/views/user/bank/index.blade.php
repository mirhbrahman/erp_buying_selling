@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Banking Information
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                {{-- Bank Account Info --}}
                @include('user.bank.bank_info.index')

                {{-- Mobile Bank Info --}}
                @include('user.bank.mobile_bank.index')

            </div>
            <div class="col-sm-12">

                {{-- E-Wallet --}}
                @include('user.bank.e_wallet.index')

            </div>
        </div>
    </div>
@endsection
