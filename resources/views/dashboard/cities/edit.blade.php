@extends('dashboard.layouts.layout')
@section('title','  تعديل   مدينة ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.cities.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        المدن   </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل مدينة
                                <span class="badge badge-info">{{$item->name}}</span>
                            </h4>

                            {!! Form::model($item,['route'=>['admin.cities.update',$item->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.cities.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
@push('scripts')
    <script>
        var geocoder;
        var map;
        var marker;

        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: {{$item->lat}}, lng: {{$item->lng}} };
            // The map, centered at Uluru
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: uluru
            });
            // The marker, positioned at Uluru
            marker = new google.maps.Marker({
                position: uluru,
                map: map,
                draggable: true,
            });
            google.maps.event.addListener(map, "click", function (event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();
                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(7);
                document.getElementById("lng").value = clickLon.toFixed(7);
                /*******************/
                GetLocation(clickLat.toFixed(7), clickLon.toFixed(7));
                /****************/
                var latlng = new google.maps.LatLng(clickLat, clickLon);
                marker.setPosition(latlng);
            });

        }

        function handleEvent(event) {
            document.getElementById('lat').value = event.latLng.lat();
            document.getElementById('lng').value = event.latLng.lng();
            geocodeLatLng(geocoder, map, {lat: parseFloat(event.latLng.lat()), lng: parseFloat(event.latLng.lng())});
        }

        function geocodeLatLng(geocoder, map, latlng) {
            geocoder.geocode({'location': latlng}, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {

                        document.getElementById('location').value = results[0].formatted_address;
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }

        function GetLocation(lat, lng) {
            var lat = parseFloat(lat);
            var lng = parseFloat(lng);
            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        document.getElementById("location").value = results[1].formatted_address;
                    }
                }
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxmTcy67Mwzu-AvUxfw88AhsCmPTnaPF4&callback=initMap">
    </script>
@endpush
