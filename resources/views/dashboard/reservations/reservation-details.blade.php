<div class="portlet fadeIn">
    <div class="portlet-heading bg-purple">
        <h3 class="portlet-title">
            تفاصيل الطلب رقم / {{$reservation->id}}
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
                    <th> المريض</th>
                    <td>  {{$reservation->user->name}} </td>

                    <th> رقم الجوال</th>
                    <td>  {{$reservation->phone}} </td>
                </tr>


                <tr>
                    @if($reservation->type != 'service')
                        <th>الطبيب</th>
                        <td>  {{$reservation->doctor->user->name}} </td>
                    @endif
                    <th>التخصص</th>
                    <td>  {{$reservation->specialization->name}} </td>
                </tr>


                <tr>
                    @if($reservation->type != 'consult' && $reservation->type != 'chat' && $reservation->type != 'appointment')
                    <th>الخدمة</th>
                    <td>  {{$reservation->service->name}} </td>
                    @endif
                    <th>الفرع</th>
                    <td>  {{$reservation->branch->name ?? ''}} </td>
                </tr>

                <tr>
                    <th>حالة الحجز</th>
                    <td>  {{__($reservation->status)}} </td>

                    <th>السعر</th>
                    <td> {{$reservation->price}}</td>
                </tr>

                <tr>
                    <th>التاريخ</th>
                    <td> {{optional($reservation->date)->format('Y-m-d')}}</td>
                    @if($reservation->type == 'appointment')
                    <th>الميعاد</th>
                    <td> {{$reservation->appointment->timeslot}}</td>
                        @endif
                </tr>
                <tr>
                    <th>ملاحظات</th>
                    <td>
                        <p style="white-space: pre-line;overflow-wrap: anywhere;text-overflow: ellipsis;">{{$reservation->details}}</p>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div>

