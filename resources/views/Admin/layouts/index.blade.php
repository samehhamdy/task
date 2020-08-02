<!DOCTYPE html>
<html lang="en">

    @include('Admin.layouts.header')

    <body>

        <!-- Navigation Bar-->
        @include('Admin.layouts.navigation')
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="wrapper" >
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    @yield('link')
                                    <li class="breadcrumb-item active"><a href="/dashboard">Dashboard </a></li>
                                </ol>
                            </div>
                            @yield('title')
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('body')
            </div>
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        @include('Admin.layouts.footer')
        <!-- end Footer -->

        <!-- Right Sidebar -->
        @include('Admin.layouts.right-side')
        <!-- /Right-bar -->

        <!--Footer files-->
        @include('Admin.layouts.footer-files')
        <!--Footer files-->

    </body>
</html>
