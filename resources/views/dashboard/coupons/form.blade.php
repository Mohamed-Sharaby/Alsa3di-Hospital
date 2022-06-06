<div class="form-group row">
    <label class="col-md-2 control-label">الاسم بالعربية</label>
    <div class="col-md-4">
        {!! Form::text('code',null,[
                           'class' =>'form-control '.($errors->has('code') ? ' is-invalid' : null),
                           'placeholder'=> 'الكود' ,
                           ]) !!}
        @error('code')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">نسبة الخصم </label>
    <div class="col-md-4">
        {!! Form::number('value',null,[
                           'class' =>'form-control '.($errors->has('value') ? ' is-invalid' : null),
                           'placeholder'=> 'نسبة الخصم' ,
                           ]) !!}
        @error('value')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 control-label">تاريخ الانتهاء</label>
    <div class="col-md-4">
        {!! Form::date('expire_at',isset($item) ? $item->expire_at : null,[
                      'class' =>'form-control '.($errors->has('expire_at') ? ' is-invalid' : null),
                      ]) !!}
        @error('expire_at')
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
