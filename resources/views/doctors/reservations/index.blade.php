@extends('doctors.layouts.layout')
@section('title','حجوزات الطبيب ' .' '.auth()->user()->doctor->user->name)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('doctor.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /

                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')
                            <br>
                            <table   class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>م</th>
                                    <th>رقم الطلب</th>
                                    <th>المريض</th>
                                    <th>الميعاد</th>
                                    <th>النوع</th>
                                    <th>الحالة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->user->name}}</td>
                                        <td>{{$item->appointment->day ?? $item->date->format('Y-m-d')}}</td>
                                        <td>{{$item->type_lang}}</td>
                                        <td>{{$item->status_lang}}</td>
                                        <td class="text-center">
                                            <a href="{{route('doctor.reservations.show',$item->id)}}" title="التفاصيل"
                                               class="btn-icon waves-effect btn btn-success btn-sm ml-2 rounded-circle"> التفاصيل</a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="pagination">{{ $items->links() }}</div>
                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts')
