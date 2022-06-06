<div class="col-{{$size??12}}">
    <div class="form-group">
        <label>{{$title}}</label>
        {!! Form::text($name,($value ?? date('Y-m-d')),['placeholder'=>"$title",'class'=>'form-control pickadate']+$options) !!}
        <p class="help-block"></p>
        @error($name)
        <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
</div>
