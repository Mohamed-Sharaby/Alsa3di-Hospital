<div class="col-md-{{$size??12}}">
    <div class="form-group">
        <label>{{$title}}</label>
        <input type="file" class="form-control dropify" accept="{{$types}}" name="{{$name}}"  {{ $options }}
        data-parsley-required-message="هذا الحقل مطلوب">
        @error('image')
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>

