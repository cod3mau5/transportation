Online chatOnline chatOnline chat
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Experience the comfort and convenience of Cabo Drivers Services in Cabo San Lucas. Avoid the headaches and enjoy a worry-free transportation experience with our reliable service. Explore this Mexican paradise without compromising on comfort or quality. Book now and let us take care of your transportation needs while you immerse yourself in the wonders of Cabo San Lucas!">

        @yield('global-header')

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Bootstrap 5 Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>

        <title>Inicio | {{ config('app.name') }}</title>
        @yield('summary-header')
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/> --}}
        <style>
            /*normalize custom*/
            body{
                background-color: #fff!important;
            }
            /*Helpers*/
            .s-bg{
                background-color: #e4eefb;
            }
            .s2-color,.s2-color *{
                color:#3D9BE9;
            }
            .text-white{
                color:#fff;
            }
            .fs-big,.fs-big *{
                font-size: 3rem;
            }
            .fs-medium,.fs-medium *{
                font-size: 4rem;
            }
            .m-font,.m-font *{
                font-family: poppins-semibold, poppins, sans-serif;
            }
            .m-color{
                color: #41baae!important;
            }
            .s-color{
                color:#397dcf;
            }

            .float-right{
                float: right!important;
            }

            @media(min-width:1024px){
                .fs-big,.fs-big *{
                    font-size: 3.2rem;
                }
            }
            /*components*/
            .book-btn{
                background: #6AA4E9;
                padding: 1rem 3rem;
                font-family: Arial,Helvetica,sans-serif;
                border-radius: 0;
                color: #fff;
                transition: all 0.2s ease, visibility 0s;
            }
            .send-btn{
                background-color: #41baae;
                font-family: Arial,Helvetica,sans-serif;
                padding: 1rem 3rem;
                border-radius: 0;
                color: #fff;
                transition: all 0.2s ease, visibility 0s;
            }
            /*Header*/
            #main_header{
                position: relative;
            }
            #vid{
                object-fit: cover;
                object-position: center center;
                opacity: 1;
                min-width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
            }
            .top_header a img{
                position: relative;
                width: 70%;
            }
            .navbar{
                background-color:rgba(57,125,207, 0.6);
                bottom: 0;
                color: #f1f1f1;
                width: 100%;
                padding: 20px;
            }
            .navbar ul li{
                font-family: Arial,Helvetica,sans-serif;
            }
            .navbar ul li a{
                font-size: 2rem!important;
                font-weight: bolder;
            }
            .navbar-light .navbar-toggler{
                background-color: #fff;
                border: 2.5px solid #41baae;
                height: 50px;
                width: 50px;
                border-radius: 7px;
                padding: 0!important;
            }
            .navbar-light .navbar-toggler .fa{
                font-size: 2rem;
                color: #41baae!important;
            }
            /*HOME*/
            .bg-img{
                background-color: #ffffffc6;
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: 1000;
                top: 0;
            }
            .circle{
                border-radius: 50%;
            }
            @media (min-width: 992px) {
                .top_header a img{
                    width:45%;
                }
                .navbar-expand-lg .navbar-nav .nav-link {
                    padding-right: 0.9rem!important;
                    padding-left: 0.9rem!important;
                }
                .navbar ul li a{
                    font-size: 1rem!important;
                }
            }
            /**footer*/
            #SITE_FOOTER ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            .social-icons{
                display: flex!important;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row;
            }
            .social-icons li{
                display: inline-flex;
            }
            .social-icons li i{
                color: #999999!important;
            }
            .footer-form input, .footer-form textarea{
                background: #e5ebed;
                border: none;
                border-radius: 2px;
            }
            .footer-form input, .footer-form textarea:focus{
                background: #e5ebed!important;
            }
            #SITE_FOOTER .line{
                height: 2px!important;
                color: #397dcf;
                width: 7%;
            }


            /* IG pageGallery */
            .w-100 {
                width: 100%;
            }

            .h-100 {
                height: 100%;
            }

            .overflow {
                overflow: hidden;
            }

            #ig_container {
                margin: 0;
                width: 100%;
            }

            .gallery-container{
                width: 100%;
                overflow: hidden;
                scroll-behavior: smooth;
            }
            .main-gallery {
                width: 100%;
                display: flex;
                align-items: center;
                position: relative;
            }

            .chevron span {
                display: flex;
                align-items: center;
                position: absolute;
                z-index: 1;
                font-size: 2rem;
                color: rgb(157, 217, 238);
                width: 4.3rem;
                height: 4.7rem;
                background-color: rgba(23, 23, 23, 0.9);
                border-radius: 100%;
                cursor: pointer;
            }

            .chevron span:hover {
                background-color: rgba(23, 23, 23, 0.6);
            }

            .chevron #prev {
                padding-right: 0.5rem;
                justify-content: flex-end;
                left: -1.7rem;
            }

            .chevron #next {
                padding-right: 0.5rem;
                justify-content: flex-start;
                right: -1.7rem;
            }

            .gallery {
                display: flex;
                flex-wrap: nowrap;
                padding-bottom: 10px;
            }

            .image {
                min-width: 20%;
                height: 273px;
                position: relative;
            }

            .image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .image:hover .opacity-hover {
                width: 100%;
            }

            .caption {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                text-align: center;
                transform: translateY(300px);
                transition: transform 100ms linear;
            }

            .opacity-hover:hover .caption {
                transform: translateY(0px);
            }

            .caption p {
                color: white;
                width: 80%;
            }

            .opacity-hover {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                transition: background-color 300ms linear;
            }

            .opacity-hover:hover {
            background-color: rgba(2, 2, 2, 0.8);
            }

            /* Estilos específicos para dispositivos móviles */

            @media (max-width: 768px) {
                .gallery-container,
                .gallery {
                    flex-wrap: wrap; /* Cambia el comportamiento a envolver en lugar de no envolver */
                    justify-content: center; /* Centra las imágenes cuando se envuelven */
                }

                .image {
                    min-width: 95%;
                    margin: 5px; /* Agrega un margen entre las imágenes envueltas */
                }

                .caption p {
                    width: 100%; /* Ocupa todo el ancho disponible en dispositivos móviles */
                }
                .chevron{
                    display: none;
                }
            }


            /*  WHATSAPP BUTTON */
            .whatsapp-btn span{
                color: #444;
                position: fixed;
                bottom: 20px;
                right: 20px;
                font-size: 12px;
            }
            .whatsapp-btn a{
                position: fixed;
                bottom: 44px;
                right: 40px;
                padding: 13px 15px;
                font-size: 2.777rem;
                background-color: rgb(37 211 102);
                border-radius: 50px;
                font-weight: bold;
                display: flex;
                align-items: center;
                text-decoration: none;
                z-index: 100;
                color: #fff;
            }

            /* FORM PREVIOUS STOP */
            .previous-stop{
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.1rem;
                margin-top: 1rem;
                margin-bottom: 1.3rem;
            }
            .previous-stop label{
                margin: 0!important;
            }
            .previous-stop small{
                margin-left: 1rem;
            }
            .previous-stop input{
                margin-left:.3rem;
            }
            .arrival-stop{
                display: none;
            }
            .departure-stop{
                display: none;
            }

            .desktop{
                display: none!important;
            }
            .mobile{
                    display: block!important;
            }
            @media(min-width:1200px){
                .desktop{
                    display: block!important;
                }
                .mobile{
                    display: none!important;
                }
            }
        </style>
        @yield('styles')
    </head>
    <body>

        @yield('header-scripts')

        <div id="app">
            @hasSection('header')
                @yield('header')
            @else
                @include('includes.header')
            @endif

                @yield('content')
                {{-- FEED Instagram --}}
                <section id="ig_container" class="desktop">
                    <div class="main-gallery">
                        {{-- left --}}
                        {{-- <div class="chevron">
                            <span id="prev" class="material-symbols-outlined">
                                arrow_back_ios_new
                            </span>
                        </div> --}}

                        {{-- gallery --}}
                        <div class="gallery-container">
                            <div class="gallery"></div>
                        </div>

                        {{-- right --}}
                        {{-- <div class="chevron">
                            <span id="next" class="material-symbols-outlined">
                                arrow_forward_ios
                            </span>
                        </div> --}}
                    </div>

                    @if(
                        Route::current()->getName() == 'inicio' ||
                        Route::current()->getName() == 'homepage' ||
                        Route::current()->getName() == 'gallery'
                    )
                        {{-- <div id="whatsapp-btn" class="whatsapp-btn">
                            <a
                                href="https://api.whatsapp.com/send?phone=5216241104185&text=%F0%9F%91%8B%20hello%2C%20I%20come%20from%20the%20page%20and%20I%20want%20information%20about..."
                                target="_BLANK">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <span>We are on WhatsApp</span>
                        </div> --}}

                    <!--Start of Tawk.to Script-->
                    <script type="text/javascript">
                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                        (function(){
                        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                        s1.async=true;
                        s1.src='https://embed.tawk.to/64b36e90cc26a871b028a9a2/1h5eefp4o';
                        s1.charset='UTF-8';
                        s1.setAttribute('crossorigin','*');
                        s0.parentNode.insertBefore(s1,s0);
                        })();

                    </script>
                    <!--End of Tawk.to Script-->
                    @endif
                </section>
            @include('includes.footer')
        </div>
