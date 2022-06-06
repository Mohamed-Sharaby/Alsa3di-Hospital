@extends('dashboard.layouts.layout')
@section('title','  تعديل   منتج ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.products.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        المنتجات   </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل منتج
                                <span class="badge badge-info">{{$item->name}}</span>
                            </h4>

                            {!! Form::model($item,['route'=>['admin.products.update',$item->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}
                            @include('dashboard.products.form')
                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
@push('scripts')
    <script>
        $(document).on('click', '.del_product_img', function (e) {
            let confirmResult = confirm('هل أنت متأكد من حذف هذه الصورة');
            if (confirmResult) {
                var id = $(this).data("id");
                $.ajax({
                    type: 'delete',
                    url: "/dashboard/attaches/image/"+id,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'id': id,
                    },
                    success: function (data) {
                        $('.msg').css('display','block');
                        $('.image'+data.id).remove();
                    }
                });
            } else {
                e.preventDefault();
            }

        });
    </script>
@endpush
