@extends('doctors.layouts.layout')
@section('title','تفاصيل الحجز  '.' '.$reservation->id)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('doctor.reservations.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الحجوزات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <div class="portlet fadeIn">
                                <div class="portlet-heading bg-success">
                                    <h3 class="portlet-title">
                                        تغيير حالة الحجز / {{$reservation->id}}
                                    </h3>
                                    <div class="portlet-widgets">
                                        <a href="javascript:;" data-toggle="reload"><i
                                                class="zmdi zmdi-refresh"></i></a>
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#change_status"><i
                                                class="zmdi zmdi-minus"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="change_status" class="panel-collapse collapse in">
                                    <div class="portlet-body">

                                        <form action="{{route('doctor.changeStatus',$reservation->id)}}" method="post"
                                              role="form" class="form-horizontal">
                                            @csrf
                                            {{method_field('put')}}
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    {!! Form::select('status',reservation_status(),$reservation->status,['class' =>'form-control ', 'placeholder'=>  'تغيير الحالة  ']) !!}

                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <button type="submit" class="btn-icon waves-effect btn btn-success">
                                                        حفظ
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="portlet fadeIn">
                                <div class="portlet-heading bg-purple">
                                    <h3 class="portlet-title">
                                        تفاصيل الطلب رقم / {{$reservation->id}}
                                    </h3>
                                    <div class="portlet-widgets">
                                        <a href="javascript:;" data-toggle="reload"><i
                                                class="zmdi zmdi-refresh"></i></a>
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#details"><i
                                                class="zmdi zmdi-minus"></i></a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="details" class="panel-collapse collapse in">
                                    <div class="portlet-body">

                                        <table class="table table-bordered table-responsive table-striped">

                                            <tr>
                                                <th> المريض</th>
                                                <td>  {{$reservation->user->name}} </td>

                                                <th> رقم الجوال</th>
                                                <td>  {{$reservation->phone}} </td>
                                            </tr>


                                            <tr>
                                                @if($reservation->type != 'service')
                                                    <th>الطبيب</th>
                                                    <td>  {{$reservation->doctor->user->name}} </td>
                                                @endif
                                                <th>التخصص</th>
                                                <td>  {{$reservation->specialization->name}} </td>
                                            </tr>


                                            <tr>
                                                @if($reservation->type != 'consult' && $reservation->type != 'chat' && $reservation->type != 'appointment')
                                                    <th>الخدمة</th>
                                                    <td>  {{$reservation->service->name}} </td>
                                                @endif
                                                <th>الفرع</th>
                                                <td>  {{$reservation->branch->name ?? ''}} </td>
                                            </tr>

                                            <tr>
                                                <th>حالة الحجز</th>
                                                <td>  {{__($reservation->status)}} </td>

                                                <th>السعر</th>
                                                <td> {{$reservation->price}}</td>
                                            </tr>

                                            <tr>
                                                <th>التاريخ</th>
                                                <td> {{optional($reservation->date)->format('Y-m-d')}}</td>

                                                @if($reservation->type == 'appointment')
                                                    <th>الميعاد</th>
                                                    <td> {{$reservation->appointment->timeslot}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>ملاحظات</th>
                                                <td>
                                                    <p style="white-space: pre-line;overflow-wrap: anywhere;text-overflow: ellipsis;">{{$reservation->details}}</p>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection




