@extends('layouts.master')
@section('styles')
    <style>
        .bg-arch{
            background: linear-gradient(    0deg,
                                            rgba(255, 255, 255, 0.777),
                                            rgba(255, 255, 255, 0.777)
                                        ),
                        url("{{ asset('assets/images/arch.webp') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position-y: 40%;
        }
        .vehicles_home img{
            height: auto;
            max-width: 100%;
        }
        @media(max-width:1024px){
            .vehicles_home img{
                max-height: 200px;
                width: auto;
            }
        }
        .vehicles_home .row>div{
            text-align: center;
        }
        .vehicles_home.desktop{
            display: none;
        }
        .vehicles_home.mobile{
                display: block;
        }
        @media(min-width:1200px){
            .vehicles_home.desktop{
                display: block;
            }
            .vehicles_home.mobile{
                display: none;
            }
        }
    </style>
@endsection
@section('global-header')
    @include('includes.google-header-global')
@endsection
@section('content')

<main id="PAGES_CONTAINER" tabindex="-1">
    @if(session('notification'))
        <!-- Tus notificaciones -->
    @endif
    <div class="container-fluid bg-arch">
        <div class="row">
            <div class="col-md-8 offset-md-2 px-0 text-center m-font">
                <h1 class="fs-1 my-5 m-color">{{ __('pages/home.home.txt_hero.txt1') }}</h1>
                <h3 class="fs-1 my-5 s-color">{{ __('pages/home.home.txt_hero.txt2') }}</h3>
                <h2 class="fs-big my-3 my-md-5 pb-md-5 pb-3 px-2 px-md-0 m-color text-break">{{ __('pages/home.home.txt_hero.txt3') }}</h2>
            </div>
        </div>
    </div>

    <div class="container my-5" id="about-us">
        <div class="row">
            <div class="col-md-2 offset-md-2">
                <img src="{{ asset('assets/images/arch_mini.webp') }}" class="circle" alt="Arch of Cabo San Lucas">
            </div>
            <div class="col-md-6 py-3">
                <h3 class="fs-1 m-font m-color">
                    {{ __('pages/home.about_us.title1.title') }}
                </h3>
                <p class="fs-6">{{ __('pages/home.about_us.title1.txt') }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5 s-bg">
        <div class="row">
            <div class="col-md-4 offset-md-2">
                <h1 class="mb-5" style="color:#002e5d">{{ __('pages/home.about_us.title2.title') }}</h1>
                <p style="color:#002e5d;text-align:justify" class="fs-5">
                    {{ __('pages/home.about_us.title2.txt1') }}
                </p>
                <p style="color:#002e5d;text-align:justify" class="fs-5">
                    {{ __('pages/home.about_us.title2.txt2') }}
                </p>
            </div>
            <div class="col-md-4">
                <div class="single-item-rtl">
                    <div><img src="{{ asset('assets/images/home-slider/pic1.webp') }}" alt="whale in los cabos"></div>
                    <div><img src="{{ asset('assets/images/home-slider/pic2.webp') }}" alt="Arch and kayak in los cabos"></div>
                    <div><img src="{{ asset('assets/images/home-slider/pic3.webp') }}" alt="Beach sight los cabos"></div>
                    <div><img src="{{ asset('assets/images/home-slider/pic4.webp') }}" alt="Beautifull sunset in los cabos"></div>
                    <div><img src="{{ asset('assets/images/home-slider/pic5.webp') }}" alt="Church in city tour los cabos"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5 vehicles_home desktop">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Suburban</h5>
                <img src="{{ asset('assets/images/units/suburban.webp') }}" width="356" height="168" alt="Suburban unit">
            </div>
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Hiace</h5>
                <img src="{{ asset('assets/images/units/hiace.webp') }}" width="356" height="168" alt="Hiace unit">
            </div>
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Bus</h5>
                <img src="{{ asset('assets/images/units/bus.webp') }}" width="356" height="168" alt="Bus unit">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center my-4">
                <a href="{{ route('book-now',1) }}" class="book-btn text-white">{{ __('pages/home.components.book_now_btn') }}</a>
            </div>
        </div>
    </div>
    <div class="container py-5 vehicles_home mobile">
        <div class="row">
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Suburban</h5>
                <img src="{{ asset('assets/images/units/suburban.webp') }}" alt="Suburban unit">
            </div>
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Hiace</h5>
                <img src="{{ asset('assets/images/units/hiace.webp') }}" alt="Hiace unit">
            </div>
            <div class="col-md-4">
                <h5 class="text-center fs-1 m-font m-color">Bus</h5>
                <img src="{{ asset('assets/images/units/bus.webp') }}" alt="Bus unit">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center my-4">
                <a href="{{ route('book-now',1) }}" class="book-btn text-white">{{ __('pages/home.components.book_now_btn') }}</a>
            </div>
        </div>
    </div>

</main>
@endsection
@section('footer-scripts')
    <script>
        $(document).ready(function(){
            $('.single-item-rtl').slick({
                autoplay:true,
                dots: false,
                autoplaySpeed: 2300,
                arrows: false,
            });

        });
    </script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                lang:'{{app()->getLocale()}}',
            },
            beforeMount(){
            },
            mounted() {

            },
            methods:{
                changeLanguage: function(){
                    window.location.href = '/lang/' + this.lang;
                }
            }
        })
    </script>
@endsection
