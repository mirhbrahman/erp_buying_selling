@extends('layouts.admin')
@section('content')

    <div class="row">

        <div class="col-sm-12">
            <br>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Banking Information</h5>
                </div>
            </div>

            {{-- Bank Account Info --}}
            @include('user.bank.view.bank_info')

            {{-- Mobile Bank Info --}}
            @include('user.bank.view.mobile_bank')

        </div>
        <div class="col-sm-12">
            
            {{-- E-Wallet --}}
            @include('user.bank.view.e_wallet')

        </div>
    </div>

@endsection
