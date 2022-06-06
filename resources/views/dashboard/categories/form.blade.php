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
    <label class="col-sm-2 control-label">الصورة  </label>
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
