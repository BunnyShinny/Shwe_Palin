<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ShwePalin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="frontend/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/css/magnific-popup.css">
    <link rel="stylesheet" href="frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/css/themify-icons.css">
    <link rel="stylesheet" href="frontend/css/gijgo.css">
    <link rel="stylesheet" href="frontend/css/nice-select.css">
    <link rel="stylesheet" href="frontend/css/flaticon.css">
    <link rel="stylesheet" href="frontend/fonts/flat-font/flaticon.css">
    

    <link rel="stylesheet" href="frontend/css/icomoon.css">
    <link rel="stylesheet" href="frontend/css/slicknav.css">

    <link rel="stylesheet" href="frontend/css/style.css">
    <link rel="stylesheet" href="frontend/css/custom.css">
    <link rel="stylesheet" href="frontend/css/cart.css">
  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="css/responsive.css"> -->

    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-messaging.js"></script>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="header_bottom_border">
                        <div class="row align-items-center no-gutters">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="/">
                                        <img src="frontend/img/shwe/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="/">home</a></li>
                                            <li><a href="foodmenu">Menu </a>
                                                <!-- <ul class="submenu">
                                                    <li><a href="drinks.html">drinks</a></li>
                                                    <li><a href="">noodles</a></li>
                                                    <li><a href="">steamed and fried</a></li>
                                                    <li><a href="">traditional food</a></li>
                                                    <li><a href="">bread and puff</a></li>
                                                </ul> -->
                                            </li>
                                            <li><a href="branch">Branches</a>

                                            </li>
                                            <!-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li> -->
                                            <li><a href="contact">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li>
                                                <a href="cart"><i class="flaticon-shopping-cart"></i>
                                                <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty :''}}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="flaticon-notification"></i></a>
                                            </li>
                                            @if (Auth::guest())
                                            <li>
                                                <a href="login">Log In</a>
                                            </li>
                                            <li>
                                            <a href="register">Sign Up</a>
                                            </li>
                                            @else
                                            <li>
                                                <a href="#">{{auth()->user()->name}}</a>
                                                <ul class="submenu">
                                                    <li>
                                                        <a href="/accountsetting" class="dropdown-item">
                                                            Setting
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    @yield('slider_area')
    
    <!-- slider_area_end -->

    
    @yield('content')

    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <h3>ေရႊပလႅင္ - Shwepalin</h3>
                            </div>
                            <p>5th flora, 700/D kings road, green <br> lane New York-1782 <br>
                                <a href="#">+10 367 826 2567</a> <br>
                                <a href="#">contact@carpenter.com</a>
                            </p>
                            <p>



                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4 offset-xl-1">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Useful Links
                            </h3>
                            <ul>
                                <li><a href="#">Menu</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> All rights reserved 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- JS here -->
    <script src="frontend/js/myjs.js"></script>
    <script src="frontend/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="frontend/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="frontend/js/popper.min.js"></script>
    <script src="frontend/js/bootstrap.min.js"></script>
    <script src="frontend/js/owl.carousel.min.js"></script>
    <script src="frontend/js/isotope.pkgd.min.js"></script>
    <script src="frontend/js/ajax-form.js"></script>
    <script src="frontend/js/waypoints.min.js"></script>
    <script src="frontend/js/jquery.counterup.min.js"></script>
    <script src="frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="frontend/js/scrollIt.js"></script>
    <script src="frontend/js/jquery.scrollUp.min.js"></script>
    <script src="frontend/js/wow.min.js"></script>
    <script src="frontend/js/gijgo.min.js"></script>
    <script src="frontend/js/nice-select.min.js"></script>
    <script src="frontend/js/jquery.slicknav.min.js"></script>
    <script src="frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="frontend/js/plugins.js"></script>



    <!--contact js-->
    <script src="frontend/js/contact.js"></script>
    <script src="frontend/js/jquery.ajaxchimp.min.js"></script>
    <script src="frontend/js/jquery.form.js"></script>
    <script src="frontend/js/jquery.validate.min.js"></script>
    <script src="frontend/js/mail-script.js"></script>


    <script src="frontend/js/main.js"></script>

    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }

        });
    </script>
    <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            const config = {
                apiKey: "AIzaSyAt17cRDm6O0jBr5_AWwKVOKxkqu5Cd5-U",
                authDomain: "shwepalin-25d94.firebaseapp.com",
                databaseURL: "https://shwepalin-25d94.firebaseio.com",
                projectId: "shwepalin-25d94",
                storageBucket: "shwepalin-25d94.appspot.com",
                messagingSenderId: "509437086415",
                appId: "1:509437086415:web:8319facfece4ae53a085ba",
            };
            firebase.initializeApp(config);
            const messaging = firebase.messaging();
            
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function(token) {
                    $.ajax({
                        url: '{{ URL::to('/save-device-token') }}',
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            user_id: {!! json_encode($user_id ?? '') !!},
                            fcm_token: token
                        },
                        dataType: 'JSON',
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (err) {
                            console.log(" Can't do because: " + err);
                        },
                    });
                })
                .catch(function (err) {
                    console.log("Unable to get permission to notify.", err);
                });
        
            messaging.onMessage(function(payload) {
                console.log('got it');
                console.log(payload);
                const noteTitle = payload.notification.title;
                const noteOptions = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                    click_action: payload.notification.click_action
                };
                myNoti.showNotification('bottom','right',noteOptions);
                
                new Notification(noteTitle, noteOptions);
            });
        });
    </script>
    @stack('scripts')
</body>

</html>