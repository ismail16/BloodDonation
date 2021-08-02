@extends('frontend.layouts.master')
@section('title','Welcome to Pi-CodeiT')

@section('content')

    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url('images/slider/Web-Design-and-Development1.jpg');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animated fadeInDown">Build Your Web Application</h2>
                                <p class="animated fadeInUp h4">Your Trust and Happiness is Our Strength</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url('{{ asset('images/slider/ERP.png') }}');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animated fadeInDown">Get Your E-Commerce, Payroll, ERP Solution</h2>
                                <p class="animated fadeInUp h4">Your Trust and Happiness is Our Strength.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <!-- <div class="carousel-item" style="background-image: url('{{ asset('images/slider/Mobile-App-Development.jpg1') }}');"> -->
                    <!-- <div class="carousel-item" style="background-image: url('{{ asset('images/slider/Mobile-App-Development.jpg2') }}');"> -->
                    <!-- <div class="carousel-item" style="background-image: url('{{ asset('images/slider/Mobile-App-Development.jpg') }}');">
                        <div class="carousel-container">
                            <div class="carousel-content container">
                                <h2 class="animated fadeInDown">Build Your Mobile Application</h2>
                                <p class="animated fadeInUp h4">Your Trust and Happiness is Our Strength</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="section-title">
                        <h2>About Us</h2>
                        <p>We understand that every business is different and their software needs are different too. Keeping that in mind, we have built services that can be tailored to meet all your requirements. We firmly believe, customizing our customers needs is our custom.</p>
                    </div>
                    <div class="col-lg-6 video-box">
                        <img src="{{ asset('images/videoplayimage.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center about-content">
                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-desktop"></i></div>
                            <h4 class="title"><a href="">Web Design & Development</a></h4>
                            <p class="description">HTML, CSS, Bootstrap, Jsvascript</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-laptop-code"></i></div>
                            <h4 class="title"><a href="">Software Development</a></h4>
                            <p class="description">PHP, LARAVEL, LUMEN, MYSQL, VUE</p>
                        </div>

                        <!-- <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-mobile-alt"></i></div>
                            <h4 class="title"><a href="">Mobile App Development</a></h4>
                            <p class="description">ANDROID-JAVA, ANDOID STODIO</p>
                        </div> -->

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-cart-plus"></i></div>
                            <h4 class="title"><a href="">E-Commerce, Payroll, ERP Solution</a></h4>
                            <p class="description">
                                Let our professional E-Commerce, Payroll, ERP Solution Team develop a customized 
                                user-friendly solution for you.
                            </p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="fas fa-fill-drip"></i></div>
                            <h4 class="title"><a href="">Graphics Design</a></h4>
                            <p class="description">Photoshop, Illestetor</p>
                        </div>

                        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="icofont-image"></i></div>
                            <h4 class="title"><a href="">Search Engine Optimization ( SEO )</a></h4>
                            <p class="description">Our Search Engine Optimization experts can help you to improve your website's search rankings.</p>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Counts Section ======= -->
        <section class="counts section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                        <div class="count-box">
                            <i class="icofont-simple-smile" style="color: #20b38e;"></i>
                            <span data-toggle="counter-up">49</span>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="count-box">
                            <i class="icofont-document-folder" style="color: #c042ff;"></i>
                            <span data-toggle="counter-up">27</span>
                            <p>Projects</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="count-box">
                            <i class="icofont-live-support" style="color: #46d1ff;"></i>
                            <span data-toggle="counter-up">562</span>
                            <p>Hours Of Support</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="600">
                        <div class="count-box">
                            <i class="icofont-users-alt-5" style="color: #ffb459;"></i>
                            <span data-toggle="counter-up">8</span>
                            <p>Team Member</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Our Services</h2>
                </div>
                <div class="row d-flex justify-content-center ">
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up">
                        <div class="icon"><i class="fas fa-desktop"></i></div>
                        <h4 class="title"><a href="">Web Design & Development</a></h4>
                        <p class="description">
                            Our creative web designers can develop innovative and customized website with most
                            affordable price in Bangladesh. HTML5 or CSS3 you name it we know it.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fas fa-laptop-code"></i></div>
                        <h4 class="title"><a href="">Software Development</a></h4>
                        <p class="description">
                            Your dream of developing software can come true with our skilled & Experienced 
                            software engineers & programmers. Convert your ideas into reality.
                        </p>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fas fa-mobile-alt"></i></div>
                        <h4 class="title"><a href="">Mobile App Development</a></h4>
                        <p class="description">
                            BASE IT offers affordable end-to-end iPhone, iPad, Adroid Application Development 
                            services.Demand of Mobile Application is rising.
                        </p>
                    </div> -->
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon"><i class="fas fa-fill-drip"></i></div>
                        <h4 class="title"><a href="">Graphic Design</a></h4>
                        <p class="description">
                            Want huge online exposures! Let us do the SMS, eMail or Social Media Marketing and 
                            Advertising for you.Reach to thousands of new customers.
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="icofont-image"></i></div>
                        <h4 class="title"><a href="">SEO</a></h4>
                        <p class="description">
                            Our Search Engine Optimization experts can help you to improve your website's 
                            search rankings.Increase your website visitors and profit.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="fas fa-cart-plus"></i></div>
                        <h4 class="title"><a href="">E-Commerce, Payroll, ERP Solution</a></h4>
                        <p class="description">
                            Let our professional E-Commerce, Payroll, ERP Solution Team develop a customized user-friendly 
                            online/offline solution for you.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-title">
                    <h2>Our Portfolio</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @if($categories)
                            @foreach($categories as $categories)
                            <li data-filter=".{{ $categories->id }}">{{ $categories->name}}</li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container">
                    @if($portfolios)
                        @foreach($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 portfolio-item {{ $portfolio->category_id }}">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('images/portfolio/'.$portfolio->portfolio_image) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $portfolio->title }}</h4>
                                    <p>{!! $portfolio->description !!}</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('images/portfolio/'.$portfolio->portfolio_image) }}" data-gall="portfolioGallery" class="venobox" title="{{ $portfolio->title }}"><i class="icofont-eye"></i></a>
                                        <a href="{{ $portfolio->link }}" title="More Details" target="_blank"><i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>

        <section id="contact" class="contact section-bg">
            <div class="container">
                <div class="section-title">
                    <h2>Contact Us</h2>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-3 d-flex m-0 card text-center" data-aos="fade-up">
                        <div class="pt-3">
                            <i class="bx bx-map contact-icon"></i>
                            <h3>Our Address</h3>
                            <p>72/A, Mirpur, Dhaka-1206 </p>
                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3 d-flex m-0 card text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="pt-3">
                            <i class="bx bx-envelope contact-icon"></i>
                            <h3>Email Us</h3>
                            <p>contact@picodeit.com</p>
                        </div>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-3 d-flex m-0 card text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="pt-3">
                            <i class="bx bx-phone-call contact-icon"></i>
                            <h3>Call Us</h3>
                            <p>
                                <a href="tel:+8801686-254438">+8801686-254438</a> <br>
                                <a href="tel:+8801920-797864">+8801920-797864</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                        <form action="{{ route('contact_post') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-lg-6 form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" />

                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection
