@extends('dashboard.layouts.layout')
@section('title','الاطباء ')

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

                            <a href="{{route('admin.doctors.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة طبيب
                                جديد</a>
                            <br>
                            <br>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>البريد الالكترونى</th>
                                    <th>الجوال</th>
                                    <th>الصورة</th>
                                    <th>التفاصيل</th>
                                    <th>المواعيد</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $doctor)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$doctor->user->name}}</td>
                                        <td>{{$doctor->user->email}}</td>
                                        <td>{{$doctor->user->phone}}</td>
                                        <td>
                                            @if($doctor->user->image)
                                                <a data-fancybox="gallery" href="{{$doctor->user->image_path}}">
                                                    <img src="{{$doctor->user->image_path}}" width="70" height="70"
                                                         class="img-thumbnail" alt="admin_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>
                                        <td>
                                            @include('dashboard.doctors.doctor-details')
                                        </td>
                                        <td>
                                            <a href="{{url(route('admin.appointments.index',['doctor'=>$doctor->id]))}}"
                                               class="btn-icon waves-effect btn btn-purple btn-sm ml-3 rounded-circle">
                                                المواعيد </a>
                                        </td>
                                        <td class="text-center">

                                            <form
                                                action="{{ route('admin.active', ['id' => $doctor->user_id, 'type' => 'User']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $doctor->user->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $doctor->user->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>


                                            <a href="{{route('admin.doctors.edit',$doctor->id)}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.doctors.destroy',$doctor->id)}}"
                                                    data-name="{{ $doctor->user->name }}"
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
