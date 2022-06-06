@extends('doctors.layouts.layout')
@section('title','  تعديل  البيانات ')

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

                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissable  show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p class="m-0" style="color: #0b0b0b;">{{ session()->get('success') }}</p>
                                </div>
                            @endif

                            <h4 class="header-title m-t-0 m-b-30">
                                تعديل البيانات
                                <span class="badge badge-info">{{auth()->user()->name}}</span>
                            </h4>

                            {!! Form::model(auth()->user() ,['route'=>['doctor.edit_user_account',auth()->user()->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}

                            <div class="form-group row">
                                <label class="col-md-2 control-label">الاسم</label>
                                <div class="col-md-4">
                                    {!! Form::text('name',isset($doctor) ? auth()->user()->name :null  ,[
                                                       'class' =>'form-control '.($errors->has('name') ? ' is-invalid' : null),
                                                       'placeholder'=> 'الاسم' ,
                                                       ]) !!}
                                    @error('name')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label" for="example-email">البريد
                                    الالكترونى</label>
                                <div class="col-md-4">
                                    {!! Form::email('email',isset($doctor) ? auth()->user()->email :null,[
                                                 'class' =>'form-control '.($errors->has('email') ? ' is-invalid' : null),
                                                 'placeholder'=> 'البريد الالكترونى' ,
                                                 ]) !!}
                                    @error('email')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">كلمة المرور</label>
                                <div class="col-md-4">
                                    {!! Form::password('password',[
                                                 'class' =>'form-control '.($errors->has('password') ? ' is-invalid' : null),
                                                 'placeholder'=> 'كلمة المرور' ,
                                                 ]) !!}
                                    @error('password')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror </div>

                                <label class="col-md-2 control-label">تأكيد كلمة المرور</label>
                                <div class="col-md-4">
                                    {!! Form::password('password_confirmation',[
                                                 'class' =>'form-control '.($errors->has('password_confirmation') ? ' is-invalid' : null),
                                                 'placeholder'=>  'تأكيد كلمة المرور' ,
                                                 ]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">الجوال</label>
                                <div class="col-md-4">
                                    {!! Form::text('phone',isset($doctor) ? auth()->user()->phone :null,[
                                                'class' =>'form-control '.($errors->has('phone') ? ' is-invalid' : null),
                                                'placeholder'=> 'الجوال' ,
                                                ]) !!}
                                    @error('phone')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">الصورة </label>
                                <div class="col-sm-4">
                                    {!! Form::file('image',[ 'class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
                                    @error('image')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                    @if(auth()->user()->image)
                                        <a data-fancybox="gallery" href="{{auth()->user()->image_path}}">
                                            <img src="{{auth()->user()->image_path}}" width="100" height="100"
                                                 class="img-thumbnail">
                                        </a>
                                    @else لا يوجد صورة @endif

                            </div>

                            <div class="text-center form-group row">
                                <button type="submit"
                                        class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
                                </button>
                            </div>


                            {!! Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection
