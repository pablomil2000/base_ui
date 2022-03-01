<!DOCTYPE html>
<html class="no-js">

<head>
    <!-- Basic Page Needs
        ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="favicon.ico">
    <title>Timer Agency Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
        ================================================== -->
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Template CSS Files
        ================================================== -->
    <!-- Twitter Bootstrs CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <!-- Ionicons Fonts Css -->
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/ionicons.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('plugins/animate-css/animate.css') }}">
    <!-- Hero area slider css-->
    <link rel="stylesheet" href="{{ asset('plugins/slider/slider.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('plugins/facncybox/jquery.fancybox.css') }}">
    <!-- hover -->
    <link rel="stylesheet" href="{{ asset('plugins/hover/hover-min.css') }}">
    <!-- template main css file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    {{-- Navbar --}}
    <section class="top-bar animated-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            MasterChef
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- Recetas --}}
    <section id="works" class="works">
        <div class="container">
            @yield('recetas1')
        </div>
        <div class="container">
            @yield('recetas2')
        </div>

        <div class="container">
            @yield('recetas3')
        </div>

        <div class="container">
            @yield('recetas4')
        </div>

        <div class="container">
            @yield('recetas5')
        </div>

        <div class="container">
            @yield('recetas6')
        </div>
    </section>


    <!--
            ==================================================
            Footer Section Start
            ================================================== -->
    <footer id="footer">
        <div class="container">
            <div class="row content-justify-between">
                <div class="col-md-8 col-12 text-center text-lg-left text-md-left">
                    <p class="copyright">Copyright: Design and Developed by <a href="http://www.Themefisher.com"
                            target="_blank">Themefisher</a>. <br>
                        Get More Bootstrap Template From Our
                        <a href="https://themefisher.com/free-bootstrap-templates/" target="_blank">Store</a>
                    </p>
                </div>
                <div class="col-md-4 col-12">
                    <!-- Social Media -->
                    <ul class="social text-center text-md-right text-lg-right">
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Linkedin">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> <!-- /#footer -->

    <!-- Template Javascript Files
 ================================================== -->
    <!-- jquery -->
    <script src="plugins/jQurey/jquery.min.js"></script>
    <!-- Form Validation -->
    <script src="plugins/form-validation/jquery.form.js"></script>
    <script src="plugins/form-validation/jquery.validate.min.js"></script>
    <!-- slick slider -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- bootstrap js -->
    <script src="plugins/bootstrap/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="plugins/wow-js/wow.min.js"></script>
    <!-- slider js -->
    <script src="plugins/slider/slider.js"></script>
    <!-- Fancybox -->
    <script src="plugins/facncybox/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="js/main.js"></script>
</body>

</html>
