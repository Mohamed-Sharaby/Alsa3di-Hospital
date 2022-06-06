@extends('dashboard.layouts.layout')
@section('title','الحجوزات ')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="breadcrumb">
                    <a href="{{route('admin.main')}}" class="header-title m-t-0 m-b-30"><i class="icon-home2 mr-2"></i>
                        الرئيسية</a> /
                    <span class="breadcrumb-item active">@yield('title')</span>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            @include('dashboard.layouts.status')

                            <a href="{{route('admin.reservations.create')}}"
                               class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5">اضافة حجز
                                جديد</a>
                            <br>
                            <br>

                            {{$dataTable->table(['class'=>'table table-bordered text-center'])}}
                        </div>
                    </div><!-- end col -->
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@include('dashboard.layouts.datatables_scripts',['yajra'=>true])


@push('scripts')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        var module = { }; /*   <-----THIS LINE */
    </script>


    <script type="module">

        import Echo from '{{asset('js/echo.js')}}'

        import {Pusher} from '{{asset('js/pusher.js')}}'

        window.Pusher = Pusher
       // console.log('Env',"{{env('MIX_PUSHER_APP_KEY')}}", "{{env('MIX_WEBSOCKETS_SERVER')}}")
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: "{{env('MIX_PUSHER_APP_KEY')}}",
            wsHost: "{{env('MIX_WEBSOCKETS_SERVER')}}",
            wsPort: 6001,
            forceTLS: false,
            disableStats: true
        });

        window.Echo.channel('new-appointment').listen('NewAppointment', (e) => {
            //console.log('my real time response', e)
            $('table tbody').prepend(`
             <tr style="background-color: #f4f8fb !important;">
                <td>${e.id}</td>
                <td>${e.user.name}</td>
                <td>${e.doctor ? e.doctor.user.name : ''}</td>
                <td>${e.appointment ? e.appointment.day : (new Date(e.date)).toISOString().substring(0, 10)}</td>
                <td>${e.type_lang}</td>
                <td>${e.status_lang}</td>
                <td class="text-center">
                    <a href="/dashboard/reservations/${e.id}"
                       title="التفاصيل"
                       class="btn-icon waves-effect btn btn-success btn-sm ml-2 rounded-circle"> التفاصيل</a>
                    <a href="/dashboard/reservations/${e.id}/edit"
                       title="تعديل"
                       class="btn-icon waves-effect btn btn-primary btn-sm ml-2 rounded-circle"><i
                                class="fa fa-edit"></i>
                    </a>
                    <button data-url="/dashboard/reservations/${e.id}"
                            data-name="${e.user.name}"
                            class="btn-icon waves-effect btn btn-danger rounded-circle btn-sm ml-2 delete"
                            title="حذف">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            `)
        })
    </script>

    <script>
        function clickme()
        {
            let last_index = parseInt("5");

        }
    </script>
@endpush

