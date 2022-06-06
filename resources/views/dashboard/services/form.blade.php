<div class="form-group row">
    <label class="col-md-2 control-label">الاسم بالعربية</label>
    <div class="col-md-4">
        {!! Form::text('ar_name',null,[
                           'class' =>'form-control '.($errors->has('ar_name') ? ' is-invalid' : null),
                           'placeholder'=> 'الاسم بالعربية' ,
                           ]) !!}
        @error('ar_name')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">الاسم بالانجليزية</label>
    <div class="col-md-4">
        {!! Form::text('en_name',null,[
                           'class' =>'form-control '.($errors->has('en_name') ? ' is-invalid' : null),
                           'placeholder'=> 'الاسم بالانجليزية' ,
                           ]) !!}
        @error('en_name')
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
        {!! Form::textarea('ar_details',null,['cols'=> '30','rows'=>3,
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
        {!! Form::textarea('en_details',null,['cols'=> '30','rows'=>3,
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
    <label class="col-md-2 control-label">السعر </label>
    <div class="col-md-4">
        {!! Form::number('price',null,[
                      'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                      'placeholder'=>  'السعر' ,
                      ]) !!}
        @error('price')
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
