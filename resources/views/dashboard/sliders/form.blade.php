<div class="form-group row">
    <label class="col-md-2 control-label">العنوان بالعربية</label>
    <div class="col-md-4">
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

    <label class="col-md-2 control-label">العنوان بالانجليزية</label>
    <div class="col-md-4">
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
    <label class="col-md-2 control-label">
        العرض في </label>
    <div class="col-md-4">
        {!! Form::select('type',['site' => 'الموقع', 'mobile' => 'التطبيق'],null,['cols'=> '30','rows'=>3,
'class' =>'form-control '.($errors->has('en_details') ? ' is-invalid' : null),
'placeholder'=> 'مكان العرض ' ,
]) !!}
        @error('type')
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
