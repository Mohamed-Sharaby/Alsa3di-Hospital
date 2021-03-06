<div class="portlet fadeIn">
    <div class="portlet-heading bg-success">
        <h3 class="portlet-title">
            تغيير حالة الطلب / {{$cart->id}}
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
            {!! Form::model($cart,['route'=>['admin.carts.update',$cart->id],'method'=>'PUT','role'=>'form','class'=>'form-horizontal']) !!}
            <div class="row">
                <div class="col-12 col-md-6">
                    {!! Form::select('status',cart_status(),null,['class' =>'form-control ', 'placeholder'=>  'تغيير الحالة  ']) !!}
                    <input type="hidden" name="cart_id" value="{{$cart->id}}">
                </div>
                <div class="col-12 col-md-6">
                    <button type="submit" class="btn-icon waves-effect btn btn-success">حفظ</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
