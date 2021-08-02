<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="/" class="nav-link" target="_blank">Website</a>
		</li>
	</ul>
	<form class="form-inline ml-3">
		<div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</form>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a class="nav-link" href="">
				<i class="far fa-comments"></i>
				<span class="badge badge-warning navbar-badge font-weight-bold ">
				3
				</span>
			</a>
		</li>

		<li class="nav-item dropdown">
			<a href="#" class="_dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
				<img src="{{ asset('backend_assets/dist/img/AdminLTELogo.png')}}" class="user-image img-circle user_small_image_admin" alt="User Image" style="height: 40px;">
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">
					<img src="{{ asset('backend_assets/dist/img/AdminLTELogo.png')}}" class="img-circle user_image_admin" alt="User Image">
					<h4>Name</h4>
					<p>
						Admin 
					</p>
				</span>
				<div class="dropdown-divider"></div>
				<div class="container">
					<div class="row">
						<div class="d-flex justify-content-start w-50">
							<a href="#" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="d-flex justify-content-end w-50">
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
								@csrf
								<button type="submit" class="btn btn-default btn-flat">Sign out</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</li>
	</ul>
</nav>