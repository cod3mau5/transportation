@extends('layouts.master')

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
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
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
    <link href="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
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
    <header id="main_header">
        <video id="vid" width="100%" loop autoplay muted>
            <source src="{{ asset('assets/videos/file.mp4') }}" type="video/mp4">
        </video>
        <div class="container top_header py-3">
            <div class="row">
                <div class="col-md-6 text-center">
                    <a class="navbar-brand" href="{{route('homepage')}}">
                        <img src="{{ asset('assets/images/cabo_drivers_logo.png') }}" alt="" class="d-inline-block align-text-top mx-auto mx-0-md">
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    <div class="d-flex justify-content-center w-100 h-100 py-2">
                        <select class="align-middle align-self-center py-2 px-2"  @change="changeLanguage" v-model="lang">
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
                    <ul class="navbar-nav mx-auto text-center mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="{{route('homepage')}}">@{{ text.header.home }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/#about-us">@{{ text.header.about_us }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('gallery')}}">@{{ text.header.gallery }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('contact-us')}}">@{{ text.header.contact_us }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"  href="{{route('book-now')}}">@{{ text.header.book_now }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"  href="/blog">@{{ text.header.things_to_do }}</a>
                    </li>
                    </ul>

                </div>
            </div>
        </nav>
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
            trip_type:'',
            language:''
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
    })
</script>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    <!-- form wizard init -->
    <script>
        $(document).ready(function(){$("#basic-pills-wizard").bootstrapWizard({tabClass:"nav nav-pills nav-justified"}),$("#progrss-wizard").bootstrapWizard({onTabShow:function(a,r,i){var t=(i+1)/r.find("li").length*100;$("#progrss-wizard").find(".progress-bar").css({width:t+"%"})}})});var triggerTabList=[].slice.call(document.querySelectorAll(".twitter-bs-wizard-nav .nav-link"));triggerTabList.forEach(function(a){var r=new bootstrap.Tab(a);a.addEventListener("click",function(a){a.preventDefault(),r.show()})});
    </script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="https://cdn.bootcss.com/moment.js/2.22.1/moment-with-locales.min.js"></script>
    <script src="{{ asset('/assets/bootstrap-datetimepicker.min.js') }}"></script>
    <script  src="{{asset('/assets/jquery.validate.min.js')}}"></script>
    <script  src="{{asset('/assets/additional-methods.min.js')}}"></script>
    <script  src="{{asset('/assets/jquery.blockUI.min.js')}}"></script>
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
