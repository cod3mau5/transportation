@extends('layouts.king')

@section('header-scripts')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/normalize8.min.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.css') }}">
    {{-- <!-- Bootstrap 5 Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        #departure_flight_details{
            display: none;
        }
        .hidden{
            display: none!important;
        }
        .line{
            border-bottom: 1px solid #099680;
        }
        .text-wrap{
            word-break: break-word!important;
        }


        @-webkit-keyframes pulse {
            0% {
                -webkit-box-shadow: 0 0 0 0 rgba(204, 44, 44, 0.8);
            }
            70% {
                -webkit-box-shadow: 0 0 0 10px rgba(204, 44, 44, 0);
            }
            100% {
                -webkit-box-shadow: 0 0 0 0 rgba(204, 44, 44, 0.2);
            }
        }
        @keyframes pulse {
            0% {
                -moz-box-shadow: 0 0 0 0 rgba(204, 44, 44, 0.8);
                box-shadow: 0 0 0 0 rgba(204, 44, 44, 0.4);
            }
            70% {
                -moz-box-shadow: 0 0 0 10px rgba(204, 44, 44, 0.2);
                box-shadow: 0 0 0 10px rgba(204, 44, 44, 0);
            }
            100% {
                -moz-box-shadow: 0 0 0 0 rgba(204, 44, 44, 0);
                box-shadow: 0 0 0 0 rgba(204, 44, 44, 0);
            }
        }

        .finalButton {
            display: none;
        }
        .pvw-title:after {
            animation: pulse 1.2s infinite;
            content: 'whatever it is you want to add';
        }
    </style>
    <style>
        .card{
            box-shadow: 1px 5px 26px -3px rgba(0,0,0,0.58);
            -webkit-box-shadow: 1px 5px 26px -3px rgba(0,0,0,0.58);
            -moz-box-shadow: 1px 5px 26px -3px rgba(0,0,0,0.58);
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}"> --}}
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <style>
        .text-primary,.text-primary:hover, .text-primary *{
            color: #099680!important;
        }
        #form_step1 .col-lg-4 .mb-3{
            display: flex;
            flex-direction: column;
        }
        .select2-container--default .select2-selection--single{
            padding: 1rem;
        }
        .select2-container--default .select2-selection--single > span{
            position: relative;
            bottom: 12px;
        }

    </style>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


@endsection

