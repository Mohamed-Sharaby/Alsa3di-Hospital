@extends('dashboard.layouts.layout')
@section('title','الادارة ')

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

                            <a href="{{route('admin.admins.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة مدير
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
                                    <th>المنصب</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $admin)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>
                                            @if($admin->image)
                                                <a data-fancybox="gallery" href="{{$admin->image_path}}">
                                                    <img src="{{$admin->image_path}}" width="70" height="70"
                                                         class="img-thumbnail" alt="admin_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>
                                        <td>
                                            @if($admin->hasRole(\Spatie\Permission\Models\Role::all()))
                                                @foreach($admin->roles as $role)
                                                    {{$role->name}}
                                                @endforeach
                                            @else لا يوجد @endif
                                        </td>
                                        <td class="text-center">


                                                @if(auth('admin')->id() != $admin->id)
                                                        <form
                                                            action="{{ route('admin.active', ['id' => $admin->id, 'type' => 'Admin']) }}"
                                                            style="display: inline;"
                                                            method="post">@csrf
                                                            <button type="submit"
                                                                    class="btn-icon waves-effect {{ $admin->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $admin->is_active ? 'مفعل ' : ' معطل' }}</button>
                                                        </form>
                                                @else
                                                <button disabled type="submit"
                                                        class="btn-icon waves-effect {{ $admin->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $admin->is_active ? 'مفعل ' : ' معطل' }}</button>
                                                @endif

                                                <a href="{{route('admin.admins.edit',$admin->id)}}"
                                                   class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                        class="fa fa-edit"></i></a>


                                                @if(auth()->id() != $admin->id)
                                                    <button data-url="{{route('admin.admins.destroy',$admin->id)}}"
                                                            data-name="{{ $admin->name }}"
                                                            class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                            title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    @else
                                                        <button class="btn btn-danger rounded-circle btn-sm ml-2 delete"
                                                                disabled title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                @endif
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
