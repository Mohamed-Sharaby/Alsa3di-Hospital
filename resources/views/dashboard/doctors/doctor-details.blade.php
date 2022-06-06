<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$doctor->id}}">التفاصيل
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$doctor->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    تفاصيل {{$doctor->user->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped">

                            <tr>
                                <th class="font-bold" class="font-bold"> التخصص</th>
                                <td>  {{$doctor->specialization->name}} </td>

                                <th class="font-bold"> الفرع</th>
                                <td>  {{$doctor->branch->name}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> الوظيفة بالعربية</th>
                                <td>  {{$doctor->ar_job}} </td>

                                <th class="font-bold"> الوظيفة بالانجليزية</th>
                                <td>  {{$doctor->en_job}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> التفاصيل بالعربية</th>
                                <td>  {{$doctor->ar_details}} </td>

                                <th class="font-bold"> التفاصيل بالانجليزية</th>
                                <td>  {{$doctor->en_details}} </td>
                            </tr>
                            <tr>
                                <th class="font-bold"> اللغات بالعربية</th>
                                <td>  {{$doctor->ar_lang}} </td>

                                <th class="font-bold"> اللغات بالانجليزية</th>
                                <td>  {{$doctor->en_lang}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> العيادات بالعربية</th>
                                <td>  {{$doctor->ar_clinic}} </td>

                                <th class="font-bold"> العيادات بالانجليزية</th>
                                <td>  {{$doctor->en_clinic}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> سعر الميعاد</th>
                                <td>  {{$doctor->appointment_price}} </td>

                                <th class="font-bold"> سعر الاستشارة</th>
                                <td>  {{$doctor->consult_price}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> السعر</th>
                                <td>  {{$doctor->price}} </td>

                                <th class="font-bold"> وقت الكشف</th>
                                <td>  {{$doctor->detection_time}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold">بداية الدوام</th>
                                <td>  {{$doctor->work_from}} </td>

                                <th class="font-bold">نهاية الدوام</th>
                                <td>  {{$doctor->work_to}} </td>
                            </tr>

                            <tr>
                                <th class="font-bold"> الاجازات</th>
                                <td>
                                    @foreach($doctor->vacations as $vacation)
                                        <li>{{__($vacation)}}</li>
                                    @endforeach
                                </td>

                                <th class="font-bold"> مميز</th>
                                <td>
                                    {{$doctor->is_distinct == 1 ? 'نعم' : 'لا'}}
                                </td>

                            </tr>

                            <tr>
                                <th class="font-bold"> الخدمات</th>
                                <td>
                                    @foreach($doctor->services as $service)
                                        <li>{{$service->name}}</li>
                                    @endforeach
                                </td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