@yield('map')
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('assets/libs/slick/slick.min.js')}}"></script>

        <script src="{{asset('assets/libs/vue/vue.min.js')}}"></script>
        <script src="{{asset('assets/libs/axios/axios.min.js')}}"></script>

        @yield('footer-scripts')
        <script>
            $(document).ready(function() {
                'use strict'

                // Generar un identificador de visitante único si no existe uno
                var visitorId = getVisitorId();
                if (!visitorId) {
                    visitorId = generateVisitorId();
                    setVisitorId(visitorId);
                }

                // Recolectar información del visitante
                var data = {
                    visitor_id: visitorId,
                    device: navigator.platform,
                    browser: navigator.userAgent,
                    referer: document.referrer
                    // la ubicación se recogerá en el servidor
                };

                // Enviar la información al servidor
                $.post('/api/visits', data, function(response) {
                    console.log(response);
                });



                /* FUNCIONALIDAD PARA LA GALERIA DE INSTAGRAM */
                const gallery=document.querySelector('.gallery');
                const feed= document.querySelector('.gallery-container');
                const next= document.querySelector('#next');
                const prev= document.querySelector('#prev');
                const token='{{env("IG_GALLERY_TOKEN")}}';

                let limit = 5; // Valor predeterminado para dispositivos no móviles

                // Detectar si la página se carga desde un dispositivo móvil
                if (/Mobi|Android/i.test(navigator.userAgent)) {
                    limit = 3; // Cambiar el límite a 3 para dispositivos móviles
                }

                const url=`https://graph.instagram.com/me/media?fields=thumbnail_url,media_url,caption,permalink&limit=${limit}&access_token=${token}`;
                fetch(url)
                .then(res=> res.json())
                .then(data=>createHtml(data.data));

                function createHtml(data){
                    for(const img of data){
                        if(img.caption !== undefined){
                            let imgUrl= img.thumbnail_url ? img.thumbnail_url  : img.media_url;

                            gallery.innerHTML+=`
                                <div class="image overflow">
                                    <img loading="lazy" src="${imgUrl}" alt="${img.caption.slice(0,30)}">
                                    <div class="opacity-hover">
                                        <a href="${img.permalink}" class="caption">
                                            <p>
                                                ${img.caption.slice(0,80)}
                                            </p>
                                        </a>
                                </div>
                            `;
                        }
                    }
                }

                // Se desactivo el mover la galeria para el beneficio del SEO
                // next.addEventListener('click',moveGallery);
                // prev.addEventListener('click',moveGallery);
                // function moveGallery(e){
                //     if(e.target.id === "next" || e.target.parentElement.id == "next"){
                //         feed.scrollLeft+= feed.offsetWidth;
                //     }else{
                //         feed.scrollLeft-= feed.offsetWidth;

                //     }
                // }

            });

            function generateVisitorId() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                });
            }

            function getVisitorId() {
                return localStorage.getItem('visitorId');
            }

            function setVisitorId(visitorId) {
                localStorage.setItem('visitorId', visitorId);
            }
        </script>

        <script>

            //here's all you need
            Tawk_API.onLoad = function() {
            setTimeout(function() {
                // Tawk_API.minimize();
                // Tawk_API.login({
                //     hash : 'safdsdgfsdhfsdrewfdzfsdghsf',    // required
                //     userId : '1234',            // required
                //     id : 'A1234',
                //     store : 'Midvalley',
                // }, function(error) {
                //     alert('algo fallo');
                // });
                window.Tawk_API.onChatStarted = function(){
                    alert('un cliente inicio sesion');
                };
                }, 1);

            };


        </script>
    </body>
</html>
