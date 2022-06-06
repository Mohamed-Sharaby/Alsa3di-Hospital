

<div class="col-md-{{$size??12}}">
    <div class="form-group">
        <label for="">{{$title}}</label>
        <textarea name="{{$name}}" class="form-control" {{$options}}
                rows="5"
               data-parsley-required-message="هذا الحقل مطلوب"
               data-parsley-trigger="keyup">{{old($name, $value)}}</textarea>
        @error('phone')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>