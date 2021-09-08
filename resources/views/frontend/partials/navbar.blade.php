<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            contact@picodeit.com
                            <span>|</span></li>
                            <li>
                               <i class="fa fa-search"></i>
                               <a href="{{ route('search_blood') }}" class="text-white">
                                    Search Blood
                               </a>
                               
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                        <ul class="ulright">

                            @if (Route::has('login'))
                                @auth
                                    <li>
                                    <a href="{{ route('doner.profile.index') }}" class="text-white">
                                        <i class="fas fa-user"></i> Profile
                                    </a>
                                    </li>
                                    <li><a href="{{ route('logout') }}" class="text-white"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-key" title="Logout"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </li>
                                @else
                                    <li>
                                        <i class="fa fa-tint"></i>
                                        <a href="{{ route('register') }}" class="text-white">
                                            Donate Blood
                                        </a>
                                        <span>|</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-user"></i>
                                        <a href="{{ route('login') }}" class="text-white">Login</a>
                                    </li>
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="header-bottom">
            <div class="container">
                <div class="row nav-row">
                    <div class="col-md-3 logo">
                        <a href="/">
                            <img src="{{ asset('frontend_assets/images/logo.jpg')}}" alt="">
                        </a>
                    </div>
                    <div class="col-md-9 nav-col">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarNav"
                            aria-controls="navbarNav"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ '/' }}#about">About Us</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ '/' }}#gallery">Gallery</a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="#process">Process</a>
                                </li> -->

                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact US</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>