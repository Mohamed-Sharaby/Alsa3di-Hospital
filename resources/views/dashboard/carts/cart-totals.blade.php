<div class="portlet fadeIn">
    <div class="portlet-heading bg-purple">
        <h3 class="portlet-title">
            بيانات الاجماليات
        </h3>
        <div class="portlet-widgets">
            <a href="javascript:;" data-toggle="reload"><i
                    class="zmdi zmdi-refresh"></i></a>
            <a data-toggle="collapse" data-parent="#accordion1" href="#details2"><i
                    class="zmdi zmdi-minus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="details2" class="panel-collapse collapse in">
        <div class="portlet-body">

            <table class="table table-bordered table-responsive table-striped text-center">

                <tr>
                    <th> اجمالى سعر المنتجات</th>
                    <td>  {{number_format($cart->total_products_price,2)}} </td>
                </tr>

                <tr>
                    <th>تكلفة التوصيل</th>
                    <td> {{number_format($cart->shipping_fees,2)}}</td>
                </tr>

                <tr>
                    <th>  كوبون الخصم({{ $cart->coupon_discount }} %)</th>
                    <td> {{$cart->coupon_val }} %</td>
                </tr>

                <tr>
                    <th>  الاجمالى</th>
                    <td> {{number_format($cart->total,2)}}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

