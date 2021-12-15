@extends('layouts.master')
@section('content')
<style>
    @import url(https://fonts.googleapis.com/css?family=Poiret+One);
    .parallax{
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size:  cover;
        height:15rem;
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
    }

    #map{
        height: 450px;
    }
    @media (min-width: 992px) { 
        .parallax{
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size:  cover;
            height:30rem;
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
        #map{
            height: 100%;
        }
    }
    .img-uno{background-image: url('{{ asset("assets/images/gallery/pic6.webp") }}')}
</style>
<main id="PAGES_CONTAINER">
    <div class="container-fluid">
        <div class="row">
            <div class="parallax img-uno" id="m">
                <div class="texto-interior">
                    <h2 class="m-font fs-medium text-white text-break">Contact Us</h2>
                </div>
            </div><!-- .parallax -->
        </div>
    </div>
    <div class="container pb-5 mb-3">

        <div class="row my-5 pb-5">
            <div class="col-md-6">
                <h3 class="s-color">¿Cómo llegar?</h3>
                <div id="map"></div>
                <p>San José del Cabo, Baja California Sur, México </p>
            </div>
            <div class="col-md-6">
                <form action="{{ route('sendMail') }}">
                    <h3 class="s-color">Contact Us</h3>
                    <div class="mb-3">
                      <label for="name" class="form-label">Name:</label>
                      <input type="password" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address:</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="phone" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="submit" class="btn send-btn float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
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
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcjB5D6m1N4UAcwssY-tmPYLTi2wgF7Uc&callback=initMap"> </script>
@endsection