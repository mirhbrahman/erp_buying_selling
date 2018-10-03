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

            <div class="col-sm-6" style="padding-left: 0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel panel-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center">Bank Account Info</h5>
                                <table class="table" style="margin-bottom:0">
                                    <thead>
                                        <tr><th>Account Name</th>
                                            <th>Bank Name</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($userbankinfos)
                                            @foreach ($userbankinfos as $userbankinfo)
                                                <tr>
                                                    <td>{{ $userbankinfo->account_name }}</td>
                                                    <td>{{ ucwords($userbankinfo->bank_name) }}</td>
                                                    <td><button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#bankInfo"><i class="fa fa-eye" aria-hidden="true"></i> View </button> <a href="{{ route('user-bank-info.edit', $userbankinfo->id) }}" class="btn btn-sm btn-secondary"> <i class="fa fa-cog" aria-hidden="true"></i> Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if ($userbankinfos)
                                            @foreach ($userbankinfos as $userbankinfo)
                                                <tr>
                                                    <td colspan="3">
                                                        <div id="bankInfo" class="collapse">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Bank Name: </td>
                                                                        <td>{{ ucwords($userbankinfo->bank_name) }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Account Name: </td>
                                                                        <td>{{ $userbankinfo->account_name }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Account Number: </td>
                                                                        <td>{{ $userbankinfo->account_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>IBAN/Routing Number: </td>
                                                                        <td>{{ $userbankinfo->iban_number }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Swift Code: </td>
                                                                        <td>{{ $userbankinfo->swift_code }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Bank Address: </td>
                                                                        <td>{{ ucwords($userbankinfo->bank_address) }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('user-bank-info.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="padding-right: 0">
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center">Mobile Bank Info</h5>
                                <table class="table" style="margin-bottom:0">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>Bank</th>
                                            <th>Number</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($userMobileBanks)
                                            @foreach ($userMobileBanks as $userMobileBank)
                                                <tr>
                                                    <td>{{ $userMobileBank->country->name }}</td>
                                                    <td>{{ $userMobileBank->mobileBank->name }}</td>
                                                    <td>{{ $userMobileBank->account_number }}</td>
                                                    <td><a href="{{ route('user-mobile-bank.edit', $userMobileBank->id) }}" class="btn btn-sm btn-secondary"> <i class="fa fa-cog" aria-hidden="true"></i> Edit</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <hr style="margin-top: 0">
                                <div class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('user-mobile-bank.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6" style="padding-left: 0">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel panel-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center">E-Wallet</h5>
                                <table class="table" style="margin-bottom:0">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th>Bank Name</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>sdfsdf</td>
                                            <td>sdf</td>
                                            <td><a href="" class="btn btn-sm btn-secondary"> <i class="fa fa-cog" aria-hidden="true"></i> Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr style="margin-top: 0">
                                <div class="text-center">
                                    <a class="btn btn-sm btn-primary" href=""> <i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
