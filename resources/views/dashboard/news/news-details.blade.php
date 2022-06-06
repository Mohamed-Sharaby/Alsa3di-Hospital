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
                                <th> العنوان بالعربية</th>
                                <td>  {{$item->ar_title}} </td>
                            </tr>
                            <tr>
                                <th> العنوان بالانجليزية</th>
                                <td>  {{$item->en_title}} </td>
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
                                <th> الكاتب </th>
                                <td>  {{$item->author}} </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
