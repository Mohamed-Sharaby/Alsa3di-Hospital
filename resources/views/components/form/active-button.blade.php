<div>
    @if($status)
        <button class="btn btn-sm btn-success suspend-row" data-url="{{ route('admin.suspend', $id) }}" data-type="{{$type}}">
            مفعل
        </button>
    @else
        <button class="btn btn-sm btn-danger suspend-row" data-url="{{ route('admin.suspend', $id) }}" data-type="{{$type}}">
            غير مفعل
        </button>
    @endif
</div>