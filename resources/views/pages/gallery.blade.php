@extends('layouts.master')
@section('styles')
<style>
    .slider-for img{
        margin:0 auto;
        object-fit: cover;
        width: 100%;
    }
    .slider-nav .slick-track{
        height: 200px;
        margin-top: 1rem;
    }
    .slider-nav .slick-list.draggable{
        width: 100%;
        margin: 0 auto;
    }
    .slider-nav .slick-track img{
        height: 100px;
        width: 100%;
        object-fit: cover;
        padding: 0 4px;
    }

    .slick-prev, .slick-next{
        top:-36%;
    }
    .slick-next{
        right: 10%;
    }
    .slick-prev{
        left: 10%;
    }
    .slick-prev,.slick-next svg{
        filter: drop-shadow(0 1px 0.15px #B2B2B2);
        color: white;
    }

    @media (min-width: 992px) { 
        .slider-for img{
                object-fit: unset;
                width: auto;
        }
        .slider-nav .slick-list.draggable{
            width: 75%;
            margin: 0 auto;
        }
        .slider-nav .slick-track img{
            height: 70%;
            width: 170px;
            object-fit: cover;
        }
        .slick-prev, .slick-next{
            top:-92%!important;
        }
        .slick-next{
            right: 15%;
        }
        .slick-prev{
            left: 15%;
        }
    }


    .slick-next:before {
        content: '';
        background-color: white;
    }
    .slick-prev:before {
        content: '';
        background-color: white;
    }
    .slideshow-arrow {
        --arrowsColor: #FFFFFF;
        fill: rgb(255, 255, 255);
    }
    .slick-dots{
        bottom:20px;
    }
    .slick-dots li button:before{
        font-size: 14px;
    }
</style>
@endsection
@section('content')

    <main id="PAGES_CONTAINER">
        @if(session('notification'))
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        
                            <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                    {{session('notification')}}
                                </div>
                            </div>
                    
                    </div>
                </div>
            </div>
        @endif
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-for">
                        <div><img src="{{ asset('assets/images/gallery/pic1.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic2.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic3.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic4.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic5.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic6.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic7.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic8.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic9.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic10.webp') }}" alt=""></div>
                    </div>
                    <div class="slider-nav">
                        <div><img src="{{ asset('assets/images/gallery/pic1.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic2.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic3.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic4.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic5.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic6.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic7.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic8.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic9.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic10.webp') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('footer-scripts')
    <script>
        $(document).ready(function(){
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                autoplay: true,
                autoplaySpeed: 2000,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: true,
                centerMode: true,
                focusOnSelect: true,
                responsive:
                [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            dots: false,
                        }
                    },
                    {
                    breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            dots: false,
                        }
                    }
                ]
            });
           $('.slick-next').html('<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scale(1);"><path class="slideshow-arrow" d="M857.005,231.479L858.5,230l18.124,18-18.127,18-1.49-1.48L873.638,248Z" transform="translate(-855 -230)"></path></svg>');
           $('.slick-prev').html('<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scale(1);"><path class="slideshow-arrow" d="M154.994,259.522L153.477,261l-18.471-18,18.473-18,1.519,1.48L138.044,243Z" transform="translate(-133 -225)"></path></svg>');
        });
    </script>
@endsection