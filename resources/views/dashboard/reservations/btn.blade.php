<td class="text-center">

    <a href="{{route('admin.reservations.show',$model->id)}}"
       title="التفاصيل"
       class="btn-icon waves-effect btn btn-success btn-sm ml-2 rounded-circle"> التفاصيل</a>

    <a href="{{route('admin.reservations.edit',$model->id)}}"
       title="تعديل"
       class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                class="fa fa-edit"></i>
    </a>

    <button data-url="{{route('admin.reservations.destroy',$model->id)}}"
            data-name="{{$model->user->name}}"
            class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
            title="حذف">
        <i class="fa fa-trash"></i>
    </button>

</td>
