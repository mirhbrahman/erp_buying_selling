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
                                <th>E-Wallet Name</th>
                                <th>E-Wallet Email/Number</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($userEWallets)
                                @foreach ($userEWallets as $userEWallet)
                                    <tr>
                                        <td>{{ ucwords($userEWallet->eWallet->name) }}</td>
                                        <td>{{ $userEWallet->ewallet_number }}</td>
                                        <td><a href="{{ route('user-e-wallet.edit', $userEWallet->id) }}" class="btn btn-sm btn-secondary"> <i class="fa fa-cog" aria-hidden="true"></i> Edit</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <hr style="margin-top: 0">
                    <div class="text-center">
                        <a class="btn btn-sm btn-primary" href="{{ route('user-e-wallet.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