@section('header')
    <div class="mobileTopPhones">
        <div class="touch">
            <strong>OUR PHONES <i class="fa fa-chevron-down showhide" aria-hidden="true"></i></strong>
        </div>
        <div class="strong">
            <a href="tel:18555779836">1 777 755 744</a>
            <small>Toll Free USA / Canada</small>
        </div>
        <div class="item">
            <img loading="lazy" width="28" height="28" src="/assets/images/flags/mex-flag.png"
                alt="Mexico flag icon" title="Call Cancun Airport Transportation from Mexico">
            <span>Los Cabos Local:</span>
            <a href="tel:9984008543">(998) 400 8543</a>
        </div>
        <div class="item">
            <i class="fa fa-whatsapp" style="color:#1DA075; font-family:'FontAwesome';" aria-hidden="true"></i>
            <span>Whatsapp:</span>
            <a href="https://api.whatsapp.com/send?phone=529981954408&amp;text=Hi! I'm coming from Cancun Airport Transportation and I would like to make a reservation"
                target="_blank" rel="noopener noreferrer nofollow">+52 998 195 4408</a>
        </div>
        <div class="item">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span>Rest of the world:</span>
            <a href="tel:9989803458">(998) 980 3458</a>
        </div>
    </div>
    <section class="top-bar">

        <div class="container">

            <div class="row row-nomrg">

                <div class="columns six navigationTopBar">
                    <a href="/es/nosotros" title="Acerca de Nosotros - Cabo San Lucas Airport Transportation">Nosotros</a> -
                    <a href="/es/galeria" title="Galería - Transportación Privada en Cabo">Galería</a> -
                    <a href="/blog/" title="Blog - Cabo Airport Transportation">Blog</a>
                </div>

                <div class="columns ten">

                    <a href="/" class="languageOption">EN</a>
                    <a href="/es" class="languageOption">ES</a>

                    <div class="boxPhones">
                        <i class="fa fa-phone" aria-hidden="true"></i> <strong>(624) 110 4185</strong> <i
                            class="fa fa-caret-down" aria-hidden="true"></i>

                        <div class="information">
                            <div class="tollfree">
                                <span>Gratis USA / Canada -</span> <strong>(624) 110 4185</strong>
                                <div><small>Lun - Dom / 7:00 AM - 11:00 PM (GMT-7)</small></div>
                            </div>
                            <div class="emailInfo">
                                <a href="mailto:info@cabodrivers.com"><i class="fa fa-envelope" aria-hidden="true"></i>
                                    info@cabodrivers.com</a>
                            </div>
                            <div class="rowphone"><img
                                    src="/assets/images/flags/mex-flag.png"
                                    alt="Reserva Cabo Drivers Services por teléfono"
                                    title="Llama a Cabo Drivers Services desde México"> <span>Los cabos Local:</span>
                                <strong>(624) 110 4185</strong></div>
                            <div class="rowphone">
                                <i class="fa fa-whatsapp" style="color:#1DA075;font-family:'FontAwesome';" aria-hidden="true"></i>
                                <span>Whatsapp:</span> 
                                <strong>
                                    <a
                                        href="https://api.whatsapp.com/send?phone=5216241104185&text=¡Hola! Vengo de la pagina de Cabo Drivers Services y me gustaría reservar sus servicios"
                                        target="_blank" rel="noopener noreferrer nofollow">(624) 110 4185</a>
                                    </strong>
                            </div>
                            <!-- <div class="rowphone">
                                <i class="fa fa-globe" aria-hidden="true"></i> 
                                <span>Resto del Mundo:</span> 
                                <strong>(000) 000 0000</strong>
                            </div> -->
                            <div class="chatheader">
                                <i class="fa fa-comments" aria-hidden="true"></i> <span>Chat en linea</span>
                                <div>Lunes - Domingo / 7:00 AM - 11:00 PM </div>
                                <a href="#" id="buttonTriggerChat">CHAT</a>
                            </div>
                        </div>
                    </div>

                    <div class="clr"></div>

                </div>

            </div>

        </div>
    </section>
    <header id="main_header">
        <video id="vid" width="100%" loop autoplay muted>
            <source src="{{ asset('assets/videos/file.mp4') }}" type="video/mp4">
        </video>

        <section class="container containerLogoMenu">

            <div class="row row-nomrg">

                <div class="columns four boxMasterLogo">
                    <div class="box-logo">
                        <a href="/">
                            <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt=""
                                class="d-inline-block align-text-top mx-auto mx-0-md mobile">
                            <img src="{{ asset('assets/images/cabo_drivers_logo.webp') }}" alt=""
                                class="d-inline-block align-text-top mx-auto mx-0-md desktop" width="246" height="92">
                        </a>

                        <i class="fa fa-navicon burgerNavIcon" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="columns twelve">
                    <nav>
                        <ul class="menu">
                            {{-- <li>
                                    <a title="Cancun Airport Transportation" class="current"
                                        href="https://www.cancunairporttransportations.com/es/">
                                        INICIO
                                    </a>
                                </li>
                                <li class="optionJustMobile"><a
                                        title="Acerca de Nosotros - Cancun Airport Transportation"
                                        href="https://www.cancunairporttransportations.com/es/nosotros">NOSOTROS</a>
                                </li>
                                <li><a title="Servicios de Transportación en Cancún"
                                        href="https://www.cancunairporttransportations.com/es/servicios-de-transporte">SERVICIOS</a>
                                </li>
                                <li><a title="Transportación privada y de lujo a Cancún y Riviera Maya"
                                        href="https://www.cancunairporttransportations.com/es/destinos-cancun-riviera-maya">DESTINOS</a>
                                </li>
                                <li><a title="Reservar transportación en Cancún y Riviera Maya"
                                        href="https://www.cancunairporttransportations.com/es/reservar-transporte-cancun">RESERVAR</a>
                                </li>
                                <li><a title="Tours en Cancún y Riviera Maya"
                                        href="https://www.cancunairporttransportations.com/es/cancun-tours/">TOURS</a>
                                </li>
                                <li><a title="Precios de transportación en Cancún"
                                        href="https://www.cancunairporttransportations.com/es/precios-transporte-cancun">PRECIOS</a>
                                </li>
                                <li class="optionJustMobile"><a
                                        title="Galería - Transportación Privada en Cancún"
                                        href="https://www.cancunairporttransportations.com/es/galeria">GALERIA</a>
                                </li>
                                <li><a title="Contáctanos para reservar tu transportación en Cancún"
                                        href="https://www.cancunairporttransportations.com/es/contacto-transporte-cancun">CONTACTO</a>
                                </li>
                                <li class="optionJustMobile"><a
                                        title="Programa de Afiliados - Transportación Privada en Cancún"
                                        href="https://www.cancunairporttransportations.com/es/afiliados/">AFILIADOS</a>
                                </li> --}}
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('homepage') }}">{{ __('pages/includes/header.menu.home') }}</a>
                            </li>
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link" href="/#about-us">{{ __('pages/includes/header.menu.about_us') }}</a>
                            </li>
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link" href="{{ route('gallery') }}" tabindex="-1"
                                    aria-disabled="true">{{ __('pages/includes/header.menu.gallery') }}</a>
                            </li>
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link" href="{{ route('contact-us') }}" tabindex="-1"
                                    aria-disabled="true">{{ __('pages/includes/header.menu.contact_us') }}</a>
                            </li>
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link" href="{{ route('book-now') }}" tabindex="-1"
                                    aria-disabled="true">{{ __('pages/includes/header.menu.book_now') }}</a>
                            </li>
                            <li class="nav-item bg-only-mobile">
                                <a class="nav-link" href="/blog" tabindex="-1"
                                    aria-disabled="true">{{ __('pages/includes/header.menu.things_to_do') }}</a>
                            </li>
                        </ul>

                        <div class="optionJustMobile mobileLanguageOptions" style="display: none;">
                            <div class="langOption">
                                <a href="/es">
                                    <img src="/assets/images/flags/mexico.png">
                                    <span>ES</span>
                                </a>
                            </div>
                            <div class="langOption">
                                <a href="/eng">
                                    <img src="/assets/images/flags/estados-unidos.png">
                                    <span>ENG</span>
                                </a>
                            </div>
                        </div>
                    </nav>

                </div>

            </div>

        </section>
    </header>
