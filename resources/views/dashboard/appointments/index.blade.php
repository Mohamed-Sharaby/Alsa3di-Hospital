@extends('dashboard.layouts.layout')
@section('title','مواعيد الطبيب ' .' '.$doctor->user->name)

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.doctors.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الاطباء </a> /

                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            {{--                            <a href="{{route('admin.appointments.create',['doctor'=>$doctor->id])}}"--}}
                            {{--                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة ميعاد--}}
                            {{--                                جديد</a>--}}
                            <form action="{{ route('admin.appointments.store') }}" method="post">@csrf
                                <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                <button type="submit"
                                        class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة
                                    مواعيد
                                    جديد
                                </button>
                            </form>

                            <br>
                            <br>

                            <table class="table table-striped table-bordered text-center">
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

                                            <a href="{{route('admin.appointments.edit',$item->id)}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(!$item->reservation)
                                                <button data-url="{{route('admin.appointments.destroy',$item->id)}}"
                                                        data-name="{{ $item->day }}"
                                                        class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                        title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>

                            <div class="pagination">{{ $items->appends(request()->query())->links() }}</div>

                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts')
