<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
            aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
        <a class="navbar-brand" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>User</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badge"></i><a href="{{route('user-roles.index')}}">User Role</a></li>
                    <li><i class="fa fa-plus"></i><a href="{{route('users.create')}}">Create User</a></li>
                    <li><i class="fa fa-user"></i><a href="{{route('users.index')}}">User List</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-map-marker"></i>Location</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-country.index')}}">Country</a></li>
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-division.index')}}">Division/State</a></li>
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-city.index')}}">District/City</a></li>
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-police-station.index')}}">Upazila/Police Station</a></li>
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-word.index')}}">Union/Word</a></li>
                    <li><i class="fa fa-flag"></i><a href="{{route('sys-village.index')}}">Village/Moholla</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bank"></i>Bank</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-credit-card"></i><a href="{{route('mobile-bank.index')}}">Mobile Bank</a></li>
                    <li><i class="fa fa-credit-card"></i><a href="{{route('e-wallet.index')}}">E-Wallet</a></li>
                </ul>
            </li>



        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>