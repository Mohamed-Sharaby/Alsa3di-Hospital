@extends('dashboard.layouts.layout')
@section('title','  مستشفى الصاعدى')

@section('content')
    <div class="row" style="margin-top: 10px!important;">


        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.admins.index')}}">
                <div class="card-box bg-success">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الادارة </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Admin::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.doctors.index')}}">
                <div class="card-box bg-info">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الاطباء </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\User::whereRole('doctor')->count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.users.index')}}">
                <div class="card-box bg-warning">
                    <h4 class="header-title m-t-0 m-b-30 text-white">المرضى </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\User::whereRole('patient')->count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.specializations.index')}}">
                <div class="card-box bg-primary">
                    <h4 class="header-title m-t-0 m-b-30 text-white">التخصصات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Specialization::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.branches.index')}}">
                <div class="card-box bg-danger">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الفروع </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Branch::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.services.index')}}">
                <div class="card-box bg-purple">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الخدمات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Service::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.reservations.index')}}">
                <div class="card-box bg-success">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الحجوزات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Reservation::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.products.index')}}">
                <div class="card-box bg-danger">
                    <h4 class="header-title m-t-0 m-b-30 text-white">المنتجات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-life-ring fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Product::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->


        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.carts.index')}}">
                <div class="card-box bg-primary">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الطلبات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-shopping-cart fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Cart::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->


        <div class="col-lg-3 col-md-6">
            <a href="{{route('admin.settings.index')}}">
                <div class="card-box bg-info">
                    <h4 class="header-title m-t-0 m-b-30 text-white">الاعدادات </h4>
                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1">
                            <i class="fa fa-cog fa-4x text-white"></i>
                        </div>
                        <div class="widget-detail-1">
                            <h2 class="p-t-10 m-b-0 text-white"> {{\App\Models\Setting::count()}} </h2>
                        </div>
                    </div>
                </div>
            </a>
        </div><!-- end col -->


    </div>
    <!-- end row -->


@endsection

