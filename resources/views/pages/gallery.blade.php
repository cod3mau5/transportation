@extends('layouts.king')
@section('styles')
    <style>
        .ig-images-main img{
            margin: 0 auto;
            object-fit: contain;
            width: 100%;
            max-height: 450px;
        }
        .ig-images-gallery .slick-track{
            height: 200px;
            margin-top: 1rem;
        }
        .ig-images-gallery .slick-list.draggable{
            width: 100%;
            margin: 0 auto;
        }
        .ig-images-gallery .slick-track img{
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
            .ig-images-main img{
                    object-fit: unset;
                    width: auto;
            }
            .ig-images-gallery .slick-list.draggable{
                width: 75%;
                margin: 0 auto;
            }
            .ig-images-gallery .slick-track img{
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
@section('global-header')
    @include('includes.google-header-global')
@endsection
@section('content')

    @include('includes.new.booking_bar',['register'=>'','airbnb'=>false])

    <main id="PAGES_CONTAINER">
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
        <div class="container my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="ig-images-main">
                        <!-- <div><img src="{{ asset('assets/images/gallery/pic1.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic2.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic3.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic4.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic5.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic6.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic7.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic8.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic9.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic10.webp') }}" alt=""></div> -->
                    </div>
                    <div class="ig-images-gallery">
                        <!-- <div><img src="{{ asset('assets/images/gallery/pic1.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic2.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic3.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic4.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic5.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic6.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic7.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic8.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic9.webp') }}" alt=""></div>
                        <div><img src="{{ asset('assets/images/gallery/pic10.webp') }}" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@section('footer-scripts')
    <!-- <script>
        $(document).ready(function(){

        });
    </script> -->
        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    lang: '{{ app()->getLocale() }}',
                    trip_type:'r',
                    showAirbnbInfo: false
                },
                beforeMount() {},
                mounted() {

                    /* FUNCIONALIDAD PARA LA GALERIA DE INSTAGRAM */
                    const gallery_container=document.querySelector('.ig-images-main');
                    const gallery=document.querySelector('.ig-images-gallery');
                    const feed= document.querySelector('.gallery-container');
                    const next= document.querySelector('#next');
                    const prev= document.querySelector('#prev');
                    const token='{{env("IG_GALLERY_TOKEN")}}';
                    let limit = 22; // Valor predeterminado para dispositivos escritorio

                    // Detectar si la página se carga desde un dispositivo móvil
                    if (/Mobi|Android/i.test(navigator.userAgent)) {
                        limit = 10; // Cambiar el límite a 3 para dispositivos móviles
                    }


                    const url=`https://graph.instagram.com/me/media?fields=thumbnail_url,media_url&access_token=${token}`;
                    fetch(url)
                    .then(res=> res.json())
                    .then(data=>createHtml(data.data))
                    .then( setTimeout(function(){

                        $('.ig-images-main').slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                            fade: true,
                            autoplay: true,
                            autoplaySpeed: 2000,
                            asNavFor: '.ig-images-gallery'
                        });
                        $('.ig-images-gallery').slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            asNavFor: '.ig-images-main',
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
                    }, 1444) );


                    function createHtml(data){
                        console.log(data);
                        for(const img of data){
                            if(img.caption !== undefined || img.thumbnail_url !== undefined || img.media_url !== undefined){
                                let imgUrl= img.thumbnail_url ? img.thumbnail_url  : img.media_url;
                                let content=`
                                    <div>
                                        <img loading="lazy" src="${imgUrl}"
                                            alt="${img.caption?.slice(0,30)}">
                                    </div>
                                `;
                                gallery_container.innerHTML+=content;
                                gallery.innerHTML+=content;
                            }
                        }
                    }

                    // Se desactivo el mover la galeria para el beneficio del SEO
                    // next.addEventListener('click',moveGallery);
                    // prev.addEventListener('click',moveGallery);
                    function moveGallery(e){
                        if(e.target.id === "next" || e.target.parentElement.id == "next"){
                            feed.scrollLeft+= feed.offsetWidth;
                        }else{
                            feed.scrollLeft-= feed.offsetWidth;

                        }
                    }

                    $('.slick-next').html('<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scale(1);"><path class="slideshow-arrow" d="M857.005,231.479L858.5,230l18.124,18-18.127,18-1.49-1.48L873.638,248Z" transform="translate(-855 -230)"></path></svg>');
                    $('.slick-prev').html('<svg width="23" height="39" viewBox="0 0 23 39" style="transform: scale(1);"><path class="slideshow-arrow" d="M154.994,259.522L153.477,261l-18.471-18,18.473-18,1.519,1.48L138.044,243Z" transform="translate(-133 -225)"></path></svg>');
                },
                methods: {
                    changeLanguage: function() {
                        window.location.href = '/lang/' + this.lang;
                    }
                }
            });
        </script>
@endsection
