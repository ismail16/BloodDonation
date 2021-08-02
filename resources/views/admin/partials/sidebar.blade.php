<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
        <img src="{{ asset('images/logo.png')}}" alt="Pi-codeit" class="brand-image bg-light" style="opacity: .8">
        <!-- <span class="brand-text font-weight-light">Admin</span> -->
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
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fa fa-users"></i>
                      <p>
                        Students
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.student.create')}}" class="nav-link">
                                <i class="fa fa-circle-o"></i> Add Student
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.student.index')}}" class="nav-link"><i class="fa fa-circle-o"></i> All Student</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.users')}}" class="nav-link"><i class="fa fa-circle-o"></i> Users</a>
                        </li>
                    </ul>
                </li> -->
                <li class="nav-item has-treeview ">
                    <a href="{{route('admin.course.index')}}" class="nav-link {{Request::is('admin/course*') ? 'active':''}}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Course</p>
                    </a>
                </li>
                
                <li class="nav-item has-treeview ">
                    <a href="{{route('admin.batch.index')}}" class="nav-link {{Request::is('admin/batch*') ? 'active':''}}">
                        <i class="nav-icon fas fa-users	"></i>
                        <p>Batch</p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{route('admin.student.index')}}" class="nav-link {{Request::is('admin/student*') ? 'active':''}}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>Student</p>
                    </a>
                </li>
                <!-- <li class="nav-item has-treeview">
                    <a href="{{route('admin.staff.index')}}" class="nav-link {{Request::is('admin/staff*')?'active':''}}">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Staff</p>
                    </a>
                </li> -->
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