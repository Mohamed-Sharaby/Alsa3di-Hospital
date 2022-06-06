<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    @if(app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    @else
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-rtl.min.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script>
        window.locale = '{{ app()->getLocale() }}';
        window.translations = {!! json_encode(cache('translations')) !!};
    </script>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
</head>
<body>

@inertia


<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/mixitup.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/plugin.js')}}"></script>
</body>
</html>