<div class="portlet fadeIn">
    <div class="portlet-heading bg-purple">
        <h3 class="portlet-title">
            منتجات الطلب رقم / {{$cart->id}}
        </h3>
        <div class="portlet-widgets">
            <a href="javascript:;" data-toggle="reload"><i
                    class="zmdi zmdi-refresh"></i></a>
            <a data-toggle="collapse" data-parent="#accordion1" href="#details1"><i
                    class="zmdi zmdi-minus"></i></a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="details1" class="panel-collapse collapse in">
        <div class="portlet-body">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>اسم المنتج</th>
                    <th>القسم</th>
                    <th>الصورة</th>
                    <th>سعر المنتج</th>
                    <th>الكمية</th>
                    <th>الاجمالى</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cart->items as $item)
                    <tr>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->subCategory->name}}</td>
                        <td>
                            @if($item->product->image)
                                <a data-fancybox="gallery" href="{{$item->product->image_path}}">
                                    <img src="{{$item->product->image_path}}" width="70" height="70"
                                         class="img-thumbnail" alt="product_img">
                                </a>
                            @else {{__('No Image')}} @endif
                        </td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->total_price}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

