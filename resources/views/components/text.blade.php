

<div class="col-md-{{$size??12}}">
    <div class="form-group">
        <label for="">{{ $title }}</label>
        <input type="text" name="{{ $name }}" class="form-control" value="{{old($name, $value)}}" {{$options}}
               data-parsley-required-message="هذا الحقل مطلوب"
               data-parsley-trigger="keyup"
               data-parsley-maxlength="190"
               data-parsley-maxlength-message="اقصى عدد حروف 190 حرف" autocomplete="off">
        @error($name)
        <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>