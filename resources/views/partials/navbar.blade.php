<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false"
            aria-label="Toggle navigation">
      <i class="fa fa-bars"></i>
    </button>
        <a class="navbar-brand" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/imgs/default.png')}}" alt="Logo"></a>
        <p>@if (Auth::user()->role)
            {{ Auth::user()->role->name }}
        @endif</p>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="{{ route('home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
            </li>

            {{-- Admin Menu --}}
            @if (Auth::user()->isAdmin())
                @include('partials.navbar_menu.admin')
            @endif
            {{-- Supplier Menu --}}
            @if(Auth::user()->isSupplier())
                @include('partials.navbar_menu.supplier')
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>