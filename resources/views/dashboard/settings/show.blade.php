@extends('dashboard.layouts.layout')
@section('title')
    {{$page}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.settings.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الاعدادات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <form action="{{route('admin.settings.store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    @foreach($settings as $setting)
                                        <div class="row  col-12 form-group">
                                            @if($setting->name != 'lat'&& $setting->name != 'lng')
                                                <label for="{{$setting->title}}"
                                                       class="col-form-label font-weight-bold col-lg-2">{{__($setting->title)}}
                                                </label>
                                            @endif


                                            @if($setting->type == 'number' && $setting->name == 'phone')
                                                <div class="col-12 col-lg-10">
                                                    <input type="tel" name="{{$setting->name}}"
                                                           value="{{$setting->ar_value}}"
                                                           placeholder="رقم الجوال" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif


                                            @if($setting->type == 'email')
                                                <div class="col-12 col-lg-10">
                                                    <input type="email" name="{{$setting->name}}"
                                                           value="{{$setting->ar_value}}"
                                                           placeholder="البريد الالكترونى" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif
                                                @if($setting->type == 'number' && $setting->name == 'delivery_cost')
                                                    <div class="col-12 col-lg-10">
                                                        <input type="number" name="{{$setting->name}}"
                                                               value="{{$setting->ar_value}}"
                                                               step="0.01"
                                                               placeholder="سعر التوصيل" class="form-control">
                                                        @error($setting->name)
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                @endif
                                            @if($setting->type == 'map' && $setting->name == 'address')
                                                <div class="col-12 col-lg-10">
                                                    <input type="text" name="{{$setting->name}}"
                                                           value="{{$setting->ar_value}}"
                                                           placeholder="العنوان" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif


                                            @if($setting->type == 'file' && $setting->name == 'about_video')
                                                <div class="col-12 col-lg-10">
                                                    <input type="url" name="{{$setting->name}}"
                                                           value="{{$setting->ar_value}}"
                                                           placeholder="الرابط" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            @endif

                                                @if($setting->type == 'file' && $setting->name == 'about_image')
                                                <div class="col-12 col-lg-4">
                                                    <input type="file" name="{{$setting->name}}" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                    <div class="col-12 col-lg-4">
                                                        <a data-fancybox="gallery" href="{{getImg($setting->ar_value)}}">
                                                            <img src="{{getImg($setting->ar_value)}}" width="70" height="70"
                                                                 class="img-thumbnail">
                                                        </a>
                                                    </div>
                                            @endif

                                            @if($setting->type == 'textarea' )

                                                <div class="col-12 col-lg-10">
                                                    <label for="{{$setting->title}}"
                                                           class="col-form-label">{{$setting->title}}   </label>

                                                    <label for="{{$setting->ar_value}}"
                                                           class="col-form-label">المحتوى بالعربية </label>
                                                    {!! Form::textarea($setting->name.'[]',$setting->ar_value,
                                                        ['class'=>'form-control ck-editor','rows'=>8]) !!}

                                                    <label for="{{$setting->en_value}}"
                                                           class="col-form-label">المحتوى بالانجليزية </label>
                                                    {!! Form::textarea($setting->name.'[]',$setting->en_value,
                                                        ['class'=>'form-control ck-editor','rows'=>8]) !!}

                                                </div>
                                            @endif


                                            @if($setting->type == 'url')
                                                <div class="col-12 col-lg-10">
                                                    <input type="url" name="{{$setting->name}}"
                                                           value="{{$setting->ar_value}}"
                                                           placeholder="الرابط" class="form-control">
                                                    @error($setting->name)
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            @endif





                                            @if($setting->name == 'lat')
                                                <input type="hidden" name="lat" id="lat" value="{{$setting->value}}">
                                                <div id="map" style="width: 100%; height: 300px;"></div>
                                            @endif
                                            @if($setting->name == 'lng')
                                                <input type="hidden" name="lng" id="lng" value="{{$setting->value}}">
                                            @endif

                                        </div>
                                    @endforeach
                                    <div class="form-group row col-12">
                                        <button type="submit" class="btn btn-primary btn-block">حفظ</button>
                                    </div>
                            </form>

                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@push('scripts')
    <script>
        CKEDITOR.replaceClass = 'ck-editor';
    </script>
    <script>
        var geocoder;
        var map;
        var marker;

        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            @php
                $lat = \App\Models\Setting::whereName('lat')->first()->ar_value;
                $lng = \App\Models\Setting::whereName('lng')->first()->ar_value;
            @endphp

            var lat = "{{$lat ? $lat : '26.348180'}}";
            var lng = "{{$lng ? $lng : '43.955276'}}";
            var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)};
            // The map, centered at Uluru
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
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

                        document.getElementById('pac-input').value = results[0].formatted_address;
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
                        document.getElementById("pac-input").value = results[1].formatted_address;
                    }
                }
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxmTcy67Mwzu-AvUxfw88AhsCmPTnaPF4&callback=initMap">
    </script>
@endpush
