<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item{{$item->id}}">التفاصيل
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item{{$item->id}}"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    تفاصيل {{$item->name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">
                        <table class="table table-bordered table-responsive table-striped">

                            <tr>
                                <th> الاسم بالعربية</th>
                                <td>  {{$item->ar_name}} </td>
                            </tr>
                            <tr>
                                <th> الاسم بالانجليزية</th>
                                <td>  {{$item->en_name}} </td>
                            </tr>

                            <tr>
                                <th> التفاصيل بالعربية</th>
                                <td>  {{$item->ar_details}} </td>
                            </tr>
                            <tr>
                                <th> التفاصيل بالانجليزية</th>
                                <td>  {{$item->en_details}} </td>
                            </tr>

                            <tr>
                                <th> الوصف بالعربية</th>
                                <td>  {{$item->ar_description}} </td>
                            </tr>
                            <tr>
                                <th> الوصف بالانجليزية</th>
                                <td>  {{$item->en_description}} </td>
                            </tr>

                            <tr>
                                <th> نظرة عامة بالعربية</th>
                                <td>  {{$item->ar_overview}} </td>
                            </tr>
                            <tr>
                                <th> نظرة عامة بالانجليزية</th>
                                <td>  {{$item->en_overview}} </td>
                            </tr>

                            <tr>
                                <th> السعر قبل الخصم</th>
                                <td>  {{number_format($item->price_before_discount,2)}} </td>
                            </tr>
                            <tr>
                                <th> السعر</th>
                                <td>  {{number_format($item->price,2)}} </td>
                            </tr>

                            <tr>
                                <th>  صور اضافية</th>
                                <td>
                                    @if($item->images)
                                        @foreach($item->images as $image)
                                            <a class="mr-2" data-fancybox="gallery" href="{{$image->file_path}}">
                                                <img src="{{$image->file_path}}" width="70" height="70"
                                                     class="img-thumbnail" alt="cat_img">
                                            </a>
                                        @endforeach
                                    @else
                                        لا يوجد
                                    @endif
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
