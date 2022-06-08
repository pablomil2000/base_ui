<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bolt - Bootstrap Agency Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Raleway:400,300,700,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    Template Name: Bolt
    Template URL: https://templatemag.com/bolt-bootstrap-agency-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body data-spy="scroll" data-offset="80" data-target="#thenavbar">

    <!-- Fixed navbar -->
    @yield('navbar')

    @yield('content')

    @yield('content2')

    <div id="copyrights">
        <div class="container">
            <p>
                &copy; Copyrights <strong>Bolt</strong>. All Rights Reserved
            </p>
            <div class="credits">
                <!--
                    You are NOT allowed to delete the credit link to TemplateMag with free version.
                    You can delete the credit link only if you bought the pro version.
                    Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/bolt-bootstrap-agency-template/
                    Licensing information: https://templatemag.com/license/
                -->
                Created with Bolt template by <a href="https://templatemag.com/">TemplateMag</a>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/php-mail-form/validate.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/chart/chart.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>

</body>

</html>
