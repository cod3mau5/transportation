@extends('layouts.king')
@section('styles')
    <style>
        .bg-welcome img {
            /* background-image: url('assets/images/home/suburban_service.jpeg');
                background-position: center;
                background-size: cover; */
            object-fit: cover;
            object-position: top;
            width: 100%;
        }

        .bg-arch {
            background: url("{{ asset('assets/images/arch.webp') }}") center center no-repeat fixed;
            background-repeat: no-repeat;
            background-position-y: 40%;
            background-size: cover;
            color: #fff;
            text-align: center;
            position: relative;
            padding: 0;
        }
        .bg-arch .row{
            position: relative;
            min-height: 720px;
            margin: 0 auto;
        }
        .mask{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,.588)
        }
        .mask > div{
            height: 100%;
        }
        .bg-arch p{
            letter-spacing: 1.777px;
            line-height: 1.777;
        }
        .bg-arch h2{
            font-weight: bolder;
        }

        .vehicles_home img {
            height: auto;
            max-width: 100%;
        }

        @media(max-width:1024px) {
            .vehicles_home img {
                max-height: 200px;
                width: auto;
            }
        }

        .vehicles_home .row>div {
            text-align: center;
        }

        .vehicles_home.desktop {
            display: none;
        }

        .vehicles_home.mobile {
            display: block;
        }

        @media(min-width:1200px) {
            .vehicles_home.desktop {
                display: block;
            }

            .vehicles_home.mobile {
                display: none;
            }
        }
        .box.is-full img{
            max-width: 100%;
        }
        .gallery-btn{
            color: var(--white);
            background-color: var(--dark_main_blue);
            border-radius: 4px;
            padding: 10px 10px 5px;
            border: 1px solid transparent;
            text-align: center;
            line-height: 2.1;
        }
    </style>
@endsection
@section('global-header')
    @include('includes.google-header-global')
