@extends('layouts.hotelsMaster')
@section('header-scripts')
    {{-- <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@900&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        main{
            background: rgb(246,246,246);
            background: radial-gradient(circle, rgba(246,246,246,1) 32%, rgba(246,246,246,0.6839110644257703) 63%, rgba(219,219,219,0.40940126050420167) 81%, rgba(68,68,68,0.4234068627450981) 100%);
            padding-bottom: 80px;
            min-height: 100%;
        }

        @media only screen and (min-width:1200px) {}
        @media only screen and (min-width:1100px) {}
        @media only screen and (max-width:920px) {}
        @media only screen and (max-width:840px) {}
        @media only screen and (max-width:767px) {}
        @media only screen and (max-width:480px) {}
        @media only screen and (max-width: 767px){}
        @media only screen and (max-width:320px) {}

        #cover-image{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: end;
            height: 450px;
            @if(count($gallery) >= 3)
                background-image:url("{{url($coverImg->path)}}");
            @endif
            background-size:cover;
            background-position:center;
        }


        .cover-title{
            background-color: rgba(255,255,255,0.6);
            padding: 1rem 3rem;
            font-size: 1.7rem;
            margin-bottom: 3.777rem;
            font-weight: bolder;
        }
        @media(min-width:1024px){
            #cover-image{
                height: 650px;
            }
            .cover-title{
                font-size: 3rem;
            }
        }


        .container.gallery {
            position: relative;
        }

        #slide-left, #slide-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.7);
            border: none;
            border-radius: 50%;
            font-size: 2rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
            z-index: 1;
        }

        #slide-left {
            left: 10px;
        }

        #slide-right {
            right: 10px;
        }
        #hotel-gallery {
            position: relative;
            overflow-x: hidden;
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            padding: 1rem;
        }
        #hotel-gallery img {

            width: auto;
            height: 300px;
            object-fit: cover;
            scroll-snap-align: center;
        }
        input[type="button"]{
            padding: 1rem 2rem;
            background-color: #6AA4E9;
            border: none;
            border-radius: 0px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.7rem;
            word-wrap: break-word;
            white-space: normal;
        }

        @media only screen and (min-width:768px) {
            input[type="button"]{
                font-size: 1rem;
            }
        }
        @media only screen and (min-width:920px) {
            input[type="button"]{
                font-size: 1.2rem;
            }
        }

    </style>

@endsection

@section('header')
    <header id="main_header">
        <video id="vid" width="100%" loop autoplay muted>
            <source src="{{ asset('assets/videos/file.mp4') }}" type="video/mp4">
        </video>
        <div class="container top_header pt-2 pb-1">
            <div class="row">
                <div class="col-md-5 text-center">
                    <a class="navbar-brand d-flex" href="{{route('homepage')}}">
                        <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md mobile">
                        <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md desktop" width="246" height="92">

                    </a>
                </div>
                <div class="col-md-7 text-center">
                    <div class="d-flex justify-content-center w-100 h-100 py-1">
                        <select class="align-middle align-self-center py-1 px-2"  @change="changeLanguage" v-model="lang">
                            <option value="es"@if ( app()->getLocale() == 'es') selected @endif>español</option>
                            <option value="en" @if ( app()->getLocale() == 'en') selected @endif>english</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <nav class="navbar navbar-expand-lg navbar-light py-0">
            <div class="container-fluid justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-auto text-center mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white active" aria-current="page" href="{{route('homepage')}}">{{ __("pages/includes/header.menu.home") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/#about-us">{{ __("pages/includes/header.menu.about_us") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('gallery')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.gallery") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('contact-us')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.contact_us") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('book-now')}}" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.book_now") }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/blog" tabindex="-1" aria-disabled="true">{{ __("pages/includes/header.menu.things_to_do") }}</a>
                </li>
                </ul>

            </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')

    <main id="hotel">

            @if ($errors->any())
                <div class="ui negative message mt-2" >
                    <i class="close icon" @click="closeErrorMessage"></i>
                    @foreach ($errors->all() as $error)
                        <div style="font-weight:bolder">
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach
                </div>
            @endif


            <div class="container-fluid">
                <div class="row cover-container">
                    <div class="col-md-12 text-center" id="cover-image">
                        <h1 class="text-center cover-title">{{$hotel->name}} <br> Transportation</h1>
                    </div>
                </div>
            </div>

            <div class="container description py-4">
                {!! $hotel->description !!}
            </div>

            @if(count($gallery) >= 3)
                <div class="container gallery">
                    <button id="slide-left"><i class="fa fa-chevron-left"></i></button>
                    <button id="slide-right"><i class="fa fa-chevron-right"></i></button>
                    <div class="row" id="hotel-gallery">
                        @foreach($gallery as $img)
                            <img src="{{url($img->path)}}"/>
                        @endforeach
                    </div>
                </div>
            @endif

    </main>

@endsection

@section('footer-scripts')

    @if(count($gallery) >= 3)
        <script>
            $(document).ready(function(){
                const hotel="{{$hotel->name}}";
                buttons=document.querySelectorAll("input[type='button']");
                buttons.forEach(button => {
                    var link = document.createElement('a');
                    link.href = 'https://cabodrivers.com/book-now';
                    link.target = '_blank';
                    // Insertar el enlace antes del botón en el DOM
                    button.parentNode.insertBefore(link, button);
                    // Mover el botón dentro del enlace
                    link.appendChild(button);
                    button.value="Book Transportation To "+hotel+" Now";
                });
                const images = document.querySelectorAll('#hotel-gallery img');
                let imgCount = images.length;
                let imgWidth;
                let currentIndex = 0;

                if (imgCount > 6) {
                    imgWidth = 100 / 6;
                } else {
                    imgWidth = 100 / imgCount;
                }

                for (let img of images) {
                    img.style.flex = `0 0 ${imgWidth}%`;
                }

                const slideLeft = document.getElementById('slide-left');
                const slideRight = document.getElementById('slide-right');

                if (!slideLeft) {
                    console.error("No se pudo encontrar el botón #slide-left");
                } else {
                    slideLeft.addEventListener('click', () => {
                        console.log('Botón izquierdo pulsado');
                        if (currentIndex > 0) {
                            currentIndex--;
                            images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                        }
                    });
                }

                if (!slideRight) {
                    console.error("No se pudo encontrar el botón #slide-right");
                } else {
                    slideRight.addEventListener('click', () => {
                        console.log('Botón derecho pulsado');
                        if (currentIndex < imgCount - 1) {
                            currentIndex++;
                            images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                        }
                    });
                }
        });

        </script>
    @endif

@endsection
