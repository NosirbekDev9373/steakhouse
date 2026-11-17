@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'ogImage' => null,
    'ogType' => 'website',
])

@php
    $locale = app()->getLocale();
    $pageTitle = $title ?? __('seo.default_title');
    $metaDescription = $description ?? __('seo.default_description');
    $metaKeywords = $keywords ?? __('seo.default_keywords');
    $socialImage = $ogImage ? (str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage)) : asset('images/menu/ribeye-steak.jpg');
    $currentUrl = url()->current();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}">
<head>

    <title>{{ $pageTitle }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $metaKeywords }}">
    <meta name="author" content="Steak House Restaurant">
    <meta name="robots" content="index, follow, max-image-preview:large">

    <!-- Canonical & Alternate Hreflang Tags -->
    <link rel="canonical" href="{{ $currentUrl }}">
    <link rel="alternate" hreflang="uz" href="{{ $currentUrl }}">
    <link rel="alternate" hreflang="en" href="{{ $currentUrl }}">
    <link rel="alternate" hreflang="x-default" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:site_name" content="{{ __('seo.site_name') }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:image" content="{{ $socialImage }}">
    <meta property="og:image:alt" content="{{ $pageTitle }}">
    <meta property="og:locale" content="{{ $locale === 'uz' ? 'uz_UZ' : 'en_US' }}">
    <meta property="og:locale:alternate" content="{{ $locale === 'uz' ? 'en_US' : 'uz_UZ' }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $socialImage }}">

    <!-- Schema.org Restaurant Structured Data -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Restaurant",
        "name": "Steak House",
        "image": "{{ asset('images/menu/ribeye-steak.jpg') }}",
        "@id": "{{ url('/') }}",
        "url": "{{ url('/') }}",
        "telephone": "+998712008899",
        "priceRange": "$$$",
        "servesCuisine": [
            "Steakhouse",
            "American Grill",
            "Fine Dining"
        ],
        "menu": "{{ route('menu') }}",
        "acceptsReservations": "True",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Amir Temur shoh ko'chasi, 45",
            "addressLocality": "Tashkent",
            "addressRegion": "Tashkent",
            "postalCode": "100000",
            "addressCountry": "UZ"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 41.311158,
            "longitude": 69.279737
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday"
                ],
                "opens": "11:00",
                "closes": "23:00"
            }
        ]
    }
    </script>

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
                <h3>{{ __('footer.about_title') }}</h3>
                <p>{{ __('footer.about_text') }}</p>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.6s">
                <h3>{{ __('footer.contact_title') }}</h3>
                <p>{{ __('footer.address') }}</p>
                <p>{{ __('footer.phone') }}</p>
                <p>{{ __('footer.email') }}</p>
            </div>

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="1.9s">
                <h3>{{ __('footer.hours_title') }}</h3>
                <strong>{{ __('footer.mon_fri') }}</strong>
                <p>{{ __('footer.mon_fri_time') }}</p>
                <strong>{{ __('footer.sat_sun') }}</strong>
                <p>{{ __('footer.sat_sun_time') }}</p>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright section -->
<section id="copyright">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-8 col-xs-8">
                <p>{{ __('footer.copyright') }}</p>
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

