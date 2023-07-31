@extends('layouts.king')
@section('styles')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Poiret+One);
        .parallax{
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size:  cover;
            height:9rem;
            max-width: 100%;
            position: relative
        }
        .texto-interior{
            color:#fff;
            font-weight: bold;
            left: 10%;
            position: absolute;
            text-align: center;
            top:30%;
            width: 80%;
            font-family: 'Poiret One', cursive, helvetica;
            text-shadow: 3px 2px 8px rgb(0 0 0 / 68%);
        }
        .texto-interior *{
            font-size: 2.5rem;
        }
        #map{
            height: 450px;
        }

        .img-uno{
            background-image: url('{{ asset("assets/images/gallery/pic6.webp") }}');
            background-size: 155%;
            background-position: 10% 55%;
            background-repeat: repeat-y;
        }

        @media(min-width:414px){
            .img-uno{background-position: 10% 50%;}
        }
        @media(min-width:768px){
            .img-uno{
                background-size: contain;
                background-position-y: 20%;
            }
        }

        @media (min-width: 992px) {
            .parallax{
                background-attachment: fixed;
                background-size: contain;
                background-position-y: 20%;
                background-repeat: repeat-y;
                height:20rem;
                max-width: 100%;
                position: relative
            }
            .texto-interior{
                color:#fff;
                font-weight: bold;
                left: 10%;
                position: absolute;
                text-align: center;
                top:40%;
                width: 80%;
                font-family: 'Poiret One', cursive, helvetica;
            }
            .texto-interior *{
                font-size: 4rem;
            }
            #map{
                height: 100%;
            }

        }
        @media(min-width:1280px){
            .parallax{
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size:  cover;
                height:30rem;
                max-width: 100%;
                position: relative
            }
            .img-uno{
                background-position-y: 0%;
            }
        }


    </style>
@endsection
@section('global-header')
    @include('includes.google-header-global')
@endsection
@section('content')
@include('includes.new.booking_bar',['register'=>''])
<main id="PAGES_CONTAINER">

    <div class="container-fluid">
        <div class="row">
            <div class="parallax img-uno" id="m">
                <div class="texto-interior">
                    <h2 class="m-font text-white text-break">{{ __("pages/contact.contact_us.title") }}</h2>
                </div>
            </div><!-- .parallax -->
        </div>
    </div>
    @if(session('notification'))
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('notification')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
    <div class="container pb-5 mb-3">

        <div class="row my-5 pb-5">
            <div class="col-md-6">
                <h3 class="s-color">{{ __("pages/contact.contact_us.map.title") }}</h3>
                <div id="map"></div>
                <p>San José del Cabo, Baja California Sur, México </p>
            </div>
            <div class="col-md-6">
                <form action="{{ route('sendMail') }}" method="POST">
                    @csrf
                    <h3 class="s-color">{{ __("pages/contact.contact_us.title") }}</h3>
                    <div class="mb-3">
                      <label for="name" class="form-label">{{ __("pages/contact.contact_us.form.name") }}</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __("pages/contact.contact_us.form.email") }}</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __("pages/contact.contact_us.form.phone") }}</label>
                        <input type="phone" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="msj" class="form-label">{{ __("pages/contact.contact_us.form.message") }}</label>
                        <textarea class="form-control mt-2" name="msj" id="msj" cols="30" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn send-btn float-right">{{ __("pages/contact.contact_us.form.send_btn") }}</button>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection
@section('map')
<script  defer>
    // sleep time expects milliseconds
    function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
    }


    function initMap() {
        var uluru = {lat:22.879278, lng: -109.910536};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }

    // Usage!
    sleep(1500).then(() => {
        $('#map > div:nth-child(2)').css('display','none');
    });
</script>
<script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDl3QdpavEMHbNxiU9AqmO577Hir0EZ_Ho&callback=initMap"> </script>

<script>
    $(document).ready(()=>{
        $('#map > div:nth-child(2)').css('display','none');
    });
</script>
@endsection
