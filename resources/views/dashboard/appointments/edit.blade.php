@extends('dashboard.layouts.layout')
@section('title','  تعديل ميعاد ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.appointments.index',['doctor'=>$appointment->doctor_id])}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                       مواعيد الطبيب <span class="badge badge-success">{{$appointment->doctor->user->name}}</span> </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل ميعاد الطبيب
                                <span class="badge badge-info">{{$appointment->doctor->user->name}}</span>
                            </h4>

                            {!! Form::model($appointment,['route'=>['admin.appointments.update',$appointment->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.appointments.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
