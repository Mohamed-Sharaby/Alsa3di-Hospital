@extends('doctors.layouts.layout')
@section('title','مواعيد الطبيب ' .' '.auth()->user()->doctor->user->name)

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

{{--                            <a href="{{route('doctor.appointments.create')}}"--}}
{{--                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة ميعاد--}}
{{--                                جديد</a>--}}
{{--                            <br>--}}
                            <br>

                            <table   class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اليوم</th>
                                    <th>الفترة</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$item->day}}</td>
                                        <td>{{$item->timeslot}}</td>

                                        <td class="text-center">

{{--                                            <a href="{{route('doctor.appointments.edit',$item->id)}}"--}}
{{--                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i--}}
{{--                                                    class="fa fa-edit"></i></a>--}}

                                            <button data-url="{{route('doctor.appointments.destroy',$item->id)}}"
                                                    data-name="{{ $item->day }}"
                                                    class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                    title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

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