@endsection

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">

        <!-- Reservation form begin -->
        <div class="container reserve-form-container">
            @if(session('notification'))
                <div class="card-body">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('notification')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                </div>
            @endif

            <div class="row">

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title mb-4 fs-2 text-center m-font m-color">@{{ text.book_now.form.title }}</h2>
                            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}


                            <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                <ul class="twitter-bs-wizard-nav">

                                        <li class="nav-item" v-for="t in text.book_now.form.steps">
                                            <a :href="'#step'+t.number "
                                            class="nav-link"
                                            data-toggle="tab"
                                            style="pointer-events: none;cursor: not-allowed;">
                                                <span class="step-number">0@{{ t.number }}</span>
                                                <span class="step-title">@{{ t.name }}</span>
                                            </a>
                                        </li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content twitter-bs-wizard-tab-content">
                                    {{-- ============================ STEP 1 ==============================  --}}
                                        @include('pages.booking_form.steps.step1')
                                    {{-- ============================ STEP 2 ==============================  --}}
                                        @include('pages.booking_form.steps.step2')
                                    {{-- ============================ STEP 3 ==============================  --}}
                                        @include('pages.booking_form.steps.step3')

                                </div>
                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                    <li class="previous">
                                        <button class="btn btn-primary">
                                            @{{ text.book_now.form.buttons.previous }}
                                        </button>
                                    </li>
                                    <li class="next">
                                        <button class="btn btn-primary go_step2">
                                            @{{ text.book_now.form.buttons.next }}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    @include('pages.booking_form.summary')
                </div>

            </div>

        </div>
        <!-- Reservation form end -->
    </div>
