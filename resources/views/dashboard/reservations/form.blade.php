<div class="form-group row">
    <label class="col-md-2 control-label">النوع</label>
    <div class="col-md-4">
        {!! Form::select('type',reservation_types(),null,['class' =>'form-control '.($errors->has('type') ? ' is-invalid' : null)
 , 'placeholder'=>  'اختر النوع', 'x-model'=>'type' ]) !!}
        @error('type')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>

    <label class="col-md-2 control-label">المريض</label>
    <div class="col-md-4">
        {!! Form::select('user_id',$users,null,['class' =>'form-control select2'.($errors->has('user_id') ? ' is-invalid' : null)
 , 'placeholder'=>  'اختر المريض' ]) !!}
        @error('user_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <div x-show="type=='service'||type=='appointment'">
        <label class="col-md-2 control-label">الفرع</label>
        <div class="col-md-4">
            {!! Form::select('branch_id',$branches,null,['class' =>'form-control '.($errors->has('branch_id') ? ' is-invalid' : null) , 'id'=>'branch_id'
   ]) !!}
            @error('branch_id')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

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
</div>

<div class="form-group row" x-show="type!='service'">
    <label class="col-md-2 control-label">التخصص</label>
    <div class="col-md-4">
        {!! Form::select('specialization_id',$specializations,null,['class' =>'form-control '.($errors->has('specialization_id') ? ' is-invalid' : null), 'id'=>'specialization_id'
  ]) !!}
        @error('specialization_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row" x-show="type!='service'">
    <label class="col-md-2 control-label">الطبيب</label>
    <div class="col-md-4">
        <select name="doctor_id" id="doctor_id" class="form-control {{$errors->has('doctor_id') ? 'is-invalid':null}}">
            {{--            <option disabled selected>أختر الطبيب</option>--}}
            @isset($reservation->doctor_id)
                <option value="{{$reservation->doctor_id}}">{{$reservation->doctor->user->name}}  </option>
            @endisset
        </select>
        @error('doctor_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


<div class="form-group row" x-show="type=='service'">
    <label class="col-md-2 control-label">الخدمة</label>
    <div class="col-md-4">
        {!! Form::select('service_id',$services,null,['class' =>'form-control '.($errors->has('service_id') ? ' is-invalid' : null)
 , 'placeholder'=>  'اختر الخدمة' ]) !!}
        @error('service_id')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 control-label">التاريخ</label>
    <div class="col-md-4">
        {!! Form::date('date',isset($reservation) ?  $reservation->date : null,[
                      'class' =>'form-control '.($errors->has('date') ? ' is-invalid' : null),'id'=>'date'
                      ]) !!}
        @error('date')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="form-group row" x-show="type=='appointment'">
    <label class="col-md-2 control-label">الميعاد</label>
    <div class="col-md-4">
        <select name="appointment_id" id="appointment_id"
                class="form-control {{$errors->has('appointment_id') ? 'is-invalid':null}}">
            @isset($reservation->appointment_id)
                <option value="{{$reservation->appointment_id}}">{{$reservation->appointment->timeslot}}  </option>
            @endisset
        </select>
        @error('appointment_id')
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

    <label class="col-md-2 control-label">
        التفاصيل </label>
    <div class="col-md-4">
        {!! Form::textarea('details',null,['cols'=> '30','rows'=>3,
    'class' =>'form-control '.($errors->has('details') ? ' is-invalid' : null),
    'placeholder'=> 'التفاصيل    ' ,
    ]) !!}
        @error('details')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
@isset($reservation)
    <div class="form-group row">
        <label class="col-md-2 control-label">الحالة</label>
        <div class="col-md-4">
            {!! Form::select('status',reservation_status(),null,['class' =>'form-control '.($errors->has('status') ? ' is-invalid' : null)
     , 'placeholder'=>  'اختر الحالة',  ]) !!}
            @error('status')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2 control-label">اضافة مرفقات   </label>
        <div class="col-sm-4">
            <input type="file"
                   class="form-control  {{$errors->has('files') ? ' is-invalid' : null}}"
                   name="files[]" multiple>
            @error('files')
            <div class="invalid-feedback" style="color: #ef1010">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <p class="msg alert alert-success  text-center" style="display: none;margin-bottom: 10px;">
        تم حذف المرفق بنجاح
    </p>
    <div class="form-group row">
            @if($reservation->files)
                @foreach($reservation->files as $file)
                    <div class="col-12 col-md-3 image{{$file->id}}">
{{--                        <a data-fancybox="gallery" href="{{$image->file_path}}">--}}
{{--                            <img src="{{$image->file_path}}" width="100" height="100"--}}
{{--                                 class="img-thumbnail">--}}
{{--                        </a>--}}
                        <a href="{{$file->file_path}}" target="_blank">
                            <p>{{substr(str_replace(url('/').'/storage/uploads/','',$file->file_path),0,10) }}</p>
                        </a>
                        <a class="btn btn-danger del_product_img btn-sm rounded-circle"
                           data-id="{{$file->id}}" title="حذف">
                            <i class="fa fa-trash text-white"></i></a>
                    </div>
                @endforeach
            @else لا يوجد مرفقات @endif
    </div>

@endisset

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
    </button>
</div>

