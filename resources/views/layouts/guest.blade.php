<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>{{ config('app.name', 'Dermaga Bangkoa') }}</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}">


    <!--====== Style CSS ======-->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    @vite(['resources/js/app.js', 'resources/css.app.css'])
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app.ff6f3007.css') }}">
    @livewireStyles

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="hidden preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area {{ request()->routeIs('home') }}">
        <div class="navbar-area {{ request()->routeIs('home') ? '' : 'sticky !bg-gray-800' }}">
            <div class="container relative">
                <div class="flex">
                    <div class="w-full">
                        <nav class="flex items-center justify-between navbar navbar-expand-lg">
                            <a class="mr-4 navbar-brand font-bold md:text-lg" href="/">
                                {{-- DermagaBangkoa --}}
                            </a>
                            <button class="block navbar-toggler focus:outline-none lg:hidden" type="button"
                                data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="absolute left-0 z-20 hidden w-full px-5 py-3 duration-300 bg-white shadow lg:w-auto collapse navbar-collapse lg:block top-100 mt-full lg:static lg:bg-transparent lg:shadow-none"
                                id="navbarOne">
                                <ul id="nav"
                                    class="items-center content-start mr-auto lg:justify-end navbar-nav lg:flex">
                                    <li class="nav-item active">
                                        <a class="page-scroll {{ request()->routeIs('home') ? '' : '!text-white' }}"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll {{ request()->routeIs('home') ? '' : '!text-white' }}"
                                            href="#about">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll {{ request()->routeIs('home') ? '' : '!text-white' }}"
                                            href="{{ route('Pesan-Tiket') }}">Pesan Kapal</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div
                                class="absolute right-0 hidden mt-2 mr-24 navbar-btn sm:inline-block lg:mt-0 lg:static lg:mr-0">
                                @if (Route::has('login'))
                                    @auth
                                        <a class="main-btn gradient-btn" data-scroll-nav="0"
                                            href="{{ route('dashboard') }}" rel="nofollow">Dashboard</a>
                                    @else
                                        <a class="main-btn gradient-btn" data-scroll-nav="0" href="{{ route('login') }}"
                                            rel="nofollow">Masuk</a>
                                        <a class="main-btn gradient-btn" data-scroll-nav="0" href="{{ route('register') }}"
                                            rel="nofollow">Daftar</a>
                                    @endauth
                                @endif
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- flex -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        @if (request()->routeIs('home'))
            <div id="home" class="header-hero bg-cover"
                style="background-image: url({{ asset('img/wa/2.jpg') }})">
                <div class="container">
                    <div class="justify-center flex">
                        <div class="w-full lg:w-2/3">
                            <div class="pt-32 mb-12 text-center lg:pt-48 header-hero-content">
                                <h3 class="text-4xl font-light leading-tight text-white header-sub-title wow fadeInUp"
                                    data-wow-duration="1.3s" data-wow-delay="0.2s">
                                    Dermaga Kayu Bangkoa
                                </h3>
                                <h2 class="mb-3 text-4xl font-bold text-white header-title wow fadeInUp"
                                    data-wow-duration="1.3s" data-wow-delay="0.5s">Lakukan Pemesanan Kapal Untuk
                                    Kunjungi Objek Wisata Keinginan Anda!</h2>

                                <a href="{{ route('Pesan-Tiket') }}"
                                    class="main-btn gradient-btn gradient-btn-2 wow fadeInUp" data-wow-duration="1.3s"
                                    data-wow-delay="1.1s">Pesan Kapal</a>
                            </div> <!-- header hero content -->
                        </div>
                    </div> <!-- flex -->
                    <div class="justify-center flex">
                        <div class="w-full lg:w-2/3 rounded-r-lg">
                            <div class="text-center  header-hero-image  wow fadeIn" data-wow-duration="1.3s"
                                data-wow-delay="1.4s">
                                <img src="{{ asset('img/wa/4.jpg') }}" class="rounded-r-lg" alt="hero">
                            </div> <!-- header hero image -->
                        </div>
                    </div> <!-- flex -->
                </div> <!-- container -->
                <div id="particles-1" class="particles"></div>
            </div> <!-- header hero -->
        @endif
    </header>

    <!--====== HEADER PART ENDS ======-->

    <main class="{{ request()->routeIs('home') ? '' : 'mt-28 ' }}">
        {{ $slot }}
    </main>

    <!--====== BLOG PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="relative z-10 footer-area pt-120">
        <div class="footer-bg" style="background-image: url({{ asset('assets/images/footer-bg.svg') }});"></div>
        <div class="container">
            {{-- <div class="px-6 pt-10 pb-20 mb-12 bg-white rounded-lg shadow-xl md:px-12 subscribe-area wow fadeIn"
                data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="flex">
                    <div class="w-full lg:w-1/2">
                        <div class="lg:mt-12 subscribe-content">
                            <h2 class="text-2xl font-bold sm:text-4xl subscribe-title">
                                Subscribe Our Newsletter
                                <span class="block font-normal">get reguler updates</span>
                            </h2>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="mt-12 subscribe-form">
                            <form action="#" class="relative focus:outline-none">
                                <input type="email" placeholder="Enter eamil"
                                    class="w-full py-4 pl-6 pr-40 duration-300 border-2 rounded focus:border-theme-color focus:outline-none">
                                <button class="main-btn gradient-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- flex -->
            </div> <!-- subscribe area --> --}}
            <div class="footer-widget pb-120">
                <div class="flex">
                    <div class="w-4/5 md:w-3/5 lg:w-2/6">
                        <div class="mt-12 footer-about wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="inline-block mb-8 logo" href="index.html">
                                <x-jet-application-logo />
                            </a>
                            <p class="pb-10 pr-10 leading-snug text-white">Lorem ipsum dolor sit amet consetetur
                                sadipscing elitr, sederfs diam nonumy eirmod tempor invidunt ut labore et dolore magna
                                aliquyam.</p>
                            <ul class="flex footer-social">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="w-4/5 sm:w-1/3 md:w-2/5 lg:w-2/6">
                        <div class="mt-12 footer-contact wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="mb-8 text-2xl font-bold text-white">Hubungi Kami </h4>
                            </div>
                            <ul class="contact">
                                <li>+62 852-4048-1678</li>
                                <li>Bulo Gading, Kec. Ujung Pandang, Kota Makassar, Sulawesi Selatan 90174</li>
                                <li>www.dermaga-bangkoa.oraclesip.my.id</li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- flex -->
            </div> <!-- footer widget -->
            <div class="py-8 border-t border-gray-200 footer-copyright">
                <p class="text-white">
                    Template by <a class="duration-300 hover:text-theme-color-2" href="https://tailwindtemplates.co"
                        rel="nofollow" target="_blank">TailwindTemplates</a> and
                    <a class="duration-300 hover:text-theme-color-2" href="https://uideck.com" rel="nofollow"
                        target="_blank">UIdeck</a>
                </p>
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2" class="particles"></div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== PART START ======-->

    <!--
    <section class="">
        <div class="container">
            <div class="flex">
                <div class="col-lg-"></div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->

    @method('modal')
    @livewireScripts


    <!--====== Jquery js ======-->
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1-min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    <!--====== Plugins js ======-->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrolling-nav.js') }}"></script>

    <!--====== wow js ======-->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>

    <!--====== Particles js ======-->
    <script src="{{ asset('assets/js/particles.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script defer src="{{ asset('build/assets/app.ab93cf8a.js') }}"></script>

</body>

</html>
