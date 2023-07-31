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
                        locations within Cabo, including [hyperlinks to different area pages].
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
                    <p>At Cancun Airport Transportation ® we have really nice and comfortable vehicles to provide you with your airport transfers from Cancun Airport, you can automatically reserve all of these services on our website. Services we provide, like we said above can be from the Cancun Airport to your Hotel Airbnb or Condo and these can be private transportation on a van for up to 8 people, Group transportation on a Crafter Van for up to 16 people or Luxury transportation provided with SUV vehicles like Suburbans.</p>
                    <p>Apart from the Airport Transportation services, we can also take you anywhere. We have a wide range of service to transfer you around Cancun and the Riviera Maya:</p>

                    <div class="item-service">
                        <i class="fa fa-plane title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Airport to <span>Hotel</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">You have come to enjoy the Caribbean and surely you need transportation to your Hotel or Airport, this service is the ideal for you.</p>
                        <!-- <a  class="link">Book an Airport to Hotel service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-building title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Hotel</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Need to change from one hotel to another while in Cancun? We help you with this transportation hotel-to-hotel.</p>
                        <!-- <a  class="link">Book an Hotel to Hotel service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-cutlery title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Restaurant</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">When you relax on your vacation, probably the least you want to do is drive and even more if you plan to drink! We can take you to your restaurant and return to your hotel.</p>
                        <!-- <a  class="link">Book an Hotel to Restaurant service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-life-buoy title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">Hotel to <span>Specific Destination</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">Are you visiting Xcaret or Xel Ha? Or probably Xoximilco or the Mayan Museum in Cancun. At Cancun Airport Transportation we can take you to any of these parks.</p>
                        <!-- <a  class="link">Book an Hotel to Park service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="item-service">
                        <i class="fa fa-institution title-icon text-white" aria-hidden="true"></i>
                        <strong class="text-white">City <span>Tour</span></strong>
                        <div class="clr"></div>
                        <p class="text-primary">One of the best things you can do in Cancun is to visit a Mayan Site like Chichen Itza or Tulum or Coba and get to know all about this millennial culture, so let us take you there!</p>
                        <!-- <a  class="link">Book an Hotel to Archeological service now <i class="fa fa-long-arrow-right"></i></a> -->
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
        </div>

        <section id="box-services" >
            <div class="container-fluid px-5 my-4">
                <div class="row mb-0">
                    <div class="col-md-3 px-3">
                        <div class="item">
                            <article class="box is-full">
                                <a href="/los-cabos-private-transportation"
                                    title="Los Cabos Airport Private Transportation">
                                    <img alt="Los Cabos Airport Private Transportation"
                                        title="Los Cabos Airport Private Transportation"
                                        src="https://www.loscabosairporttransportation.com/src/los-cabos-airport-transportation-private-van.png">
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
                                        src="https://www.loscabosairporttransportation.com/src/los-cabos-airport-transportation-luxury-van.png">
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
                                        src="{{ asset('assets/images/units/suv.png') }}"></a>
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
                                        src="{{ asset('assets/images/units/bus.png') }}">
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


        {{-- <div class="container-fluid py-5 s-bg">
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
        </div> --}}

        <div class="isPopular py-5 s-bg">
            <h3><a href="destinations" title="Private Los Cabos Airport Transportation to San Lucas and San Jose del Cabo">LOS CABOS AIRPORT TRANSPORTATION´ S</a></h3>
            <h4>POPULAR DESTINATIONS</h4>
            <div class="container">
                <div class="columns four item">
                    <a href="#" title="San Jose del Cabo Airport Airport Transportation to San Jose del Cabo">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/san_jose_del_cabo.jpeg')}}" alt="San Jose del Cabo Airport Airport Transportation to San Jose del Cabo" title="San Jose del Cabo Airport Transportation to San Jose del Cabo">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Airport Transportation to San Jose del Cabo" class="text-primary">San Jose del Cabo</a>
                    <p class="text-secondary">Cabo is known worldwide. Transportation to San Jose Del Cabo from San Jose Airport is about 30 minutes or less.</p>
                </div>
                <div class="columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Puerto Los Cabos & Corredor">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/puerto_los_cabos.jpg')}}" alt="San Jose del Cabo Airport Transportation Puerto Los Cabos & Corredor" title="San Jose del Cabo Airport Transportation Puerto Los Cabos & Corredor">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Puerto Los Cabos & Corredor" class="text-primary">Puerto Los Cabos & Corredor</a>
                    <p class="text-secondary">Puerto Los Cabos & Corredor is a new trendy  destination. Transportation Puerto Los Cabos & Corredor from Cancun Airport is about 45 minutes.</p>
                </div>
                <div class="columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Cabo San Lucas">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/csl.jpg')}}" alt="San Jose del Cabo Airport Transportation to Cabo San Lucas" title="San Jose del Cabo Airport Transportation to Cabo San Lucas">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Cabo San Lucas" class="text-primary">Cabo San Lucas</a>
                    <p class="text-secondary">Cabo San Lucas is a really  city in . Transportation to Cabo San Lucas from Cancun Airport is about 55 minutes.</p>
                </div>
                <div class="columns four item">
                    <a href="#" title="San Jose del Cabo Airport Transportation to Pacific Side">
                        <img loading="lazy" width="268" height="168" src="{{ asset('assets/images/home/zones/pacific_side.webp')}}" alt="San Jose del Cabo Airport Transportation to Pacific Side" title="Cabo Airport Transportation to Pacific Side">
                    </a>
                    <a href="#" title="San Jose del Cabo Airport Transportation to Pacific Side" class="text-primary">Pacific Side</a>
                    <p class="text-secondary">Pacific Side is the hottest of all destinations where you'll enjoy eco chic services. Transportation to Pacific Side from San Jose del Cabo Airport is about 1:45 hrs.</p>
                </div>
            </div>
        </div>

        <div class="row boxReasonHome">
			<div class="col-md-5">
				<img title="Los Cabos Airport Transportation" alt="los cabos airport transportation" src="{{ asset('assets/images/units/hiace_blanco.png') }}" class="reasonsImage">
			</div>
			<div class="col-md-7">
				<h2 class="ta-center">WHY OUR CLIENTS PREFER US</h2>
				<ul class="listReasons">
					<li>
						<i class="fa fa-check-circle-o"></i>
						100% <strong>Private transfers</strong> <small>(shared services not available)</small>.
					</li>
					<li>
						<i class="fa fa-check-circle-o"></i>
						Non-stop service <small>(unless asked by the customer)</small>.
					</li>
					<li>
						<i class="fa fa-check-circle-o"></i>
						Available for any number of passengers.
					</li>
					<li>
						<i class="fa fa-check-circle-o"></i>
						Get the best prices. If you see any better price, we'll match it.
					</li>
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
						Secure PayPal payment method option.
					</li>
					<li>
						<i class="fa fa-check-circle-o"></i>
						Pre-book and free from worries.
					</li>
				</ul>
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
            },
            beforeMount() {},
            mounted() {

            },
            methods: {
                changeLanguage: function() {
                    window.location.href = '/lang/' + this.lang;
                }
            }
        })
    </script>
@endsection
