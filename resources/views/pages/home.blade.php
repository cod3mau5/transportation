@extends('layouts.master')
@section('content')
<style>
    .bg-arch{
        background: linear-gradient(0deg, rgba(255, 255, 255, 0.777), rgba(255, 255, 255, 0.777)),url("{{ asset('assets/images/arch.webp') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position-y: 40%;
    }
</style>
    <main id="PAGES_CONTAINER" tabindex="-1">

        <div class="container-fluid bg-arch">
            <div class="row">
                <div class="col-md-8 offset-md-2 px-0 text-center m-font">
                    <h2 class="fs-1 my-5 m-color">VIVE LOS CABOS</h2>
                    <h1 class="fs-1 my-5 s-color">Tourist Transportation Service, Airport / Hotel, Transfers and City tour.</h1>
                    <h2 class="fs-big my-5 pb-5 m-color text-break">Wonderful day to travel.</h2>
                </div>
            </div>
        </div>

        <div class="container my-5" id="about-us">
            <div class="row">
                <div class="col-md-2 offset-md-2">
                    <img src="{{ asset('assets/images/arch_mini.webp') }}" class="circle">
                </div>
                <div class="col-md-6 py-3">
                    <h3 class="fs-1 m-font m-color">Life is a journey make it amazing !!</h3>
                    <p class="fs-6">La vida pasa tan deprisa, disfruta el ahora y ven a LOS CABOS a pasar las mejores vacaciones, nosotros haremos que sea una experiencia maravillosa, somos la mejor opción de transporte turístico en LOS CABOS.</p>
                </div>
            </div>
        </div>
        <div class="container-fluid py-5 s-bg">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h1 class="mb-5" style="color:#002e5d">Cabo Driver Services</h1>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        Les brindamos un servicio de calidad y profesionalismo además de que contamos con personal altamente capacitado para atender las necesidades del cliente contamos con precios accesibles y paquetes especiales.
                    </p>
                    <p style="color:#002e5d;text-align:justify" class="fs-5">
                        La atención personalizada al 100 % nuestro compromiso es estar con nuestros clientes desde que comienza a planear su viaje a Los Cabos, desde  su arribo, transfer, actividades y tours  hasta su salida. Incluimos un servicio de concierge para hacer sus reservaciones que les brinda la información general.
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="single-item-rtl">
                        <div><img src="{{ asset('assets/images/home-slider/pic1.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic2.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic3.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic4.webp') }}"></div>
                        <div><img src="{{ asset('assets/images/home-slider/pic5.webp') }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center fs-1 m-font m-color">Suburban</h1>
                    <img src="{{ asset('assets/images/units/suburban.webp') }}" class="w-100">
                </div>
                <div class="col-md-6">
                    <h1 class="text-center fs-1 m-font m-color">Hiace</h1>
                    <img src="{{ asset('assets/images/units/hiace.webp') }}" class="w-100">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mt-4">
                    <a href="{{ route('book-now') }}" class="book-btn text-white">Book Now</a>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('footer-scripts')
    <script>
        $(document).ready(function(){
            $('.single-item-rtl').slick({
                autoplay:true,
                dots: false,
                autoplaySpeed: 2300,
                arrows: false,
            });
        });
    </script>
@endsection