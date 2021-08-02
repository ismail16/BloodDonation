<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('student.dashboard') }}" class="brand-link text-center">
        <img src="{{ asset('images/logo.png')}}" alt="Pi-codeit" class="brand-image bg-light" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">Admin</span> -->
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('student.dashboard') }}" class="nav-link {{Request::is('student/dashboard*') ? 'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
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