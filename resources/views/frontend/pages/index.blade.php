@extends('frontend.layouts.master')
@section('title','Welcome to Blood Donation')

@section('content')
@include('frontend.partials.search_bar')
@if(session()->has('message'))
    @if(session()->has('message'))
    <div class="col-lg-12 col-xl-12 d-flex justify-content-center" style="position: absolute; z-index: 99;">
        <div class="alert alert-success text-center pr-3 pl-3 p-1 mb-1">
            {{session('message')}}
            <button type="button" class="close ml-4 text-danger" data-dismiss="alert">&times;</button>
        </div>
    </div>
    @endif
@endif

<div class="slider-detail">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('frontend_assets/images/slide-02.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                    <p class=" bounceInLeft">Love Yourself But Love Others Too. Express Your Love For Them By Donating Blood.</p>
                    <div class=" vbh">
                        <div class="btn btn-danger  bounceInUp"> 
                           <a href="{{ route('register') }}" class="text-white"> Donate Now </a>
                        </div>
                        <div class="btn btn-danger  bounceInUp">
                            <a href="#contact" class="text-white">Contact US</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('frontend_assets/images/slide-03.jpg')}}" alt="Third slide">
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class=" bounceInDown">Donate Blood & Save a Life</h5>
                    <p class=" bounceInLeft">Donate Blood Because You Can Be The Next One To Need It</p>
                    <div class=" vbh">
                        <div class="btn btn-danger  bounceInUp"> 
                           <a href="{{ route('register') }}" class="text-white"> Donate Now </a>
                        </div>
                        <div class="btn btn-danger  bounceInUp">
                            <a href="#contact" class="text-white">Contact US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<section id="about" class="contianer-fluid about-us">
    <div class="container">
        <div class="row session-title">
            <h2>About Us</h2>
            <p>We work towards strengthening a technology-linked platform aimed at building network of blood donors. Till date, through this initiative thousands of people joined and many lives have received a fresh gush of blood and lives </p>
        </div>
        <div class="row">
            <div class="col-md-6 text">
                <h2>Goals and Objectives:</h2>
                <p>
                    To play a role in ensuring the healthy life of dying and sick people by helping to meet the need for blood in medical services through safe blood collection and supply.
                </p>
                <h2>Nature:</h2>
                <p>
                    The website is a completely non-profit, non-political and charitable organization whose entire activities are dedicated to public welfare.
                </p>
                <h2>Programs:</h2>
                <p>
                    1. Collect and supply safe blood. <br>
                    2. Conducting leaflets and various publicity campaigns to raise public awareness about the need for voluntary blood donation.<br>
                    3. To organize free blood grouping among the common people including various educational institutions, banks, business establishments etc. and to organize various programs for voluntary blood donation.
                </p>
            </div>
            <div class="col-md-6 image">
                <img src="{{ asset('frontend_assets/images/about.jpg')}}" alt="">
            </div>
        </div>
    </div>
</section>

<div id="gallery" class="gallery container-fluid">
    <div class="container">
        <div class="row session-title">
            <h2>Checkout Our Gallery</h2>
        </div>
        <div class="gallery-row row">
            <div id="gg-screen"></div>
            <div class="gg-box">
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g1.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g2.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g3.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g4.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g5.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g6.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g7.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g8.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g9.jpg')}}">
                </div>
                <div class="gg-element">
                    <img src="{{ asset('frontend_assets/images/g10.jpg')}}">
                </div>


            </div>
        </div>
    </div>
</div>

<!-- <section id="process" class="donation-care">
    <div class="container">
        <div class="row session-title">
            <h2>Donation Process</h2>
            <p>The donation process from the time you arrive center until the time you leave</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('frontend_assets/images/gallery/g1.jpg')}}" alt="">
                    <h4><b>1 - </b>Registration</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('frontend_assets/images/gallery/g2.jpg')}}" alt="">
                    <h4><b>2 - </b>Seeing</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('frontend_assets/images/gallery/g3.jpg')}}" alt="">
                    <h4><b>3 - </b>Donation</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 vd">
                <div class="bkjiu">
                    <img src="{{ asset('frontend_assets/images/gallery/g4.jpg')}}" alt="">
                    <h4><b>4 - </b>Save Life</h4>
                    <p>Ut wisi enim ad minim veniam, quis laore nostrud exerci tation ulm hedi corper turet suscipit lobortis</p>
                    <button class="btn btn-sm btn-danger">Readmore <i class="fas fa-arrow-right"></i></button>
                </div> 
            </div>
        </div>


    </div>
</section> -->

<!-- <div id="blog" class="blog-container contaienr-fluid">
    <div class="container">
        <div class="session-title row">
            <h2>Latest Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit velit consectetur adipiscing elit.</p>
        </div>
        <div class="row news-row">
            <div class="col-md-6">
                <div class="news-card">
                    <div class="image">
                        <img src="{{ asset('frontend_assets/images/blog_01.jpg')}}" alt="">
                    </div>
                    <div class="detail">
                        <h3>Latest News about Smarteye</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                        <p class="footp">
                            27 Comments <span>/</span>
                            Blog Design <span>/</span>
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card">
                    <div class="image">
                        <img src="{{ asset('frontend_assets/images/blog_02.jpg')}}" alt="">
                    </div>
                    <div class="detail">
                        <h3>Apple Launch its New Phone</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                        <p class="footp">
                            27 Comments <span>/</span>
                            Blog Design <span>/</span>
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card">
                    <div class="image">
                        <img src="{{ asset('frontend_assets/images/blog_03.jpg')}}" alt="">
                    </div>
                    <div class="detail">
                        <h3>About Windows 10 Update</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                        <p class="footp">
                            27 Comments <span>/</span>
                            Blog Design <span>/</span>
                            Read More
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="news-card">
                    <div class="image">
                        <img src="{{ asset('frontend_assets/images/blog_04.jpg')}}" alt="">
                    </div>
                    <div class="detail">
                        <h3>Latest News about Smarteye</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce fringilla vel nisl a dictum. Donec ut est arcu. Donec hendrerit consectetur adipiscing elit. </p>
                        <p class="footp">
                            27 Comments <span>/</span>
                            Blog Design <span>/</span>
                            Read More
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
