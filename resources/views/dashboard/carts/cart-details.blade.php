<div class="portlet fadeIn">
    <div class="portlet-heading bg-purple">
        <h3 class="portlet-title">
            تفاصيل الطلب رقم / {{$cart->id}}
        </h3>
        <div class="portlet-widgets">
            <a href="javascript:;" data-toggle="reload"><i
                    class="zmdi zmdi-refresh"></i></a>
            <a data-toggle="collapse" data-parent="#accordion1" href="#details"><i
                    class="zmdi zmdi-minus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="details" class="panel-collapse collapse in">
        <div class="portlet-body">

            <table class="table table-bordered table-responsive table-striped">

                <tr>
                    <th> العميل</th>
                    <td>  {{$cart->user->name}} </td>

                    <th>الحالة</th>
                    <td>  {{__($cart->status)}} </td>
                </tr>

                <tr>
                    <th>التاريخ</th>
                    <td> {{$cart->created_at->toDateString()}}</td>

                    <th>السعر</th>
                    <td> {{$cart->total}}</td>
                </tr>


            </table>
        </div>
    </div>
</div>

