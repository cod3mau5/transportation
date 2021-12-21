
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Bootstrap 5 Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <title>Inicio | {{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
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
                font-size: 5rem;
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
                    width:auto;
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
        </style>
        @yield('styles')
    </head>
    <body>

        @yield('header-scripts')

        <div id="app">
            @include('includes.header')
                @yield('content')
            @include('includes.footer')
        </div>
@yield('map')
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <script>
            var app = new Vue({
                el: '#app',
                data: {
                    language: 1,
                    text:{
                        "header": {
                            "home":"Home",
                            "about_us":"About Us",
                            "gallery":"Gallery",
                            "contact_us":"Contact Us",
                            "book_now":"Book Now"
                        },
                        "home":{
                            "txt_hero":{
                                "txt1":"LIVE LOS CABOS",
                                "txt2":"Tourist Transportation Service, Airport / Hotel, Transfers and City tour.",
                                "txt3":"Wonderful day to travel."
                            }
                        },
                        "about_us":{
                            "title1":{
                                "title":"Life is a journey make it amazing !!",
                                "txt":"Life goes by so fast, enjoy the now and come to LOS CABOS to spend the best vacations, we will make it a wonderful experience, we are the best option for tourist transport in LOS CABOS."
                            },
                            "title2":{
                                "title":"Cabo Driver Services",
                                "txt1":"We offer them a quality service and professionalism in addition to having highly trained personnel to attend to the needs of the client, we have accessible prices and special packages.",
                                "txt2":"100% personalized attention, our commitment is to be with our clients from the moment they start planning their trip to Los Cabos, from their arrival, transfer, activities and tours until their departure. We include a concierge service to make your reservations that provides general information."
                            }
                        },
                        "contact_us":{
                            "title":"Contact Us",
                            "map":{
                                "title":"How to get?"
                            },
                            "form":{
                                "name":"Name:",
                                "email":"Email address:",
                                "phone":"Phone:",
                                "message":"Message:",
                                "send_btn":"Send"
                            }
                        },
                        "book_now":{
                            "form":{
                                "title": "Book Now",
                                "trip_type":{
                                    "oneway": "One Way",
                                    "roundtrip":"Round Trip"
                                },
                                "buttons":{
                                    "next":"Next",
                                    "previous":"Previous"
                                },
                                "steps":[
                                    {
                                        "name":"Trip",
                                        "number":"1"
                                    },
                                    {
                                        "name":"Contact",
                                        "number":"2"
                                    },
                                    {
                                        "name":"Confirm Detail",
                                        "number":"3"
                                    }
                                ],
                                "step_trip":{
                                    "trip_type":"Trip Type",
                                    "start_location":"Start Location",
                                    "end_location":"End Location",
                                    "number_travelers":"Number of travelers",
                                    "children":"Number of children",
                                    "trip_location_title":{"name":"Trip","to":"TO"},
                                    "trip1":{
                                        "arrival":"",
                                        "arrival_date":"Arrival Date",
                                        "arrival_airline":"Arrival Airline Company",
                                        "arrival_flight_time":"Arrival Flight Time",
                                        "arrival_flight_number":"Arrival Flight Number"
                                    },
                                    "trip2":{
                                        "departure":"",
                                        "departure_date":"Departure Date",
                                        "departure_airline":"Departure Airline Company",
                                        "departure_flight_time":"Departure Flight Time",
                                        "departure_flight_number":"Departure Flight Number"
                                    }
                                },
                                "step_contact":{
                                    "first_name":"First Name",
                                    "last_name":"Last Name",
                                    "email":"Email",
                                    "phone_number":"Phone Number",
                                    "comments":"Comments"
                                },
                                "step_details":{
                                    "title":"Confirm Detail",
                                    "paragraph":"Please confirm your travel details below. Currently you can pay with cash upon arrival. If you wish to get in touch with us please call +52 1 (624) 146 1383 or cabodriverloscabos@gmail.com",
                                    "trip_type":"Trip Type",
                                    "start_location":"Start Location:",
                                    "end_location":"End Location:",
                                    "arrival_time":"Arrival Time:",
                                    "arrival_airline":"Arrival Airline:",
                                    "arrival_flight":"Arrival Flight:",
                                    "departure_time":"Departure Time:",
                                    "departure_airline":"Departure Airline",
                                    "departure_flight":"Departure Flight:",
                                    "name":"Name:",
                                    "Email":"Email:",
                                    "phone":"Phone:",
                                    "aditional_info":"",
                                    "total_price":"Total Price",
                                    "pay_method":"Pauy Method"
                                }
                            },
                            "summary":{
                                "title":"Summary",
                                "start_location":"Start Location",
                                "end_location":"End Location",
                                "trip_type":"Trip Type",
                                "total":"Total"
                            }
                        },
                        "footer":{
                            "contact_info":{
                                "title":"Contact Us",
                                "ul":[
                                    {
                                        "li":"Ask me what you want ... I'm here for any question you have."
                                    },                
                                    {
                                        "li":"San José del Cabo, Baja California Sur, México."
                                    },
                                    {
                                        "li":"Office 624-110-41-85"
                                    },
                                    {
                                        "li":"Mobile 624-161-15-48 / 624-157-80-43"
                                    },
                                    {
                                        "li":"info@cabodriver.com"
                                    }
                                ]
                            },
                            "send_mail":{
                                "title":"Send us an email",
                                "email_placeholder":"Enter your email here",
                                "send_mail_btn":"Send"
                            }
                        }
                    }
                },
                beforeMount(){
                    this.changeLanguage();
                },
                mounted() {
                    this.changeLanguage();
                    document.getElementById('vid').play();
                    
                },
                methods:{
                    changeLanguage: function(){
                        axios.get('{{ route("getLanguages",'') }}/'+this.language).then((r)=>{
                            this.text = r.data;
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
                @yield('footer-scripts')
    </body>
</html>
