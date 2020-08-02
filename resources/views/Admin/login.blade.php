<!DOCTYPE html>
<html lang="en">

@include('Admin.layouts.header')

<body class="authentication-bg">
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="account-pages mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mb-4">
                                        <h4 class="text-uppercase mt-0">Sign In</h4>
                                    </div>
                                    @include('partial.alert')
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                        </div>

                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                        </div>

                                    </form>

                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
        </div>
    </div>
</body>
<!-- end wrapper -->


<!--Footer files-->
@include('Admin.layouts.footer-files')
<!--Footer files-->

</body>
</html>
