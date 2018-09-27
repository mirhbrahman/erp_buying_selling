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
                    <li><i class="fa fa-id-badge"></i><a href="{{route('user-role.index')}}">User Role</a></li>
                    <li><i class="fa fa-user"></i><a href="ui-badges.html">User</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>