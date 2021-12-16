@extends('layouts.master')
@section('styles')
    <style>
        .bg-arch{
            background: linear-gradient(0deg, rgba(255, 255, 255, 0.777), rgba(255, 255, 255, 0.777)),url("{{ asset('assets/images/arch.webp') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position-y: 40%;
        }
    </style>
@endsection
@section('content')

    <main id="PAGES_CONTAINER" tabindex="-1">
        @if(session('notification'))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card-body">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{session('notification')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        @endif
        <div class="container-fluid bg-arch">
            <div class="row">
                <div class="col-md-8 offset-md-2 px-0 text-center m-font">
                    <h2 class="fs-1 my-5 m-color">@{{ text.home.txt_hero.txt1 }}</h2>
                    <h1 class="fs-1 my-5 s-color">@{{ text.home.txt_hero.txt2 }}</h1>
                    <h2 class="fs-big my-5 pb-5 m-color text-break">@{{ text.home.txt_hero.txt3 }}</h2>
                </div>
            </div>
        </div>

        <div class="container my-5" id="about-us">
            <div class="row">
                <div class="col-md-2 offset-md-2">
                    <img src="{{ asset('assets/images/arch_mini.webp') }}" class="circle">
                </div>
                <div class="col-md-6 py-3">
                    <h3 class="fs-1 m-font m-color">@{{ text.about_us.title1.title }}</h3>
                    <p class="fs-6">@{{ text.about_us.title1.txt }}</p>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5 s-bg">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h1 class="mb-5" style="color:#002e5d">@{{ text.about_us.title2.title }}</h1>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        @{{ text.about_us.title2.txt1 }}
                    </p>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        @{{ text.about_us.title2.txt2 }}
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="single-item-rtl">
                        <div><img src="{{ asset('assets/images/home-slider/pic1.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic2.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic3.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic4.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic5.webp') }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center fs-1 m-font m-color">Suburban</h1>
                    <img src="{{ asset('assets/images/units/suburban.webp') }}" class="w-100">
                </div>
                <div class="col-md-6">
                    <h1 class="text-center fs-1 m-font m-color">Hiace</h1>
                    <img src="{{ asset('assets/images/units/hiace.webp') }}" class="w-100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('book-now') }}" class="book-btn text-white">Book Now</a>
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
@endsection