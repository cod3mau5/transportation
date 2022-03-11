
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

@yield('global-header')

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Bootstrap 5 Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <title>Inicio | {{ config('app.name') }}</title>
@yield('summary-header')
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
                    font-size: 5rem;
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
                    about_us:'{{ empty($about_us) ? false : true }}',
                    language: '{{ $langUpdate }}',
                    specialRequest:{
                        boosterSeat:false,
                        carSeat:false,
                        shoppingStop: false,
                    },
                    routes:{
                        home:'{{ route("inicio","1") }}',
                        gallery:'{{ route("gallery","1") }}',
                        contact_us:'{{ route("contact-us","1") }}',
                        book_now:'{{ route("book-now","1") }}',
                    },
                    text: @json($language)
                },
                beforeMount(){
                    this.changeLanguage();
                },
                mounted() {
                    this.changeLanguage();
                    document.getElementById('vid').play();
                    if(this.about_us == true){
                        $('html, body').animate({
                            scrollTop: $("#about-us").offset().top
                        }, 850);
                    }
                },
                methods:{
                    changeLanguage: function(){
                        
                        if(this.language == 1){
                            this.routes.home= this.routes.home.replace('/0','/'+this.language);
                            this.routes.gallery= this.routes.gallery.replace('/0','/'+this.language);
                            this.routes.contact_us= this.routes.contact_us.replace('/0','/'+this.language);
                            this.routes.book_now= this.routes.book_now.replace('/0','/'+this.language);
                        }
                        if(this.language == "0"){
                            console.log(typeof(this.language));
                            this.routes.home= this.routes.home.replace('/1','/'+this.language);
                            this.routes.gallery= this.routes.gallery.replace('/1','/'+this.language);
                            this.routes.contact_us= this.routes.contact_us.replace('/1','/'+this.language);
                            this.routes.book_now= this.routes.book_now.replace('/1','/'+this.language);
                        }
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