@endsection
@section('content')
    @include('includes.new.booking_bar', ['register' => 'CABODRIVERS AIRPORT TRANSPORTATION'])
    <main id="PAGES_CONTAINER" tabindex="-1">
        @if (session('notification'))
            <!-- Tus notificaciones -->
        @endif
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-md-6 px-0 bg-welcome">
                    <img src="assets/images/home/suburban_service.jpeg" alt="Cabo San Lucas Airport Transportation Service">
                </div>
                <div class="col-md-6 py-5 px-5 d-flex flex-column justify-content-evenly">
                    <h2>YOUR TRUSTED CABO SAN LUCAS AIRPORT TRANSPORTATION</h2>
                    <p>
                        Welcome to <strong>Cabo Drivers Services</strong>. With over 20 years in the business, we specialize
                        in reliable airport transfers throughout Cabo San Lucas and the San Jose del Cabo area.
                    </p>

                    <p>
                        We take pride in offering <strong>private</strong>, <strong>secure</strong>, and dependable
                        transportation from the Cabo San Lucas Airport to your hotel, hostel, or accommodation in various
                        locations within Cabo, including <a href="/hotel/Pueblo-Bonito-Sunset"><b>Pueblo Bonito</b></a>, <a href="/hotel/RIU-Palace"><b>RIU</b></a>, <a href="/hotel/Sheraton-Hacienda-del-Mar"><b>Sheraton</b></a>, <a href="/hotel/Diamante"><b>Diamante</b></a> and many more.
                    </p>

                    <p>
                        We know that after landing at Cabo San Lucas Airport, your priority is to reach your destination
                        quickly and efficiently. That's why, with our pre-booking service, we guarantee that a
                        <strong>private</strong>, <strong>safe </strong> and <strong>swift</strong> ride is waiting for you
                        upon arrival.
                    </p>
                    <p>
                        At <strong>Cabo Drivers Services</strong>, we strive to meet all your transportation needs. We
                        provide private rides to and from any hotel, condo, or house within the popular Cabo regions. You
                        have the flexibility to choose either a One-Way or a Roundtrip ride.
                    </p>
                    <p>
                        Say goodbye to long queues for taxis. Our professional team is ready to provide you with an
                        exceptional service upon your arrival at Cabo San Lucas Airport. We offer a range of transfer
                        services in different types of vehicles suitable for varying needs. Whether it's our Private Cabo
                        service with spacious vans, our Luxury Cabo service with SUVs such as the Suburban, our Premium Cabo
                        service with Escalades or our Group Cabo service with larger vans or minibuses, we've got you
                        covered.
                    </p>
                    <p>
                        One of the best things about Cabo Drivers Services? We make it incredibly easy to reserve your ride.
                        With our unique "cash on arrival" concept, there's no need to use a credit card, debit card, or
                        PayPal when making your booking. Simply fill out our form, and we'll register your reservation and
                        confirm it via email or mobile phone. You only pay when you arrive at the airport and meet your
                        driver. It's that simple and safe. So sit back, relax, and start your vacation right with Cabo
                        Drivers Services – where you're always our priority!
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-arch">
            <div class="row">
                <div class="mask">
                    <div class="col-md-8 offset-md-2 px-0 d-flex flex-column justify-content-center text-center m-font">
                        <h2 class="mt-2 mb-5 fs-1">
                            WHY CHOOSE CABO DRIVERS SERVICES
                        </h2>
                        <p>
                            Cabo Drivers Services specializes in offering personalized transport solutions. With us, you enjoy a
                            ride tailored just for you or your group, no shared journeys. Our fleet is equipped and ready to
                            deliver top-notch transfers from Cabo San Lucas Airport.

                            Our most sought-after service, the Private Transportation Service, caters to up to 8 passengers,
                            ensuring your comfort and privacy. For larger parties of up to 16 passengers, we offer our Group
                            Transportation Service in spacious, well-equipped vehicles.

                            For those seeking an added touch of elegance, our Luxury Transportation Service, offered in high-end
                            SUVs, is sure to exceed your expectations.

                            At Cabo Drivers Services, we're not just another transportation company. We’re your trusted partner
                            in ensuring a smooth and enjoyable travel experience in Cabo.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row index-services bg_dark_main_blue">
                <div class="text-white px-5">
                    <h2 class="text-primary"><b>LOS CABOS TRANSPORTATION SERVICES</b></h2>
                    <p>
                        At Cabo Drivers Services, we take pride in offering top-notch transportation services with a touch of luxury and comfort. Our fleet comprises elegant and comfortable vehicles to cater to all your airport transfer needs from Cabo San Lucas Airport. Booking your rides is effortless and can be done seamlessly through our user-friendly website.

                        Whether you're headed to your hotel, Airbnb, or condo, our private van service can accommodate up to 8 people, ensuring a personalized and smooth experience. For larger groups of up to 16 people, our Group transportation is an ideal choice. And for those seeking a touch of extravagance, our Luxury transportation featuring SUV vehicles like Suburbans is at your disposal.

                        But our services extend beyond airport transfers. Explore the captivating beauty of Cabo and detinations like La paz, and Todo Santos with our wide range of transfer options. Whether it's an excursion to a nearby attraction or a leisurely journey through the picturesque landscapes, we have you covered.
                    </p>
                    <p>
                        Discover the ease and luxury of travel with Cabo Drivers Services. Let us be your reliable partner in exploring the wonders of Cabo San Lucas and beyond. Book now and elevate your travel experience to new heights!
                    </p>

                    <div class="item-service">
                        <i class="fa fa-plane title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Airport to <span>Hotel</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Arriving in Los Cabos to experience the stunning beauty of the region? Let us take care of your transportation from the airport to your hotel, ensuring a seamless and comfortable start to your Cabo adventure.</p>
                        <!-- <a  class="link">Book an Airport to Hotel service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-building title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Hotel</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Need to move from one fabulous hotel to another during your stay in Los Cabos? Our hotel-to-hotel transfer service will assist you in making the transition smoothly and conveniently, so you can focus on enjoying every moment of your luxurious journey.</p>
                        <!-- <a  class="link">Book an Hotel to Hotel service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-cutlery title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Restaurant</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Indulge in the culinary delights of Los Cabos without worrying about driving. Our hotel-to-restaurant transportation service ensures you savor every exquisite dish and beverage at your chosen dining spot, and return to your hotel safely.</p>
                        <!-- <a  class="link">Book an Hotel to Restaurant service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-life-buoy title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Specific Destination</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Venture into the magic of Los Cabos' iconic attractions! Whether it's The Arch of Cabo San Lucas, Lover's Beach, Todos Santos, or the artistic San Jose del Cabo Art District, our transportation service will take you to your desired destination with ease and style.
                        </p>
                        <!-- <a  class="link">Book an Hotel to Park service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-institution title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">City <span>Tour</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Uncover the fascinating history and heritage of Los Cabos on an enthralling city tour. Immerse yourself in the ancient wonders of Cabo San Lucas's Pirámide de Tule or San Jose del Cabo's Wirikuta Garden. Let us be your guide as we unveil the captivating stories of this millennia-old culture.</p>
                        <!-- <a  class="link">Book an Hotel to Archeological service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>

                </div>
            </div>
        </div>

        <section class="container-fluid" id="box-services" >
            <div class="container-fluid px-5 my-4">
                <div class="row mb-0">
                    <div class="col-md-3 px-3">
                        <div class="item">
                            <article class="box is-full">
                                <a href="/los-cabos-private-transportation"
                                    title="Los Cabos Airport Private Transportation">
                                    <img alt="Los Cabos Airport Private Transportation"
                                        title="Los Cabos Airport Private Transportation"
                                        src="/assets/images/units/hiace_side.jpg">
                                </a>
                                <h3><a href="/los-cabos-private-transportation"
                                        title="Los Cabos Airport Private Transportation">LOS CABOS PRIVATE
                                        <span>TRANSPORTATION</span></a></h3>
                                <div class="body">
                                    <p>This Transportation is available for all our destinations, service is provided in a
                                        VW Transporter for up to 10 passengers. <small>(Kids/Iinfants are considered as
                                            passengers)</small></p>
                                    <div class="rate">
                                        <strong>79<small>USD</small></strong>
                                        <span>FROM</span>
                                    </div>
                                    <a href="/los-cabos-private-transportation"
                                        title="Los Cabos Airport Private Transportation">Details <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3 px-3">
                        <div class="item">
                            <article class="box is-full">
                                <a href="/los-cabos-luxury-transportation" title="Los Cabos Airport Luxury Transportation">
                                    <img alt="Los Cabos Airport Luxury Transportation"
                                        title="Los Cabos Airport Luxury Transportation"
                                        src="/assets/images/units/suburban_side_basic.png">
                                </a>
                                <h3><a href="/los-cabos-luxury-transportation"
                                        title="Los Cabos Airport Luxury Transportation">LOS CABOS LUXURY
                                        <span>TRANSPORTATION</span></a></h3>
                                <div class="body">
                                    <p>This Transportation is available for all our destinations, service is provided in a
                                        Suburban or Similar for up to 6 passengers <small>(Kids/Infants are considered as
                                            passengers)</small>.</p>
                                    <div class="rate">
                                        <strong>88<small>USD</small></strong>
                                        <span>FROM</span>
                                    </div>
                                    <a href="/los-cabos-luxury-transportation"
                                        title="Los Cabos Airport Luxury Transportation">Details <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3 px-3">
                        <div class="item">
                            <article class="box is-full">
                                <a href="/los-cabos-premium-transportation"
                                    title="Los Cabos Airport Premium Transportation">
                                    <img alt="Los Cabos Airport Premium Transportation"
                                        title="Los Cabos Airport Premium Transportation"
                                        src="{{ asset('assets/images/units/suburban_side_premium.png') }}"></a>
                                <h3><a href="/los-cabos-premium-transportation"
                                        title="Los Cabos Airport Premium Transportation">LOS CABOS PREMIUM
                                        <span>TRANSPORTATION</span></a></h3>
                                <div class="body">
                                    <p>This Transportation is available for all our destinations, service is provided in a
                                        Escalade or Similar for up to 5 passengers <small>(Kids/Infants are considered as
                                            passengers)</small>.</p>
                                    <div class="rate">
                                        <strong>105<small>USD</small></strong>
                                        <span>FROM</span>
                                    </div>
                                    <a href="/los-cabos-premium-transportation"
                                        title="Los Cabos Airport Premium Transportation">Details <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-3 px-3">
                        <div class="item">
                            <article class="box is-full">
                                <a href="/los-cabos-group-transportation" title="Los Cabos Airport Group Transportation">
                                    <img alt="Los Cabos Airport Group Transportation"
                                        title="Los Cabos Airport Group Transportation"
                                        src="{{ asset('assets/images/units/bus_side.png') }}">
                                </a>
                                <h3><a href="/los-cabos-group-transportation"
                                        title="Los Cabos Airport Group Transportation">LOS CABOS GROUP
                                        <span>TRANSPORTATION</span></a></h3>
                                <div class="body">
                                    <p>This Transportation is available for all our destinations, service is provided in a
                                        Toyota Transit or similar for up to 16 people <small>(Kids/Infants are considered as
                                            passengers)</small>.</p>
                                    <div class="rate">
                                        <strong>132<small>USD</small></strong>
                                        <span>FROM</span>
                                    </div>
                                    <a href="/los-cabos-group-transportation"
                                        title="Los Cabos Airport Group Transportation">Details <i
                                            class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        {{--
        <div class="container my-5" id="about-us">
            <div class="row">
                <div class="col-md-2 offset-md-2">
                    <img src="{{ asset('assets/images/arch_mini.webp') }}" class="circle" alt="Arch of Cabo San Lucas">
                </div>
                <div class="col-md-6 py-3">
                    <h3 class="fs-1 m-font m-color">
                        {{ __('pages/home.about_us.title1.title') }}
                    </h3>
                    <p class="fs-6">{{ __('pages/home.about_us.title1.txt') }}</p>
                </div>
            </div>
        </div>
        --}}


        {{--
        <div class="container-fluid py-5 s-bg">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h1 class="mb-5" style="color:#002e5d">{{ __('pages/home.about_us.title2.title') }}</h1>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        {{ __('pages/home.about_us.title2.txt1') }}
                    </p>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        {{ __('pages/home.about_us.title2.txt2') }}
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="single-item-rtl">
                        <div><img src="{{ asset('assets/images/home-slider/pic1.webp') }}" alt="whale in los cabos"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic2.webp') }}"
                                alt="Arch and kayak in los cabos"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic3.webp') }}" alt="Beach sight los cabos">
                        </div>
                        <div><img src="{{ asset('assets/images/home-slider/pic4.webp') }}"
                                alt="Beautifull sunset in los cabos"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic5.webp') }}" alt="Church in city tour los">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}

        <div class="container-fluid isPopular py-5 s-bg px-5">
            <h3><a href="destinations" title="Private Los Cabos Airport Transportation to San Lucas and San Jose del Cabo">LOS CABOS AIRPORT TRANSPORTATION´ S</a></h3>
            <h4>POPULAR DESTINATIONS</h4>
            <div class="row">
                <div class="col-md-3 columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to San Jose del Cabo">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/san_jose_del_cabo.jpeg')}}" alt="San Jose del Cabo Airport Transportation to San Jose del Cabo" title="San Jose del Cabo Airport Transportation to San Jose del Cabo">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to San Jose del Cabo" class="text-primary">San Jose del Cabo</a>
                    <p class="text-secondary">Cabo is known worldwide. Transportation to San Jose Del Cabo from San Jose Airport is approximately 15 - 20 Minutes.</p>
                </div>
                <div class="col-md-3 columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Puerto Los Cabos & Corredor">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/puerto_los_cabos.jpg')}}" alt="San Jose del Cabo Airport Transportation Puerto Los Cabos & Corredor" title="San Jose del Cabo Airport Transportation Puerto Los Cabos & Corredor">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Puerto Los Cabos & Corredor" class="text-primary">Puerto Los Cabos & Corredor</a>
                    <p class="text-secondary">Puerto Los Cabos & Corredor is a new trendy  destination. Transportation Puerto Los Cabos & Corredor is approximately 25 - 35 Minutes.</p>
                </div>
                <div class="col-md-3 columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Cabo San Lucas">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/csl.jpg')}}" alt="San Jose del Cabo Airport Transportation to Cabo San Lucas" title="San Jose del Cabo Airport Transportation to Cabo San Lucas">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Cabo San Lucas" class="text-primary">Cabo San Lucas</a>
                    <p class="text-secondary">Cabo San Lucas is a really  city in . Transportation to Cabo San Lucas from San Jose Airport 15 - 25 Minutes</p>
                </div>
                <div class="col-md-3 columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Pacific Side">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/pacific_side.webp')}}" alt="San Jose del Cabo Airport Transportation to Pacific Side" title="Cabo Airport Transportation to Pacific Side">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Pacific Side" class="text-primary">Pacific Side</a>
                    <p class="text-secondary">Pacific Side is the hottest of all destination. Transportation to Pacific Side from San Jose del Cabo Airport is about 1 Hour 10 Minutes.</p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row boxReasonHome py-4 mt-3">
                <div class="col-md-5 offset-md-1">
                    <img title="Los Cabos Airport Transportation" alt="los cabos airport transportation" src="{{ asset('assets/images/units/hiace_blanco.png') }}" class="reasonsImage">
                </div>
                <div class="col-md-5 offset-md-1">
                    <h2 class="">WHY OUR CLIENTS PREFER US</h2>
                    <ul class="listReasons">
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            100% <strong>Private transfers</strong>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Non-stop service <small>(unless asked by the customer)</small>.
                        </li>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Available for any number of passengers.
                        </li>
                        {{-- <li>
                            <i class="fa fa-check-circle-o"></i>
                            Get the best prices. If you see any better price, we'll match it.
                        </li> --}}
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Insured and authorized vehicles.
                        </li>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Flight tracking.
                        </li>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Airport meet and greet.
                        </li>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Secure Pay on Arrival payment method option.
                        </li>
                        <li>
                            <i class="fa fa-check-circle-o"></i>
                            Pre-book and free from worries.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row boxReasonHome bg-main-green py-0 mt-3">
                <div class="col-md-5 p-0 pr-5 ig-images">
                    {{-- <img title="Los Cabos Airport Transportation" alt="los cabos airport transportation" src="{{ asset('assets/images/units/hiace_blanco.png') }}" class="reasonsImage"> --}}
                </div>
                <div class="col-md-6 p-5 text-center">
                    <h2 class="ta-center text-secondary" style="text-transform:capitalize">Discover Extraordinary Cabo Shuttle Experiences!</h2>
                    <p class="listReasons text-secondary fs-5">
                        Welcome to Cabo Drivers, where we go beyond simple taxi rides to provide an extraordinary shuttle service in Cabo San Lucas. Our commitment to quality, safety, and comfort ensures that each journey with us becomes a cherished memory. Explore our constantly updated gallery to witness the joy and excitement shared by our satisfied passengers. Let us redefine your travel experience and create unforgettable moments together. Book your ride now and embark on a seamless adventure with us!
                    </p>
                    <a class="gallery-btn" href="/gallery">VIEW GALLERY</a>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('footer-scripts')
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
                trip_type:'r'
            },
            beforeMount() {},
            mounted() {
                // alert();
            },
            methods: {
                changeLanguage: function() {
                    window.location.href = '/lang/' + this.lang;
                }
            }
        })
    </script>
@endsection
