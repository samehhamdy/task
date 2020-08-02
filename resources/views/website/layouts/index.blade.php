<!DOCTYPE html>
<html>
    @include('website.layouts.header')
    <body>
        @include('website.layouts.navbar')
        <div class="body_wrapper">
            @yield('content')
        </div>
        @include('website.layouts.footer')
    </body>
</html>

