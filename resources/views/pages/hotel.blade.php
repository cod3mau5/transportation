@extends('layouts.hotelsMaster')
@section('header-scripts')
    {{-- <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@900&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        main{
            background: rgb(246,246,246);
            background: radial-gradient(circle, rgba(246,246,246,1) 32%, rgba(246,246,246,0.6839110644257703) 63%, rgba(219,219,219,0.40940126050420167) 81%, rgba(68,68,68,0.4234068627450981) 100%);
            padding-bottom: 80px;
            min-height: 100%;
        }

        @media only screen and (min-width:1200px) {}
        @media only screen and (min-width:1100px) {}
        @media only screen and (max-width:920px) {}
        @media only screen and (max-width:840px) {}
        @media only screen and (max-width:767px) {}
        @media only screen and (max-width:480px) {}
        @media only screen and (max-width: 767px){}
        @media only screen and (max-width:320px) {}

        #cover-image{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-content: end;
            height: 450px;
            @if(count($gallery) >= 3)
                background-image:url("{{url($coverImg->path)}}");
            @endif
            background-size:cover;
            background-position:center;
        }


        .cover-title{
            background-color: rgba(255,255,255,0.6);
            padding: 1rem 3rem;
            font-size: 1.7rem;
            margin-bottom: 3.777rem;
            font-weight: bolder;
        }
        @media(min-width:1024px){
            #cover-image{
                height: 650px;
            }
            .cover-title{
                font-size: 3rem;
            }
        }


        .container.gallery {
            position: relative;
        }

        #slide-left, #slide-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,0.7);
            border: none;
            border-radius: 50%;
            font-size: 2rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
            z-index: 1;
        }

        #slide-left {
            left: 10px;
        }

        #slide-right {
            right: 10px;
        }
        #hotel-gallery {
            position: relative;
            overflow-x: hidden;
            display: flex;
            flex-wrap: nowrap;
            gap: 1rem;
            padding: 1rem;
        }
        #hotel-gallery img {

            width: auto;
            height: 300px;
            object-fit: cover;
            scroll-snap-align: center;
        }
        input[type="button"]{
            padding: 1rem 2rem;
            background-color: #6AA4E9;
            border: none;
            border-radius: 0px;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.7rem;
            word-wrap: break-word;
            white-space: normal;
        }

        @media only screen and (min-width:768px) {
            input[type="button"]{
                font-size: 1rem;
            }
        }
        @media only screen and (min-width:920px) {
            input[type="button"]{
                font-size: 1.2rem;
            }
        }

    </style>

@endsection

@section('content')
@include('includes.new.booking_bar',['register'=>''])
    <main id="hotel">

            @if ($errors->any())
                <div class="ui negative message mt-2" >
                    <i class="close icon" @click="closeErrorMessage"></i>
                    @foreach ($errors->all() as $error)
                        <div style="font-weight:bolder">
                            <li>{{ $error }}</li>
                        </div>
                    @endforeach
                </div>
            @endif


            <div class="container-fluid">
                <div class="row cover-container">
                    <div class="col-md-12 text-center" id="cover-image">
                        <h1 class="text-center cover-title">{{$record->name}} <br> Transportation</h1>
                    </div>
                </div>
            </div>

            <div class="container description py-4">
                {!! $record->description !!}
            </div>

            @if(count($gallery) >= 3)
                <div class="container gallery">
                    <button id="slide-left"><i class="fa fa-chevron-left"></i></button>
                    <button id="slide-right"><i class="fa fa-chevron-right"></i></button>
                    <div class="row" id="hotel-gallery">
                        @foreach($gallery as $img)
                            <img src="{{url($img->path)}}"/>
                        @endforeach
                    </div>
                </div>
            @endif

    </main>

@endsection

@section('footer-scripts')
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
    @if(count($gallery) >= 3)
        <script>
            $(document).ready(function(){
                const hotel="{{$record->name}}";
                buttons=document.querySelectorAll("input[type='button']");
                buttons.forEach(button => {
                    var link = document.createElement('a');
                    link.href = 'https://cabodrivers.com/book-now';
                    link.target = '_blank';
                    // Insertar el enlace antes del botón en el DOM
                    button.parentNode.insertBefore(link, button);
                    // Mover el botón dentro del enlace
                    link.appendChild(button);
                    button.value="Book Transportation To "+hotel+" Now";
                });
                const images = document.querySelectorAll('#hotel-gallery img');
                let imgCount = images.length;
                let imgWidth;
                let currentIndex = 0;

                if (imgCount > 6) {
                    imgWidth = 100 / 6;
                } else {
                    imgWidth = 100 / imgCount;
                }

                for (let img of images) {
                    img.style.flex = `0 0 ${imgWidth}%`;
                }

                const slideLeft = document.getElementById('slide-left');
                const slideRight = document.getElementById('slide-right');

                if (!slideLeft) {
                    console.error("No se pudo encontrar el botón #slide-left");
                } else {
                    slideLeft.addEventListener('click', () => {
                        console.log('Botón izquierdo pulsado');
                        if (currentIndex > 0) {
                            currentIndex--;
                            images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                        }
                    });
                }

                if (!slideRight) {
                    console.error("No se pudo encontrar el botón #slide-right");
                } else {
                    slideRight.addEventListener('click', () => {
                        console.log('Botón derecho pulsado');
                        if (currentIndex < imgCount - 1) {
                            currentIndex++;
                            images[currentIndex].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' });
                        }
                    });
                }
        });

        </script>
    @endif

@endsection

