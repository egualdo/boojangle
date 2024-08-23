<!doctype html>
<html class="no-js"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @yield("title") </title>
        {{-- <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
        integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async>
    </script> --}}
        @include('layout.inc.linksMeta')
        @include('layout.inc.linksCss')

    </head>

    <body style="background-color: black">
        {{-- @include('inc.variables') --}}
        @include('layout.inc.linksJs')
        @include('inc.barratop')
        {{-- @include('inc.menu') --}}
        @yield("content")  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        {{-- <link href="{{ asset('homePublic/css/newsletters.css') }}" rel="stylesheet">
        <link href="{{ asset('homePublic/css/modalletstalk.css') }}" rel="stylesheet"> --}}
        
        
        {{-- //libreria de ligthSlider --}}
        <link rel="stylesheet" href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script> 
         {{-- //libreria de ligthSlider --}}
        

        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                freeMode: true,
                loop: true,
                // centeredSlides: false,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                autoplay: {
                    delay: 2800,
                },

            });

            var swiper2 = new Swiper(".mySwiper2", {

                slidesPerView: 1,
                freeMode: true,
                loop: true,
                // centeredSlides: false,
                spaceBetween: 0,
                navigation: {
                    nextEl: ".swiper-button-next2",
                    prevEl: ".swiper-button-prev2",
                },
                autoplay: {
                    delay: 2800,
                },


            });
        </script>
       
    </body>

</html>