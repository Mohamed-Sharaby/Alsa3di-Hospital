@extends('dashboard.layouts.layout')
@section('title','الخدمات ')

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

                            <a href="{{route('admin.services.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة خدمة
                                جديدة</a>
                            <br>
                            <br>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>التفاصيل</th>
                                    <th>الفرع</th>
                                    <th>التخصص</th>
                                    <th>السعر</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            @include('dashboard.services.service-details')
                                        </td>
                                        <td>{{$item->branch->name}}</td>
                                        <td>{{$item->specialization->name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $item->id, 'type' => 'Service']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $item->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $item->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>


                                            <a href="{{route('admin.services.edit',$item->id)}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i></a>


                                            <button data-url="{{route('admin.services.destroy',$item->id)}}"
                                                    data-name="{{ $item->name }}"
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
