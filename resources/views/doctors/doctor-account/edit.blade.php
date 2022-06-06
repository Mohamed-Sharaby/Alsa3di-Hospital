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
                                تعديل بيانات الطبيب
                                <span class="badge badge-info">{{auth()->user()->name}}</span>
                            </h4>

                            {!! Form::model(auth()->user() ,['route'=>['doctor.update_doctor_account',auth()->user()->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal','files'=>true]) !!}


                            <div class="form-group row">
                                <label class="col-md-2 control-label">الخدمات</label>
                                <div class="col-md-10">
                                    {!! Form::select('service_id[]',$services,  $doctor->services ? $doctor->services : null  ,['class' =>'form-control select2'.($errors->has('service_id') ? ' is-invalid' : null) ,'multiple' ]) !!}
                                    @error('service_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">الفرع</label>
                                <div class="col-md-4">
                                    {!! Form::select('branch_id',$branches, $doctor->branch_id ? $doctor->branch_id : null,['class' =>'form-control '.($errors->has('branch_id') ? ' is-invalid' : null)
                             , 'placeholder'=>  'اختر الفرع' ]) !!}
                                    @error('branch_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">التخصص</label>
                                <div class="col-md-4">
                                    {!! Form::select('specialization_id',$specializations, $doctor->specialization_id,['class' =>'form-control '.($errors->has('specialization_id') ? ' is-invalid' : null)
                            , 'placeholder'=>  'اختر التخصص' ]) !!}
                                    @error('specialization_id')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">الوظيفة بالعربية</label>
                                <div class="col-md-4">
                                    {!! Form::text('ar_job',$doctor->ar_job,[
                                                       'class' =>'form-control '.($errors->has('ar_job') ? ' is-invalid' : null),
                                                       'placeholder'=> 'الوظيفة بالعربية' ,
                                                       ]) !!}
                                    @error('ar_job')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">الوظيفة بالانجليزية</label>
                                <div class="col-md-4">
                                    {!! Form::text('en_job',$doctor->en_job,[
                                                       'class' =>'form-control '.($errors->has('en_job') ? ' is-invalid' : null),
                                                       'placeholder'=> 'الوظيفة بالانجليزية' ,
                                                       ]) !!}
                                    @error('en_job')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">
                                    التفاصيل بالعربية</label>
                                <div class="col-md-4">
                                    {!! Form::textarea('ar_details',$doctor->ar_details,['cols'=> '30','rows'=>3,
                                'class' =>'form-control '.($errors->has('ar_details') ? ' is-invalid' : null),
                                'placeholder'=> 'التفاصيل بالعربية  ' ,
                                ]) !!}
                                    @error('ar_details')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">
                                    التفاصيل بالانجليزية</label>
                                <div class="col-md-4">
                                    {!! Form::textarea('en_details',$doctor->en_details,['cols'=> '30','rows'=>3,
                            'class' =>'form-control '.($errors->has('en_details') ? ' is-invalid' : null),
                            'placeholder'=> 'التفاصيل بالانجليزية  ' ,
                            ]) !!}
                                    @error('en_details')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">اللغات بالعربية</label>
                                <div class="col-md-4">
                                    {!! Form::text('ar_lang',$doctor->ar_lang,[
                                                       'class' =>'form-control '.($errors->has('ar_lang') ? ' is-invalid' : null),
                                                       'placeholder'=> 'اللغات بالعربية' ,
                                                       ]) !!}
                                    @error('ar_lang')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">اللغات بالانجليزية</label>
                                <div class="col-md-4">
                                    {!! Form::text('en_lang',$doctor->en_lang,[
                                                       'class' =>'form-control '.($errors->has('en_lang') ? ' is-invalid' : null),
                                                       'placeholder'=> 'اللغات بالانجليزية' ,
                                                       ]) !!}
                                    @error('en_lang')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">العيادات بالعربية</label>
                                <div class="col-md-4">
                                    {!! Form::text('ar_clinic',$doctor->ar_clinic,[
                                                       'class' =>'form-control '.($errors->has('ar_clinic') ? ' is-invalid' : null),
                                                       'placeholder'=> 'العيادات بالعربية' ,
                                                       ]) !!}
                                    @error('ar_clinic')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">العيادات بالانجليزية</label>
                                <div class="col-md-4">
                                    {!! Form::text('en_clinic',$doctor->en_clinic,[
                                                       'class' =>'form-control '.($errors->has('en_clinic') ? ' is-invalid' : null),
                                                       'placeholder'=> 'العيادات بالانجليزية' ,
                                                       ]) !!}
                                    @error('en_clinic')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">appointment_price </label>
                                <div class="col-md-4">
                                    {!! Form::number('appointment_price',$doctor->appointment_price,[
                                                  'class' =>'form-control '.($errors->has('appointment_price') ? ' is-invalid' : null),
                                                  'placeholder'=>  'السعر' ,
                                                  ]) !!}
                                    @error('appointment_price')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">سعر الاستشارة </label>
                                <div class="col-md-4">
                                    {!! Form::number('consult_price',$doctor->consult_price,[
                                                  'class' =>'form-control '.($errors->has('consult_price') ? ' is-invalid' : null),
                                                  'placeholder'=>  'سعر الاستشارة' ,
                                                  ]) !!}
                                    @error('consult_price')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">السعر </label>
                                <div class="col-md-4">
                                    {!! Form::number('price',$doctor->price,[
                                                  'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                                                  'placeholder'=>  'السعر' ,
                                                  ]) !!}
                                    @error('price')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <label class="col-md-2 control-label">وقت الكشف </label>
                                <div class="col-md-4">
                                    {!! Form::number('detection_time',$doctor->detection_time,[
                                                  'class' =>'form-control '.($errors->has('detection_time') ? ' is-invalid' : null),
                                                  'placeholder'=>  'وقت الكشف' ,
                                                  ]) !!}
                                    @error('detection_time')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">من الساعة </label>
                                <div class="col-md-4">
                                    {!! Form::time('work_from',$doctor->work_from,[
                                                  'class' =>'form-control '.($errors->has('work_from') ? ' is-invalid' : null),
                                                  'placeholder'=>  'من' ,
                                                  ]) !!}
                                    @error('work_from')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label"> الى الساعة </label>
                                <div class="col-md-4">
                                    {!! Form::time('work_to',$doctor->work_to,[
                                                  'class' =>'form-control '.($errors->has('work_to') ? ' is-invalid' : null),
                                                  'placeholder'=>  'الى' ,
                                                  ]) !!}
                                    @error('work_to')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">الاجازات</label>
                                <div class="col-md-4">
                                    {!! Form::select('vacations[]',vacations(),$doctor->vacations,['class' =>'form-control select2'.($errors->has('vacations') ? ' is-invalid' : null),'multiple' ]) !!}
                                    @error('vacations')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <label class="col-md-2 control-label">متميز</label>
                                <div class="col-md-4">
                                    {!! Form::select('is_distinct',boolean(),$doctor->is_distinct,['class' =>'form-control'.($errors->has('is_distinct') ? ' is-invalid' : null) ,'placeholder'=>'اختر' ]) !!}
                                    @error('is_distinct')
                                    <div class="invalid-feedback" style="color: #ef1010">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
