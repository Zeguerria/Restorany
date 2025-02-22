<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Restorany-@yield('titre')</title>
    <link rel="icon" href="{{asset('restos/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/flaticon.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('restos/css/gijgo.min.css')}}">
    <link rel="stylesheet" href="{{asset('restos/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('restos/css/all.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('restos/css/style.css')}}">
    @yield('header')
</head>

<body>
    <!--::header part start::-->
        @include('restaurants.menus._menus.header')
    <!-- Header part end-->

    @yield('corps')


    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="single-footer-widget footer_1">
                        <h4>About Us</h4>
                        <p>Heaven fruitful doesn't over for these theheaven fruitful doe over days
                            appear creeping seasons sad behold beari ath of it fly signs bearing
                            be one blessed after.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-2 col-lg-3">
                    <div class="single-footer-widget footer_2">
                        <h4>Important Link</h4>
                        <div class="contact_info">
                            <ul>
                                <li><a href="#">WHMCS-bridge</a></li>
                                <li><a href="#"> Search Domain</a></li>
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Shopping Cart</a></li>
                                <li><a href="#"> Our Shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span>Hath of it fly signs bear be one blessed after </p>
                            <p><span> Phone :</span> +2 36 265 (8060)</p>
                            <p><span> Email : </span>info@colorlib.com </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-footer-widget footer_3">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping seas</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Email Address'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright_part_text">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright_social_icon text-right">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="ti-dribbble"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{asset('restos/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('restos/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('restos/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('restos/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('restos/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('restos/js/masonry.pkgd.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('restos/js/owl.carousel.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('restos/js/slick.min.js')}}"></script>
    <script src="{{asset('restos/js/gijgo.min.js')}}"></script>
    <script src="{{asset('restos/js/jquery.nice-select.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('restos/js/custom.js')}}"></script>

      @yield('footer')
</body>

</html>
