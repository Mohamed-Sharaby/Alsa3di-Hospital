@extends('dashboard.layouts.layout')
@section('title','اشتراكات البريد الالكترونى   ')

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
                                    <th>البريد الالكترونى </th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$item->email}}</td>

                                        <td class="text-center">
                                            <button data-url="{{route('admin.subscribes.destroy',$item->id)}}"
                                                    data-name="{{ $item->email }}"
                                                    class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="Delete">
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
