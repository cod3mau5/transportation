
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Experience the comfort and convenience of Cabo Drivers Services in Cabo San Lucas. Avoid the headaches and enjoy a worry-free transportation experience with our reliable service. Explore this Mexican paradise without compromising on comfort or quality. Book now and let us take care of your transportation needs while you immerse yourself in the wonders of Cabo San Lucas!">

        @yield('global-header')
        <link rel="stylesheet" href="{{ asset('css/normalize8.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Bootstrap 5 Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>

        <title>
            {{ !empty($pageTitle) ? $pageTitle : 'Private Transfers & Shuttle Options' . config('app.name') }}
        </title>
        @yield('summary-header')
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/king.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

        @yield('styles')

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/> --}}

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <style>
            .text-primary,.text-primary:hover, .text-primary *{
                color: #099680!important;
            }
            #form_step1 .col-lg-4 .mb-3{
                display: flex;
                flex-direction: column;
            }
            .select2-container--default .select2-selection--single {
                background-color: transparent;
                border: 1px solid  var(--main_green);
                border-radius: 4px;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: var(--white);
                margin-left: 10px;
            }
            .select2-container--open .select2-dropdown--below {
                z-index: 10000;
            }
            .select2-container--default .select2-selection--single{
                padding: 1.12rem;
            }
            .select2-container--default .select2-selection--single > span{
                position: relative;
                bottom: 12px;
            }

        </style>


        <style>
            .fade-enter-active, .fade-leave-active {
                transition: opacity .5s
            }
            .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
                opacity: 0
            }
        </style>

    </head>
    <body>

        @yield('header-scripts')

        <div id="app">

            @hasSection('header')
                @yield('header')
            @else
                @include('includes.new.header')
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


                @endif
            </section>
            @include('includes.footer')
        </div>
        <script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=192&amp;locationId=23359388&amp;lang=en_CA&amp;rating=true&amp;nreviews=2&amp;writereviewlink=true&amp;popIdx=false&amp;iswide=false&amp;border=true&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>

        @yield('map')
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
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/king.js') }}" defer></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{asset('assets/libs/slick/slick.min.js')}}"></script>

        <script src="{{asset('assets/libs/vue/vue.dev.js')}}"></script>
        {{-- <script src="{{asset('assets/libs/vue/vue.min.js')}}"></script> --}}
        <script src="{{asset('assets/libs/axios/axios.min.js')}}"></script>

        <script src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
        <script src="{{ asset('/assets/bootstrap-datetimepicker.min.js') }}"></script>
        <script  src="{{asset('/assets/jquery.validate.min.js')}}"></script>
        <script  src="{{asset('/assets/additional-methods.min.js')}}"></script>
        <script  src="{{asset('/assets/jquery.blockUI.min.js')}}"></script>

        @yield('footer-scripts')

        {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <script>
            $('.select2').select2();
        </script>

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
                const gallery=document.querySelector('.ig-images');
                const feed= document.querySelector('.gallery-container');
                const next= document.querySelector('#next');
                const prev= document.querySelector('#prev');
                const token='{{env("IG_GALLERY_TOKEN")}}';
                let limit = 3; // Valor predeterminado para dispositivos no móviles

                // Detectar si la página se carga desde un dispositivo móvil
                if (/Mobi|Android/i.test(navigator.userAgent)) {
                    limit = 2; // Cambiar el límite a 3 para dispositivos móviles
                }

                const url=`https://graph.instagram.com/me/media?fields=thumbnail_url,media_url,caption,permalink&limit=${limit}&access_token=${token}`;
                fetch(url)
                .then(res=> res.json())
                .then(data=>createHtml(data.data))
                .then( setTimeout(function(){$('.ig-images').slick({infinite: true,autoplay:true,autoplaySpeed:2555,arrows:false,speed: 2000,fade: true, cssEase: 'linear'});}, 1444) );

                // function createHtml(data){
                //     for(const img of data){
                //         if(img.caption !== undefined){
                //             let imgUrl= img.thumbnail_url ? img.thumbnail_url  : img.media_url;

                //             gallery.innerHTML+=`
                //                 <div>
                //                     <div class="image overflow">
                //                         <img loading="lazy" src="${imgUrl}" alt="${img.caption.slice(0,30)}">
                //                         <div class="opacity-hover">
                //                             <a href="${img.permalink}" class="caption">
                //                                 <p>
                //                                     ${img.caption.slice(0,80)}
                //                                 </p>
                //                             </a>
                //                     </div>
                //                 </div>
                //             `;
                //         }
                //     }
                // }

                function createHtml(data){
                    for(const img of data){
                        if(img.caption !== undefined){
                            let imgUrl= img.thumbnail_url ? img.thumbnail_url  : img.media_url;

                            gallery.innerHTML+=`
                                <div>

                                        <img loading="lazy" src="${imgUrl}" alt="${img.caption.slice(0,30)}">


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



                    //date & time picker
                    $('#arrival_date_r').datetimepicker({
                        format: 'MM/DD/YYYY',
                        minDate: moment()
                    });

                    $('#departure_date_r').datetimepicker({
                        format: 'MM/DD/YYYY',
                        useCurrent: false,
                    });

                    $('#arrival_date_o_a').datetimepicker({
                        format: 'MM/DD/YYYY',
                        useCurrent: false, //Important! See issue #1075
                        minDate: moment()
                    });

                    $('#departure_date_o_d').datetimepicker({
                        format: 'MM/DD/YYYY',
                        useCurrent: false, //Important! See issue #1075
                        minDate: moment()
                    });


                    $("#arrival_date_r").on("dp.change", function (e) {
                        if ($('#departure_date_r').length) {
                            $('#departure_date_r').data("DateTimePicker").minDate(e.date);
                        }
                    });

                    $("#departure_date_r").on("dp.change", function (e) {
                        $('#arrival_date_r').data("DateTimePicker").maxDate(e.date);
                    });

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
