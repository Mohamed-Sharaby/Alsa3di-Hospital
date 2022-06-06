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
    <label class="col-md-2 control-label">
        الوصف بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_description',null,['cols'=> '30','rows'=>3,
    'class' =>'form-control ck-editor'.($errors->has('ar_description') ? ' is-invalid' : null),
    'placeholder'=> 'الوصف بالعربية  ' ,
    ]) !!}
        @error('ar_description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">
        الوصف بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_description',null,['cols'=> '30','rows'=>3,
'class' =>'form-control ck-editor'.($errors->has('en_description') ? ' is-invalid' : null),
'placeholder'=> 'الوصف بالانجليزية  ' ,
]) !!}
        @error('en_description')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">
        نظرة عامة بالعربية</label>
    <div class="col-md-10">
        {!! Form::textarea('ar_overview',null,['cols'=> '30','rows'=>3,
    'class' =>'form-control ck-editor'.($errors->has('ar_overview') ? ' is-invalid' : null),
    'placeholder'=> 'نظرة عامة بالعربية  ' ,
    ]) !!}
        @error('ar_overview')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">
        نظرة عامة بالانجليزية</label>
    <div class="col-md-10">
        {!! Form::textarea('en_overview',null,['cols'=> '30','rows'=>3,
'class' =>'form-control ck-editor'.($errors->has('en_overview') ? ' is-invalid' : null),
'placeholder'=> 'نظرة عامة بالانجليزية  ' ,
]) !!}
        @error('en_overview')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">السعر قبل الخصم </label>
    <div class="col-md-4">
        {!! Form::number('price_before_discount',null,[
                           'class' =>'form-control '.($errors->has('price_before_discount') ? ' is-invalid' : null),
                           'placeholder'=> 'السعر قبل الخصم   ' ,'step'=>'0.01'
                           ]) !!}
        @error('price_before_discount')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">السعر     </label>
    <div class="col-md-4">
        {!! Form::number('price',null,[
                           'class' =>'form-control '.($errors->has('price') ? ' is-invalid' : null),
                           'placeholder'=> 'السعر بعد الخصم   ' ,'step'=>'0.01'
                           ]) !!}
        @error('price')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">القسم الفرعى</label>
    <div class="col-md-4">
        {!! Form::select('sub_category_id',$subCategories,null,['class' =>'form-control '.($errors->has('sub_category_id') ? ' is-invalid' : null)
, 'placeholder'=>  'اختر القسم' ]) !!}
        @error('sub_category_id')
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
</div>
<p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
    تم حذف الصورة بنجاح
</p>
<div class="form-group row">
    @isset($item)
        @if($item->images)
            @foreach($item->images as $image)
                <div class="col-12 col-md-4 image{{$image->id}}">
                    <a data-fancybox="gallery" href="{{$image->file_path}}">
                        <img src="{{$image->file_path}}" width="100" height="100"
                             class="img-thumbnail">
                    </a>

                    <a class="btn btn-danger del_product_img btn-sm rounded-circle"
                       data-id="{{$image->id}}" title="حذف">
                        <i class="fa fa-trash text-white"></i></a>
                </div>
            @endforeach
        @else لا يوجد صورة @endif
    @endisset
</div>


<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
    </button>
</div>
