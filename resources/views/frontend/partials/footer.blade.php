      <!--*************** Footer  Starts Here *************** -->
    <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="row content-ro">
                <div class="col-lg-3 col-md-12 mb-5 footer-contact">
                    <h2 class="mb-4">Contact Informatins</h2>
                    <div class="address-row">
                        <p>
                            <i class="fas fa-map-marker-alt"></i> 
                            Bipus, Mirzapur, Tangail
                        </p>
                    </div>
                    <div class="address-row">
                        <p><i class="far fa-envelope"></i> contact@picodeit.com</p>
                    </div>
                    <div class="address-row">
                        <p><i class="fas fa-phone"></i> +8801686-254438</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mb-5">
                    <h2 class="mb-4">Quick Links</h2>
                   <div class="address-row">
                    <ul class="">
                        <li><a class="text-light" href="/">Home</a></li>
                        <li><a class="text-light" href="{{ '/' }}#about">About Us</a></li>
                        <li><a class="text-light" href="{{ '/' }}#gallery">Gallery</a></li>
                        <!-- <li><a class="text-light" href="#process">Process</a></li> -->
                        <li><a class="text-light" href="#contact">Contact US</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 footer-form">
                    <div class="form-card">
                        <div class="text-center pt-3 mt-4">
                            <h4 class="text-dark">Quick Message</h4>
                        </div>
                        <form action="{{ route('contact_us_post') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Enter Name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone"  placeholder="Enter Mobile no" class="form-control"> 
                                </div>
                            </div>
                            <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                            <textarea placeholder="Your Message" name="message" rows="3" class="form-control"></textarea>
                            <button class="btn btn-sm btn-primary w-100">Send Request</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="row">
                    <div class="_col-lg-8 col-md-12 text-center">
                        <p>Copyright © <a href="https://www.picodeit.com">picodeit.com</a> | All right reserved.</p>
                    </div>
                    <!-- <div class="col-lg-4 col-md-6 socila-link">
                        <ul>
                            <li><a><i class="fab fa-github"></i></a></li>
                            <li><a><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li><a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </footer>
    
    
</body>    
    <script src="{{ asset('frontend_assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/grid-gallery.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/script.js')}}"></script>
    @stack('scripts')
</html>