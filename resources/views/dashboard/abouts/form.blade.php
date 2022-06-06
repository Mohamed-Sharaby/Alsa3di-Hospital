<div class="form-group row">
    <label class="col-md-2 control-label">العنوان بالعربية</label>
    <div class="col-md-10">
        {!! Form::text('ar_title',null,[
                           'class' =>'form-control '.($errors->has('ar_title') ? ' is-invalid' : null),
                           'placeholder'=> 'العنوان بالعربية' ,
                           ]) !!}
        @error('ar_title')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">العنوان بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::text('en_title',null,[
                           'class' =>'form-control '.($errors->has('en_title') ? ' is-invalid' : null),
                           'placeholder'=> 'العنوان بالانجليزية' ,
                           ]) !!}
        @error('en_title')
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
        {!! Form::textarea('ar_details',null,['cols'=> '30','rows'=>8,
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
        {!! Form::textarea('en_details',null,['cols'=> '30','rows'=>8,
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
    <label class="col-md-2 control-label">المالك بالعربية</label>
    <div class="col-md-10">
        {!! Form::text('ar_author',null,[
                           'class' =>'form-control '.($errors->has('ar_author') ? ' is-invalid' : null),
                           'placeholder'=> 'المالك بالعربية' ,
                           ]) !!}
        @error('ar_author')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">المالك بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::text('en_author',null,[
                           'class' =>'form-control '.($errors->has('en_author') ? ' is-invalid' : null),
                           'placeholder'=> 'المالك بالانجليزية' ,
                           ]) !!}
        @error('en_author')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الوظيفة بالعربية</label>
    <div class="col-md-10">
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
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الوظيفة بالانجليزية</label>
    <div class="col-md-10">
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
        تفاصيل المالك بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_author_details',null,['cols'=> '30','rows'=>8,
    'class' =>'form-control ck-editor'.($errors->has('ar_author_details') ? ' is-invalid' : null),
    'placeholder'=> 'تفاصيل المالك بالعربية  ' ,
    ]) !!}
        @error('ar_author_details')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">
        تفاصيل المالك بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_author_details',null,['cols'=> '30','rows'=>8,
'class' =>'form-control ck-editor'.($errors->has('en_author_details') ? ' is-invalid' : null),
'placeholder'=> 'تفاصيل المالك بالانجليزية  ' ,
]) !!}
        @error('en_author_details')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الرؤية بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_vision',null,['cols'=> '30','rows'=>3,
   'class' =>'form-control '.($errors->has('ar_vision') ? ' is-invalid' : null),
   'placeholder'=> 'الرؤية بالعربية' ,
   ]) !!}
        @error('ar_vision')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الرؤية بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_vision',null,['cols'=> '30','rows'=>3,
  'class' =>'form-control '.($errors->has('en_vision') ? ' is-invalid' : null),
  'placeholder'=> 'الرؤية بالانجليزية' ,
  ]) !!}
        @error('en_vision')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الرسالة بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_message',null,['cols'=> '30','rows'=>3,
 'class' =>'form-control '.($errors->has('ar_message') ? ' is-invalid' : null),
 'placeholder'=> 'الرسالة بالانجليزية' ,
 ]) !!}
        @error('ar_message')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الرسالة بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_message',null,['cols'=> '30','rows'=>3,
'class' =>'form-control '.($errors->has('en_message') ? ' is-invalid' : null),
'placeholder'=> 'الرسالة بالانجليزية' ,
]) !!}
        @error('en_message')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label class="col-md-2 control-label">الاهداف بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_goals',null,['cols'=> '30','rows'=>3,
 'class' =>'form-control '.($errors->has('ar_goals') ? ' is-invalid' : null),
 'placeholder'=> 'الاهداف بالانجليزية' ,
 ]) !!}
        @error('ar_goals')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">الاهداف بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_goals',null,['cols'=> '30','rows'=>3,
  'class' =>'form-control '.($errors->has('en_goals') ? ' is-invalid' : null),
  'placeholder'=> 'الاهداف بالانجليزية' ,
  ]) !!}
        @error('en_goals')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">نبذه بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_brief',null,['cols'=> '30','rows'=>3,
  'class' =>'form-control '.($errors->has('ar_brief') ? ' is-invalid' : null),
  'placeholder'=> 'نبذه بالانجليزية' ,
  ]) !!}
        @error('ar_brief')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">نبذه بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_brief',null,['cols'=> '30','rows'=>3,
  'class' =>'form-control '.($errors->has('en_brief') ? ' is-invalid' : null),
  'placeholder'=> 'نبذه بالانجليزية' ,
  ]) !!}
        @error('en_brief')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 control-label">الصورة   </label>
    <div class="col-sm-4">
        {!! Form::file('image',[ 'class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
        @error('image')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
    @isset($item)
        @if($item->image)
            <a data-fancybox="gallery" href="{{$item->image_path}}">
                <img src="{{$item->image_path}}" width="100" height="100"
                     class="img-thumbnail">
            </a>
        @else لا يوجد صورة @endif
    @endisset
</div>




<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
    </button>
</div>
