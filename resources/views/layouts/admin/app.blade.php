<!doctype html>
<html lang="en">

@include('layouts.admin.meta')

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.admin.menu')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.admin.header')
            <!--  Header End -->

            <!--  Footer Start -->
            <div class="container-fluid">
                @yield('content')
                @include('layouts.admin.footer')
            </div>
            <!--  Footer End -->
        </div>
    </div>
    @include('layouts.admin.script')
</body>

</html>
