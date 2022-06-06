<div class="form-group row">
    <label class="col-md-2 control-label">الاسم</label>
    <div class="col-md-4">
        {!! Form::text('name',isset($doctor) ? $doctor->user->name :null  ,[
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
        {!! Form::email('email',isset($doctor) ? $doctor->user->email :null,[
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
        {!! Form::text('phone',isset($doctor) ? $doctor->user->phone :null,[
                    'class' =>'form-control '.($errors->has('phone') ? ' is-invalid' : null),
                    'placeholder'=> 'الجوال' ,
                    ]) !!}
        @error('phone')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الخدمات</label>
    <div class="col-md-4">
        {!! Form::select('service_id[]',$services,isset($doctor) ? $doctor->services : null,['class' =>'form-control select2'.($errors->has('service_id') ? ' is-invalid' : null) ,'multiple' ]) !!}
        @error('service_id')
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
    @isset($doctor)
        @if($doctor->user->image)
            <a data-fancybox="gallery" href="{{$doctor->user->image_path}}">
                <img src="{{$doctor->user->image_path}}" width="100" height="100"
                     class="img-thumbnail">
            </a>
        @else لا يوجد صورة @endif
    @endisset
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الفرع</label>
    <div class="col-md-4">
        {!! Form::select('branch_id',$branches,null,['class' =>'form-control '.($errors->has('branch_id') ? ' is-invalid' : null)
 , 'placeholder'=>  'اختر الفرع' ]) !!}
        @error('branch_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">التخصص</label>
    <div class="col-md-4">
        {!! Form::select('specialization_id',$specializations,null,['class' =>'form-control '.($errors->has('specialization_id') ? ' is-invalid' : null)
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
        {!! Form::text('ar_job',null,[
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
        {!! Form::text('en_job',null,[
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
    <div class="col-md-10">
        {!! Form::textarea('ar_details',null,['cols'=> '30','rows'=>3,
    'class' =>'form-control ck-editor'.($errors->has('ar_details') ? ' is-invalid' : null),
    'placeholder'=> 'التفاصيل بالعربية  ' ,
    ]) !!}
        @error('ar_details')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">
        التفاصيل بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_details',null,['cols'=> '30','rows'=>3,
'class' =>'form-control ck-editor'.($errors->has('en_details') ? ' is-invalid' : null),
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
        {!! Form::text('ar_lang',null,[
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
        {!! Form::text('en_lang',null,[
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
        {!! Form::text('ar_clinic',null,[
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
        {!! Form::text('en_clinic',null,[
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
    <label class="col-md-2 control-label">سعر الكشف </label>
    <div class="col-md-4">
        {!! Form::number('appointment_price',null,[
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
        {!! Form::number('consult_price',null,[
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
    <label class="col-md-2 control-label">سعر المحادثة   </label>
    <div class="col-md-4">
        {!! Form::number('price',null,[
                      'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                      'placeholder'=>  'سعر المحادثة' ,
                      ]) !!}
        @error('price')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    <label class="col-md-2 control-label">وقت الكشف </label>
    <div class="col-md-4">
        {!! Form::number('detection_time',null,[
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
    <label class="col-md-2 control-label">بداية الدوام   </label>
    <div class="col-md-4">
        {!! Form::time('work_from',null,[
                      'class' =>'form-control '.($errors->has('work_from') ? ' is-invalid' : null),
                      'placeholder'=>  'من' ,
                      ]) !!}
        @error('work_from')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label"> نهاية الدوام   </label>
    <div class="col-md-4">
        {!! Form::time('work_to',null,[
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
        {!! Form::select('vacations[]',vacations(),null,['class' =>'form-control select2'.($errors->has('vacations') ? ' is-invalid' : null),'multiple' ]) !!}
        @error('vacations')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">متميز</label>
    <div class="col-md-4">
        {!! Form::select('is_distinct',boolean(),null,['class' =>'form-control'.($errors->has('is_distinct') ? ' is-invalid' : null) ,'placeholder'=>'اختر' ]) !!}
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
