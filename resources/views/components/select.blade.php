<div class="col-{{$size??12}}">
    <div class="form-group">
        <label>{{$title}}</label>
        {!! Form::select($name,$items,$value,['class'=>'form-control select2 select-tag',$options]) !!}
        <p class="help-block"></p>
        @error($name)
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
</div>