@endsection

@section('footer-scripts')

<script>
    var app = new Vue({
        el: '#app',
        data: {
            about_us:'{{ empty($about_us) ? false : true }}',
            addedShoppingStop:false,
            recalculate:true,
            arrival_previous_stop:false,
            departure_previous_stop:false,
            lang: '{{ app()->getLocale() }}',
            specialRequest:{
                boosterSeat:false,
                carSeat:false,
                shoppingStop: false,
            },
            start_location:'',
            text: @json($language),
            type: '{{$trip_type}}',
            trip_type:'{{ ($trip_type == "o_a" || $trip_type == "o_d") ? "o" : ($trip_type == "r" ? "r" : "") }}',
            language:'',
            arrival_date:"{{ !empty($arrival_date) ? $arrival_date : '' }}",
            departure_date:"{{ !empty($departure_date) ? $departure_date : '' }}"
        },
        beforeMount(){
        },
        mounted() {
            this.changeLanguage('{{ app()->getLocale()}}');
            document.getElementById('vid').play();
            if(this.about_us == true){
                $('html, body').animate({
                    scrollTop: $("#about-us").offset().top
                }, 850);
            }

            if(this.trip_type=='One Way'){
                $('#trip_type option[value="o"]');
            }else{
                $('#trip_type option[value="r"]');
                $('#trip_typeoption:eq(1)').attr('selected', 'selected');
            }
        },
        methods:{
            changeLanguage: function(lang){

                lang=(lang == 'en'||lang=='es')? lang :this.lang
                console.log(lang);
                axios.get('{{ route("getLanguages",'') }}/'+lang).then((r)=>{
                    this.text = r.data;
                    console.log(this.text);
                }).then(()=>{
                    $('.sm_start').html($('#start_location option:selected').text());
                    $('.sm_end').html($('#end_location option:selected').text());

                    if(localStorage.getItem('step') == 3){
                        $('#language').val() == "1" ? $('.go_step2').html('Finish Booking') : $('.go_step2').html('Finalizar Reserva');
                    }

                    if ($('#trip_type').val() == 'r') {
                        if($('#language').val() == "1"){
                            $('.sm_trip').html('roundtrip');
                        }else{
                            $('.sm_trip').html('De Ida y Vuelta');
                        }
                        $('#departure_flight_details').slideDown();
                    } else {
                        if($('#language').val() == "1"){
                            $('.sm_trip').html('oneway');
                        }else{
                            $('.sm_trip').html('De Ida');
                        }
                        $('#departure_flight_details').slideUp();
                    }

                });
            }
        }
    });
    // Vue.config.devtools = true;
</script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    <!-- form wizard init -->
    <script>
        $(document).ready(function(){$("#basic-pills-wizard").bootstrapWizard({tabClass:"nav nav-pills nav-justified"}),$("#progrss-wizard").bootstrapWizard({onTabShow:function(a,r,i){var t=(i+1)/r.find("li").length*100;$("#progrss-wizard").find(".progress-bar").css({width:t+"%"})}})});var triggerTabList=[].slice.call(document.querySelectorAll(".twitter-bs-wizard-nav .nav-link"));triggerTabList.forEach(function(a){var r=new bootstrap.Tab(a);a.addEventListener("click",function(a){a.preventDefault(),r.show()})});
    </script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('assets/js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-datetimepicker.min.js') }}"></script>
    <script  src="{{asset('assets/jquery.validate.min.js')}}"></script>
    <script  src="{{asset('assets/additional-methods.min.js')}}"></script>
    <script  src="{{asset('assets/jquery.blockUI.min.js')}}"></script>
    <script>
        var units = @json($vehicles);
        var rates = @json($rates);
        var resort_options= '<?php echo $resort_options ?>';
    </script>
    <script src="{{ asset('/assets/form_wizzard.js') }}"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('.select2').select2();
</script>
@endsection
