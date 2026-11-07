<!DOCTYPE html>
<html lang="en">
<head>

    <title>{{ $title ?? 'Steak House - Free HTML Template' }}</title>
    <!--

    Tooplate 2083 Steak House

        https://www.tooplate.com/view/2083-steak-house

    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- stylesheets css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/nivo-lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nivo_themes/default/default.css') }}">

    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

<!-- Preloader section -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-pulse"></div>
</div>

<x-navbar></x-navbar>

{{ $slot }}


<!-- Footer section -->
<footer>
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.3s">
                <h3>About the house</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
                    tincidunt ut laoreet. Dolore magna aliquam erat volutpat ipsum.</p>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.6s">
                <h3>Contact Detail</h3>
                <p>123 Delicious Street, San Francisco, CA 10110</p>
                <p>010-020-0780</p>
                <p>hello@company.com</p>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
                <h3>Opening Hours</h3>
                <strong>Monday - Firday</strong>
                <p>11:00 AM - 10:00 PM</p>
                <strong>Saturday - Sunday</strong>
                <p>10:00 AM - 09:00 PM</p>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright section -->
<section id="copyright">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-8 col-xs-8">
                <p>Copyright © 2019 Steak House Company

                    - Design: <a rel="nofollow" class="designed-by" href="https://www.tooplate.com">Tooplate</a></p>
            </div>

            <div class="col-md-4 col-sm-4 text-right">
                <a href="#top" class="fa fa-angle-up smoothScroll gototop"></a>
            </div>

        </div>
    </div>
</section>

<!-- javscript js -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>

<script src="{{ asset('js/isotope.js') }}"></script>
<script src="{{ asset('js/imagesloaded.min.js') }}"></script>
<script src="{{ asset('js/nivo-lightbox.min.js') }}"></script>

<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>

<script src="{{ asset('js/jquery.parallax.js') }}"></script>
<script src="{{ asset('js/smoothscroll.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>

<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>

