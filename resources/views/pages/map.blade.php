@extends('layouts.info')
{{-- @section('global-header')
    @include('includes.google-header-global')
@endsection --}}
@section('content')
    {{-- @include('includes.new.booking_bar', ['register' => 'CABO DRIVERS SERVICES']) --}}
    <style>
        #map {
          height: 400px;
          width: 100%;
        }
    </style>
    <div id="app">
        <!-- Barra de búsqueda de direcciones -->
        <input v-model="searchQuery" @input="searchPlace" placeholder="Buscar dirección...">

        <!-- Contenedor para el mapa -->
        <div id="map" style="height: 400px;"></div>

        <!-- Lista de propiedades -->
        <ul>
          <li v-for="property in properties" :key="property.id">
            @{{ property.title }} - @{{ property.distance }} km away
          </li>
        </ul>
    </div>

@endsection
@section('footer-scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDl3QdpavEMHbNxiU9AqmO577Hir0EZ_Ho&callback=initMap" async defer></script>
<script src="{{asset('assets/libs/vue/vue.dev.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // import axios from 'axios';
    var app = new Vue({
        el: '#app',
        data() {
            return {
            searchQuery: '',
            map: null,
            properties: [],
            markers: [],
            latitude: 0,
            longitude: 0,
            showAirbnbInfo: false
            };
        },
        methods: {
            // Inicializa el mapa en el componente
            initializeMap() {
            this.map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 23.6345, lng: -102.5528 }, // Coordenadas iniciales (México)
                zoom: 12,
            });
            },

            // Lógica para buscar la dirección usando Google Places o cualquier API de geolocalización
            searchPlace() {
            if (this.searchQuery.length > 3) {
                axios.get(`https://maps.googleapis.com/maps/api/geocode/json`, {
                params: {
                    address: this.searchQuery,
                    key: 'AIzaSyDl3QdpavEMHbNxiU9AqmO577Hir0EZ_Ho',
                }
                })
                .then(response => {
                const location = response.data.results[0].geometry.location;
                this.latitude = location.lat;
                this.longitude = location.lng;
                this.map.setCenter(location);
                this.fetchProperties();
                })
                .catch(error => console.error(error));
            }
            },

            // Función para obtener las propiedades desde el backend (Laravel)
            fetchProperties() {
            axios.get(`/api/properties/search`, {
                params: {
                latitude: this.latitude,
                longitude: this.longitude,
                radius: 10,  // Puedes ajustar el radio
                }
            })
            .then(response => {
                this.properties = response.data.properties;
                this.updateMarkers();
            })
            .catch(error => console.error(error));
            },

            // Actualiza los puntos en el mapa
            updateMarkers() {
            // Limpia los marcadores anteriores
            this.markers.forEach(marker => marker.setMap(null));
            this.markers = [];

            // Agrega los nuevos marcadores
            this.properties.forEach(property => {
                const marker = new google.maps.Marker({
                position: { lat: property.latitude, lng: property.longitude },
                map: this.map,
                title: property.title,
                });

                // Muestra información cuando se hace clic en un marcador
                const infowindow = new google.maps.InfoWindow({
                content: `<div><h4>${property.title}</h4><p>${property.description}</p></div>`,
                });
                marker.addListener('click', () => {
                infowindow.open(this.map, marker);
                });

                this.markers.push(marker);
            });
            },
        },
        mounted() {
            // Verificar si la API de Google Maps ya está cargada
            if (typeof google !== 'undefined') {
                this.initializeMap();
            } else {
                // Esperar hasta que el script de Google Maps se cargue
                window.initMap = () => {
                this.initializeMap();
                };
            }
        },
    });
</script>
@endsection
