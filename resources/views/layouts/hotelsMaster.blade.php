
<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="{{$record->meta_description}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <!-- Bootstrap 5 Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>

        <title>{{$record->name}} Transportation | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/king.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">

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
                height: auto;
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
                @include('includes.new.header')
            @endif

                @yield('content')


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

    </body>
</html>
