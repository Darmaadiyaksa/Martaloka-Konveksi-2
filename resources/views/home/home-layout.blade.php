<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from st.ourhtmldemo.com/new/educamb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:47:29 GMT -->

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Martaloka Konveksi')</title>

    <!-- responsive meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/imp.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.bootstrap-touchspin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">

    <!-- Module css -->
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/header-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/about-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/blog-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/fact-counter-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/faq-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/contact-page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/breadcrumb-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/team-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/partner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/services-section.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/footer-section.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/color/theme-color.css') }}" id="jssDefault">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="shortcut icon" href="{{ asset('auth-views/assets/media/logos/icon-logo.png') }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="assets/js/html5shiv.js"></script>
    <![endif]-->

</head>


<body>

    <div class="boxed_wrapper ltr">
        {{-- <div class="loader-wrap">
            <div class="preloader">
              <div class="preloader-close">X</div>
              <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <img src="assets/images/llogo.png" style="
                    position: absolute;
                    top: -5%;
                    left: calc(50% - 180px / 2);
                    width: 180px;">
                  <div class="spinner"></div>
                  <div class="txt-loading">
                    <span data-text-preloader="m" class="letters-loading">m</span>
                    <span data-text-preloader="a" class="letters-loading">a</span>
                    <span data-text-preloader="r" class="letters-loading">r</span>
                    <span data-text-preloader="t" class="letters-loading">t</span>
                    <span data-text-preloader="a" class="letters-loading">a</span>
                    <span data-text-preloader="l" class="letters-loading">l</span>
                    <span data-text-preloader="o" class="letters-loading">o</span>
                    <span data-text-preloader="k" class="letters-loading">k</span>
                    <span data-text-preloader="a" class="letters-loading">a</span>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

        @include('home.partials.home-header')


        <div>

            @yield('content')
        </div>


        @include('home.partials.home-footer')
    </div>


    @stack('scripts')



    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.event.move.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets/js/knob.js') }}"></script>
    <script src="{{ asset('assets/js/map-script.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/pagenav.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-1color-switcher.min.js') }}"></script>
    <script src="{{ asset('assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/skrollr.min.js') }}"></script>

    <!-- thm custom script -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>



</body>


<!-- Mirrored from st.ourhtmldemo.com/new/educamb/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 May 2023 07:48:19 GMT -->

</html>
