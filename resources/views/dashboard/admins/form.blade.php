<div class="form-group row">
    <label class="col-md-2 control-label">الاسم</label>
    <div class="col-md-4">
        {!! Form::text('name',null,[
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
        {!! Form::email('email',null,[
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
        {!! Form::text('phone',null,[
                    'class' =>'form-control '.($errors->has('phone') ? ' is-invalid' : null),
                    'placeholder'=> 'الجوال' ,
                    ]) !!}
        @error('phone')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-sm-2 control-label"> المنصب</label>
    <div class="col-sm-4">
        {!! Form::select('roles',$roles,null,['class' =>'form-control '.($errors->has('roles') ? ' is-invalid' : null)
, 'placeholder'=>  'اختر المنصب' ]) !!}
        @error('roles')
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
    @isset($admin)
        @if($admin->image)
            <a data-fancybox="gallery" href="{{$admin->image_path}}">
                <img src="{{$admin->image_path}}" width="100" height="100"
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
