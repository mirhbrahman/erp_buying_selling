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
