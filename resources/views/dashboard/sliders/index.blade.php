@extends('dashboard.layouts.layout')
@section('title','السلايدر ')

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

                            <a href="{{route('admin.sliders.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة سلايدر
                                جديد</a>
                            <br>
                            <br>

                            <table id="datatable-buttons" class="table table-striped table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>العنوان </th>
                                    <th>التفاصيل </th>
                                    <th>الصورة</th>
                                    <th>العرض في</th>
                                    <th>العمليات</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $index => $item)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$item->ar_title}}</td>
                                        <td>
                                            @include('dashboard.sliders.slider-details')
                                        </td>
                                        <td>
                                            @if($item->image)
                                                <a data-fancybox="gallery" href="{{$item->image_path}}">
                                                    <img src="{{$item->image_path}}" width="70" height="70"
                                                         class="img-thumbnail" alt="admin_img">
                                                </a>
                                            @else {{__('No Image')}} @endif
                                        </td>
                                        <td>@lang($item->type)</td>

                                        <td class="text-center">
                                            <form
                                                action="{{ route('admin.active', ['id' => $item->id, 'type' => 'Slider']) }}"
                                                style="display: inline;"
                                                method="post">@csrf
                                                <button type="submit"
                                                        class="btn-icon waves-effect {{ $item->is_active ? 'btn btn-sm btn-success' : 'btn btn-sm btn-warning' }}">{{ $item->is_active ? 'مفعل ' : ' معطل' }}</button>
                                            </form>


                                            <a href="{{route('admin.sliders.edit',$item->id)}}"
                                               class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                                    class="fa fa-edit"></i>
                                            </a>


                                            <button data-url="{{route('admin.sliders.destroy',$item->id)}}"
                                                    data-name="{{ $item->ar_title }}"
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
