<!-- Top Bar Start -->
<div class="topbar">
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default mb-2" role="navigation" style="background-color: #426e96!important;color: white!important;">
        <div class="container">

            <!-- Page title -->
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <button class="button-menu-mobile open-left" style="color: white!important;">
                        <i class="zmdi zmdi-menu"></i>
                    </button>
                </li>
                <li>
                    <h4 class="page-title" style="color: white!important;">   لوحة تحكم الطبيب - {{auth()->user()->name}}  </h4>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="  ">
                    <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('admin/assets/images/user.jpg')}}" height="30px" width="30px"   alt="user-img" class="img-circle user-img img-thumbnail">

                    </a>

                    <ul class="dropdown-menu dropdown-menu-left">


                        <li><a href="{{ route('doctor.logout') }}"
                               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power m-r-5"></i> تسجيل الخروج</a>
                            <form id="logout-form" action="{{ route('doctor.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form></li>
                    </ul>
                </li>
            </ul>

        </div><!-- end container -->
    </div><!-- end navbar -->
</div>
<!-- Top Bar End -->
