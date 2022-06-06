<div class="col-{{$size??12}}">
    <div class="form-group">
        <label>
        {!! Form::checkbox($name,$value, null,['class'=>'product']+$options) !!} {{ $title }}
        </label>
        <p class="help-block"></p>
        @error($name)
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
</div>
