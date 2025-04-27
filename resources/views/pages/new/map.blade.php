@extends('layouts.king')
@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>

:root {
  --bd-palette-primary: #0096c5;    /* botón activo, hover nav */
  --bd-palette-secondary: #005a95;  /* texto normal nav */
}

/* NAV PILL STYLING */
#zoneTabs .nav-link {
  color: var(--bd-palette-secondary);
  background: transparent;
  border: 2px solid var(--bd-palette-secondary);
  transition: background .3s, color .3s;
}
#zoneTabs .nav-link:hover {
  color: #fff;
  background: var(--bd-palette-primary);
  border-color: var(--bd-palette-primary);
}
#zoneTabs .nav-link.active {
  color: #fff;
  background: var(--bd-palette-primary);
  border-color: var(--bd-palette-primary);
}

/* MAP CONTAINER */
.map-container {
  /* conserva proporción exacta */
  aspect-ratio: 279.70621 / 255.94101;
  overflow: hidden;
  border: 2px solid #ddd;
  border-radius: .5rem;
}

/* IMÁGENES APILADAS */
.zone-img {
  object-fit: cover;
  opacity: 0;
  transition: opacity .7s ease-in-out;
  object-position: bottom
}
#zone7{
    object-position: top;
}
.zone-img.active {
  opacity: 1;
  z-index: 1;
}

    </style>
@endsection
@section('global-header')
    @include('includes.google-header-global')
@endsection
@section('content')
    @include('includes.new.booking_bar', ['register' => 'CABO DRIVERS SERVICES','airbnb' => false])
    <main id="PAGES_CONTAINER" tabindex="-1">
        @if (session('notification'))
            <!-- Tus notificaciones -->
        @endif
        <div class="container-fluid">
            <div class="row gx-5 align-items-center">

                <!-- ----- IZQUIERDA: LISTADO DE ZONAS ----- -->
                <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center align-items-center flex-column">
                    <a class="navbar-item mt-4 mb-2" href="{{route('homepage')}}">
                        <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md mobile">
                        <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md desktop" width="246" height="92">
                    </a>
                  <ul class="nav nav-pills flex-column justify-content-center align-items-center" id="zoneTabs" role="tablist">
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link active text-uppercase fw-bold"
                        data-zone="zone1"
                        type="button"
                      >Zone 1 – San José del Cabo</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone2"
                        type="button"
                      >Zone 2 – Puerto Los Cabos &amp; Corridor</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone3"
                        type="button"
                      >Zone 3 – Cabo San Lucas</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone4"
                        type="button"
                      >Zone 4 – Pacific Side</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone5"
                        type="button"
                      >Zone 5 – Todos Santos</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone6"
                        type="button"
                      >Zone 6 – Los Barriles</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link text-uppercase fw-bold"
                        data-zone="zone7"
                        type="button"
                      >Zone 7 – La Paz</button>
                    </li>
                  </ul>
                </div>

                <!-- ----- DERECHA: MAPA CON IMÁGENES FADE ----- -->
                <div class="col-lg-6">
                  <div class="position-relative map-container">
                    <img
                      src="/assets/zones/zone1_san_jose_del_cabo.png?123"
                      id="zone1"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100 active"
                      alt="Zone 1"
                    >
                    <img
                      src="/assets/zones/zone2_puerto_los_cabos_&_tourist_corridor.png?123"
                      id="zone2"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 2"
                    >
                    <img
                      src="/assets/zones/zone3_cabo_san_lucas.png?123"
                      id="zone3"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 3"
                    >
                    <img
                      src="/assets/zones/zone4_pacific_side.png?123"
                      id="zone4"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 4"
                    >
                    <img
                      src="/assets/zones/zone5_todos_santos.png?123"
                      id="zone5"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 5"
                    >
                    <img
                      src="/assets/zones/zone6_los_barriles.png?123"
                      id="zone6"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 6"
                    >
                    <img
                      src="/assets/zones/zone7_la_paz.png?123"
                      id="zone7"
                      class="zone-img position-absolute top-0 start-0 w-100 h-100"
                      alt="Zone 7"
                    >
                  </div>
                </div>
              </div>
            </div>
        </div>

    </main>
@endsection
@section('footer-scripts')
    <script async src="https://www.jscache.com/wejs?wtype=excellent&amp;uniq=603&amp;locationId=23359388&amp;lang=en_US&amp;display_version=2" data-loadtrk onload="this.loadtrk=true"></script>
    <script>
        $(document).ready(function() {
            $('.single-item-rtl').slick({
                autoplay: true,
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
                lang: '{{ app()->getLocale() }}',
                trip_type:'r',
                showAirbnbInfo: false
            },
            beforeMount() {},
            mounted() {
                document.addEventListener('DOMContentLoaded', () => {
                const tabs   = document.querySelectorAll('#zoneTabs .nav-link');
                const imgs   = document.querySelectorAll('.map-container .zone-img');

                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                    const zoneId = tab.dataset.zone;
                    const target = document.getElementById(zoneId);

                    if ( target.classList.contains('active') ) return;

                    // actualizar pestañas
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    // cross-fade: fade‑in nueva y fade‑out resto
                    imgs.forEach(img => {
                        img.id === zoneId
                        ? img.classList.add('active')
                        : img.classList.remove('active');
                    });
                    });
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

                function createHtml(data){
                    for(const img of data){
                        if(img.caption !== undefined){
                            let imgUrl= img.thumbnail_url ? img.thumbnail_url  : img.media_url;

                            document.querySelector('.ig-images').innerHTML+=`
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
            },
            methods: {
                changeLanguage: function() {
                    window.location.href = '/lang/' + this.lang;
                },
                toggleAirbnbInfo() {
                    this.showAirbnbInfo = !this.showAirbnbInfo;
                }
            }
        });
    </script>
@endsection
