@extends('dashboard.layouts.layout')
@section('title',' اضافة تخصص جديد')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.specializations.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        التخصصات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
{{--                            @include('dashboard.layouts.status')--}}
                            <h4 class="header-title m-t-0 m-b-30"> اضافة تخصص</h4>
                            {!!Form::open( ['route' => 'admin.specializations.store', 'method' => 'Post','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.specializations.form')
                            {!!Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
