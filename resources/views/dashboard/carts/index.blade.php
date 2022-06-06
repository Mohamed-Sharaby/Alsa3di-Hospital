@extends('dashboard.layouts.layout')
@section('title',' الطلبات')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>رقم الطلب</th>
                                    <th>اسم العميل </th>
                                    <th>حالة الطلب</th>
                                    <th>تاريخ الانشاء </th>
                                    <th>التفاصيل</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody class="reservations">
                                @foreach($carts as $index => $cart)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$cart->id}}</td>
                                        <td>{{$cart->user->name}}</td>
                                        <td>{{$cart->status_lang}}</td>
                                        <td>{{$cart->created_at->toDateString()}}</td>
                                        <td>
                                            <a href="{{route('admin.carts.show',$cart->id)}}" title="التفاصيل"
                                               class="btn-icon waves-effect btn btn-info btn-sm ml-2 rounded-circle"><i
                                                        class="fa fa-eye"></i>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <button data-url="{{route('admin.carts.destroy',$cart->id)}}"
                                                    data-name="{{ $cart->id }}"
                                                    class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="حذف">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end col -->
                </div>



            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts')
