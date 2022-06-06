<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Side menu -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{route('admin.main')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i>
                        <span> الرئيسية </span> </a>
                </li>


                {{--                <li class="has_sub">--}}
                {{--                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tasks"></i>--}}
                {{--                        <span> الادارة </span> <span class="menu-arrow"></span></a>--}}
                {{--                    <ul class="list-unstyled">--}}
                {{--                        <li><a href="{{route('admin.admins.index')}}"> الادارة</a></li>--}}

                {{--                    </ul>--}}
                {{--                </li>--}}

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-settings-square"></i>
                        <span> النظام   </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        @can('Roles')
                            <li>
                                <a href="{{route('admin.roles.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الصلاحيات والمناصب </span> </a>
                            </li>
                        @endcan

                        @can('Admins')
                            <li>
                                <a href="{{route('admin.admins.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الادارة </span> </a>
                            </li>
                            <li>
                                <a href="{{route('admin.notifications.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-notifications"></i> <span> اشعارات العملاء </span> </a>
                            </li>
                        @endcan

                        @can('Users')
                            <li>
                                <a href="{{route('admin.users.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> المرضى </span> </a>
                            </li>
                        @endcan

                        @can('Admins')
                            <li>
                                <a href="{{route('admin.areas.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> المناطق   </span> </a>
                            </li>

                            <li>
                                <a href="{{route('admin.cities.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> المدن </span> </a>
                            </li>
                        @endcan


                        @can('Branches')
                            <li>
                                <a href="{{route('admin.branches.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الفروع </span> </a>
                            </li>
                        @endcan

                        @can('Specializations')
                            <li>
                                <a href="{{route('admin.specializations.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> التخصصات </span> </a>
                            </li>
                        @endcan

                        @can('Services')
                            <li>
                                <a href="{{route('admin.services.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الخدمات </span> </a>
                            </li>
                        @endcan

                        @can('Doctors')
                            <li>
                                <a href="{{route('admin.doctors.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الاطباء </span> </a>
                            </li>
                        @endcan

                        @can('Sliders')
                            <li>
                                <a href="{{route('admin.sliders.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> السلايدر </span> </a>
                            </li>
                        @endcan

                        @can('Contacts')
                            <li>
                                <a href="{{route('admin.contacts.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> رسائل الزوار </span> </a>
                            </li>
                        @endcan

                        @can('News')
                            <li>
                                <a href="{{route('admin.news.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> الاخبار</span> </a>
                            </li>
                        @endcan

                        @can('Settings')
                            <li>
                                <a href="{{route('admin.subscribes.index')}}" class="waves-effect"><i
                                        class="zmdi zmdi-settings"></i> <span> اشتركات البريد الالكترونى</span> </a>
                            </li>

                        @endcan
                    </ul>
                </li>


                @can('Reservations')
                    <li>
                        <a href="{{route('admin.reservations.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-settings"></i> <span> الحجوزات </span> </a>
                    </li>
                @endcan


                @canany(['Categories','Products','Coupons','Carts','Offers'])
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-shopping-cart"></i>
                            <span> المتجر الالكترونى </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            @can('Categories')
                                <li>
                                    <a href="{{route('admin.categories.index')}}">
                                        <i class="fa fa-users"></i>
                                        الاقسام الرئيسية</a>
                                </li>

                                <li>
                                    <a href="{{route('admin.sub-categories.index')}}">
                                        <i class="zmdi zmdi-grid"></i> الاقسام الفرعية </a>
                                </li>
                            @endcan

                            @can('Products')
                                <li>
                                    <a href="{{route('admin.products.index')}}">
                                        <i class="zmdi zmdi-grid"></i> المنتجات </a>
                                </li>
                            @endcan

                            @can('Coupons')
                                <li>
                                    <a href="{{route('admin.coupons.index')}}">
                                        <i class="zmdi zmdi-grid"></i> كوبونات الخصم </a>
                                </li>
                            @endcan

                            @can('Carts')
                                <li>
                                    <a href="{{route('admin.carts.index')}}">
                                        <i class="zmdi zmdi-grid"></i> الطلبات </a>
                                </li>
                            @endcan

                            @can('Offers')
                                <li>
                                    <a href="{{route('admin.offers.index')}}">
                                        <i class="zmdi zmdi-grid"></i> العروض </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan


                @can('Settings')
                    <li>
                        <a href="{{route('admin.abouts.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-settings"></i> <span> من نحن </span> </a>
                    </li>

                    <li>
                        <a href="{{route('admin.settings.index')}}" class="waves-effect"><i
                                class="zmdi zmdi-settings"></i> <span> الاعدادات </span> </a>
                    </li>
                @endcan

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
