<header id="topnav">

    <!-- Topbar Start -->
    @include('Admin.layouts.navbar')
    <!-- end Topbar -->

    <div class="topbar-menu">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{'/dashboard'}}"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                    </li>

                    <li class="has-submenu">
                        <a> <i class="mdi mdi-account"></i>User Interface  <div class="arrow-down"></div></a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <a href="{{route('users.index')}}">Users</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.create')}}">New User</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a> <i class="mdi mdi-alert"></i>Role Interface  <div class="arrow-down"></div></a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <a href="{{route('roles.index')}}">Roles</a>
                                    </li>
                                    <li>
                                        <a href="{{route('roles.create')}}">New Role</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a> <i class="mdi mdi-adobe"></i>Album Interface  <div class="arrow-down"></div></a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li>
                                        <a href="{{url('dashboard/albums')}}">Albums</a>
                                    </li>
                                    <li>
                                        <a href="{{route('albums.create')}}">New Album</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- End navigation menu -->

                <div class="clearfix"></div>
            </div>
            <!-- end #navigation -->
        </div>
        <!-- end container -->
    </div>

{{--    <!-- start navbar-custom -->--}}
{{--    @include('layouts.navbar-custom')--}}
{{--    <!-- end navbar-custom -->--}}

</header>
