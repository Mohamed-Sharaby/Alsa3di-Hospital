<div class="form-group row">
    <label class="col-md-2 control-label">اليوم</label>
    <div class="col-md-4">
        {!! Form::date('day',null,[
                      'class' =>'form-control '.($errors->has('day') ? ' is-invalid' : null),
                      ]) !!}
        @error('day')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>


    <label class="col-md-2 control-label" for="example-email">
        timeslot</label>
    <div class="col-md-4">
        {!! Form::text('timeslot',isset($appointment) ? $appointment->timeslot :null,[
                     'class' =>'form-control '.($errors->has('timeslot') ? ' is-invalid' : null),
                     'placeholder'=> 'timeslot ' ,
                     ]) !!}
        @error('timeslot')
        <div class="invalid-feedback" style="color: #ef1010">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<input type="hidden" name="doctor_id" value="{{isset($appointment) ? $appointment->doctor->id : $doctor->id}}">

<div class="text-center form-group row">
    <button type="submit"
            class="btn btn-success btn-block waves-effect waves-light m-l-10 btn-md"> حفظ
    </button>
</div>
