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

<li class="menu-item-has-children dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bank"></i>Product Section</a>
    <ul class="sub-menu children dropdown-menu">
        <li><i class="fa fa-credit-card"></i><a href="{{route('product-section-type.index')}}">Type</a></li>
        <li><i class="fa fa-credit-card"></i><a href="{{route('product-section-category.index')}}">Category</a></li>
        <li><i class="fa fa-credit-card"></i><a href="{{route('product-section-sub-category.index')}}">Sub-Category</a></li>
    </ul>
</li>
