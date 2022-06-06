@extends('dashboard.layouts.layout')
@section('title',' اضافة حجز جديد')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <a href="{{route('admin.reservations.index')}}" class="header-title m-t-0 m-b-30"><i
                            class="icon-home2 mr-2"></i>
                        الحجوزات </a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')
                            <h4 class="header-title m-t-0 m-b-30"> اضافة حجز</h4>
                            <h4 class="header-title m-t-0 m-b-30">
                                @include('dashboard.reservations.add_patient_modal')
                            </h4>
                            {!!Form::open( ['route' => 'admin.reservations.store', 'method' => 'Post','role'=>'form','class'=>'form-horizontal','files'=>true, 'id'=>'AddReservation',
 'x-data'=>'{type:"'.old('type').'" }'
  ]) !!}
                            @include('dashboard.reservations.form')
                            {!!Form::close() !!}
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div><!-- end col -->
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest(\App\Http\Requests\UserRequest::class, '#AddPatient'); !!}
    {!! JsValidator::formRequest(\App\Http\Requests\ReservationRequest::class, '#AddReservation'); !!}

    <script>
        $(document).ready(function () {
            $('#branch_id').on('click', function (e) {
                var branch_id = $(this).val();
                if (branch_id) {
                    $.ajax({
                        url: '/dashboard/getDoctorsByBranch/' + branch_id,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            $('#doctor_id').empty();
                            $.each(data, function (key, value) {
                                $('#doctor_id').append('<option value="' + value.id + '" >' + value.user.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#doctor_id').empty();
                }
            });
            //////////
            $('#specialization_id').on('click', function (e) {
                var specialization_id = $(this).val();
                if (specialization_id) {
                    $.ajax({
                        url: '/dashboard/getDoctorsBySpecialist/' + specialization_id,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            $('#doctor_id').empty();
                            $('#doctor_id').append('<option value="" ></option>');
                            $.each(data, function (key, value) {
                                $('#doctor_id').append('<option value="' + value.id + '" >' + value.user.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#doctor_id').empty();
                }
            });
            // /////////////
            $('#date').on('change', function (e) {
                var date = $(this).val();
                var doctor = $('#doctor_id').val();
                if (date) {
                    $.ajax({
                        url: '/dashboard/getTimeslotByDate/' + doctor+'/'+date,
                        method: 'GET',
                        type: 'json',
                        success: function (data) {
                            console.log(data)
                            $('#appointment_id').empty();
                            $.each(data, function (key, value) {
                                $('#appointment_id').append('<option value="' + value.id + '" >' + value.timeslot + '</option>');
                            });
                        }
                    });
                } else {
                    $('#appointment_id').empty();
                }
            });
            ////////////////
        });
    </script>

@endpush


