<button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
        data-target="#item">اضافة مريض جديد
</button>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="item"
     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">
                    اضافة مريض جديد  </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 ">

                        {!!Form::open( ['route' => 'admin.addPatient', 'method' => 'Post','role'=>'form','class'=>'form-horizontal','files'=>true,'id'=>'AddPatient'

                          ]) !!}

                        <div class="form-group row">
                            <label class="col-md-2 control-label">الاسم</label>
                            <div class="col-md-4">
                                {!! Form::text('name',null,[
                                                   'class' =>'form-control '.($errors->has('name') ? ' is-invalid' : null),
                                                   'placeholder'=> 'الاسم' ,
                                                   ]) !!}
                                @error('name')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <label class="col-md-2 control-label" for="example-email">البريد
                                الالكترونى</label>
                            <div class="col-md-4">
                                {!! Form::email('email',null,[
                                             'class' =>'form-control '.($errors->has('email') ? ' is-invalid' : null),
                                             'placeholder'=> 'البريد الالكترونى' ,
                                             ]) !!}
                                @error('email')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 control-label">كلمة المرور</label>
                            <div class="col-md-4">
                                {!! Form::password('password',[
                                             'class' =>'form-control '.($errors->has('password') ? ' is-invalid' : null),
                                             'placeholder'=> 'كلمة المرور' ,
                                             ]) !!}
                                @error('password')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror </div>

                            <label class="col-md-2 control-label">تأكيد كلمة المرور</label>
                            <div class="col-md-4">
                                {!! Form::password('password_confirmation',[
                                             'class' =>'form-control '.($errors->has('password_confirmation') ? ' is-invalid' : null),
                                             'placeholder'=>  'تأكيد كلمة المرور' ,
                                             ]) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 control-label">الجوال</label>
                            <div class="col-md-4">
                                {!! Form::text('phone',null,[
                                            'class' =>'form-control '.($errors->has('phone') ? ' is-invalid' : null),
                                            'placeholder'=> 'الجوال' ,
                                            ]) !!}
                                @error('phone')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <label class="col-sm-2 control-label">الصورة </label>
                            <div class="col-sm-4">
                                {!! Form::file('image',[ 'class' =>'form-control '.($errors->has('image') ? ' is-invalid' : null) ]) !!}
                                @error('image')
                                <div class="invalid-feedback" style="color: #ef1010">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="text-center form-group row">
                            <button type="submit"
                                    class="btn btn-success  waves-effect waves-light m-l-10 btn-md"> اضافة
                            </button>
                        </div>


                        {!!Form::close() !!}

                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
