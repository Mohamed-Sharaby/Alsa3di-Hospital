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
    <label class="col-sm-2 control-label">الصورة الرئيسية </label>
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

<div class="form-group row">
    <label class="col-sm-2 control-label">صور اضافية </label>
    <div class="col-sm-4">
        {!! Form::file('images[]',[ 'class' =>'form-control '.($errors->has('images') ? ' is-invalid' : null),'multiple' ]) !!}
        @error('images')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
{{--    @isset($item)--}}
{{--        @if($item->image)--}}
{{--            <a data-fancybox="gallery" href="{{$item->image_path}}">--}}
{{--                <img src="{{$item->image_path}}" width="100" height="100"--}}
{{--                     class="img-thumbnail">--}}
{{--            </a>--}}
{{--        @else لا يوجد صورة @endif--}}
{{--    @endisset--}}
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">العنوان </label>
    <div class="col-md-4">
        {!! Form::text('address',null,[
                           'class' =>'form-control '.($errors->has('address') ? ' is-invalid' : null),
                           'placeholder'=> 'العنوان' ,
                           ]) !!}
        @error('address')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>


    {!! Form::text('lat',null,['id'=>'lat','class' =>'form-control hidden',]) !!}
    {!! Form::text('lng',null,['id'=>'lng','class' =>'form-control  hidden',]) !!}
</div>

<div class="form-group row">
    <div id="map" style="height: 300px;"></div>
</div>
<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
    </button>
</div>
