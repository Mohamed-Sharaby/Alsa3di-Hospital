<div class="portlet fadeIn">
    <div class="portlet-heading bg-success">
        <h3 class="portlet-title">
            تغيير حالة الحجز / {{$reservation->id}}
        </h3>
        <div class="portlet-widgets">
            <a href="javascript:;" data-toggle="reload"><i
                    class="zmdi zmdi-refresh"></i></a>
            <a data-toggle="collapse" data-parent="#accordion1" href="#change_status"><i
                    class="zmdi zmdi-minus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="change_status" class="panel-collapse collapse in">
        <div class="portlet-body">

            <form action="{{route('admin.changeStatus',$reservation->id)}}" method="post" role="form" class="form-horizontal">
                @csrf
                {{method_field('put')}}
            <div class="row">
                <div class="col-12 col-md-6">
                    {!! Form::select('status',reservation_status(),$reservation->status,['class' =>'form-control ', 'placeholder'=>  'تغيير الحالة  ']) !!}

                </div>
                <div class="col-12 col-md-6">
                    <button type="submit" class="btn-icon waves-effect btn btn-success">حفظ</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
