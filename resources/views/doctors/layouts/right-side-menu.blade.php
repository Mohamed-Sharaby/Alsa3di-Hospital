<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Side menu -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('doctor.main')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
                        <span> الرئيسية </span> </a>
                </li>


                <li>
                    <a href="{{route('doctor.edit_user_account')}}" class="waves-effect"><i
                            class="zmdi zmdi-settings"></i> <span> تعديل بيانات الحساب </span> </a>
                </li>
                <li>
                    <a href="{{route('doctor.edit_doctor_account')}}" class="waves-effect"><i
                            class="zmdi zmdi-settings"></i> <span> تعديل بيانات الطبيب </span> </a>
                </li>

                <li>
                    <a href="{{route('doctor.appointments.index')}}" class="waves-effect"><i
                            class="zmdi zmdi-settings"></i> <span> مواعيد   الطبيب </span> </a>
                </li>

                <li>
                    <a href="{{route('doctor.reservations.index')}}" class="waves-effect"><i
                            class="zmdi zmdi-settings"></i> <span> حجوزات   الطبيب </span> </a>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
