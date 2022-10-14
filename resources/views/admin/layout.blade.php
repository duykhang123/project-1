<html lang="en" class="" style="height: auto;">
    <head>
        @include('admin.component.head')
    </head>
    <body class="sidebar-mini control-sidebar-slide-open" style="height: auto;">
        <div class="wrapper">
            <!-- Navbar -->
            @include('admin.component.main-header')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('admin.component.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 244.75px;">
                <!-- Content Header (Page header) -->
                @yield('content')
            </div>
            @include('admin.component.footer')
            <div id="sidebar-overlay"></div>
        </div>
        @include('admin.component.script')
    </body>
</html>
