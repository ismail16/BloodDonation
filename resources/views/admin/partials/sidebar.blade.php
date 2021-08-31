<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <!-- <img src="{{ asset('images/logo.png')}}" alt="Blood" class="brand-image bg-light" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{Request::is('admin/dashboard*') ? 'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.user.index')}}" class="nav-link {{Request::is('admin/user*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.division.index')}}" class="nav-link {{Request::is('admin/division*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Division</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.district.index')}}" class="nav-link {{Request::is('admin/district*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>District</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.thana.index')}}" class="nav-link {{Request::is('admin/thana*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Thana</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('admin.slider.index')}}" class="nav-link {{Request::is('admin/slider*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Sliders</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-dark">@yield('title')</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb breadcrumb-sm float-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">@yield('title')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>