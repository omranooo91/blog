<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->



    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Langauge
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach

            </div>
        </div>

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ request()->session()->get('name') }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fa fa-home text-info"></i>
                        <p>{{trans('dashboard.home')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link">
                        <i class="nav-icon fa fa-list text-info"></i>
                        <p>{{trans('dashboard.categories')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/posts" class="nav-link">
                        <i class="nav-icon fa fa-newspaper text-info"></i>
                        <p>{{trans('dashboard.posts')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fa fa-users text-info"></i>
                        <p>{{trans('dashboard.users')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/settings" class="nav-link">
                        <i class="nav-icon fa fa-cog text-info"></i>
                        <p>{{trans('dashboard.settings')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fa fa-door-closed text-info"></i>
                        <p>{{trans('dashboard.logout')}}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
