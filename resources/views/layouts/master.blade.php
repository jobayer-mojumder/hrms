<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>HRMS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('public/admin_css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/bootstrap/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/paging.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin_css/plugins/iCheck/all.css') }}">
    <link href="{{ asset('public/admin_css/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('public/admin_css/style.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('public/admin_css/plugins/datatables/3/dataTables.bootstrap.css') }}" rel="stylesheet"
          type="text/css">

    <script type="text/javascript" src="{{ asset('public/ckeditor/ckeditor.js') }}"></script>

    <script language="JavaScript">
        function status(location) {
            if (confirm("Are you sure to Change status for this entry?") == 1)
                document.location = location;
        }

        function hstatus(location) {
            if (confirm("Are you sure to Change Home status for this entry?") == 1)
                document.location = location;
        }

        function del(location) {
            if (confirm("Are you sure to delete the entry?") == 1)
                document.location = location;
        }
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <a href="{{ route('admin') }}" class="logo">
            <span class="logo-mini"></span>
            <span class="logo-lg"><b><font style="text-transform:uppercase; color:#005BAA">HRMS</font></b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            @if( Auth::user()->image)
                                <img src="{{ asset(Auth::user()->image_path.Auth::user()->image) }}" class="user-image"
                                     alt="User Image">
                            @else
                                <img src="{{ asset('public/admin_css/dist/img/avatar5.png') }}" class="user-image"
                                     alt="User Image">
                            @endif

                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                @if( Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image_path.Auth::user()->image) }}"
                                         class="img-circle" alt="User Image"> @else
                                    <img src="{{ asset('public/admin_css/dist/img/avatar5.png') }}" class="img-circle"
                                         alt="User Image"> @endif
                                <p>{{ Auth::user()->name }} </p>
                                <p style="font-size: 14px;">Authentication Level: {{ ucfirst(Auth::user()->group) }}</p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-5 text-left">
                                        <a class=topmenu href="">Change Pass</a>
                                    </div>
                                    <div class="col-xs-7 text-left">
                                        <a class=topmenu href="">IP authenticate List</a>
                                    </div>
                                </div>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a class="btn btn-default btn-flat" href="{{ route('userlist') }}">Users List</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
                                        Sign Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <li class="header"> CONTROL PANEL</li>

                <li class="treeview @if (Request::segment(1)=='employee') {{ 'active' }} @endif "><a href="#"><i
                                class="fa fa-address-book-o text-blue"></i> <span>Employee</span> <span
                                class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i></span></a>

                    <ul class="treeview-menu">
                        <li class=""><a href="{{ route('employee') }}"><i class="fa fa-angle-right text-blue"
                                                                          style="width:5px"></i> Employees</a></li>

                        <li class=""><a href="{{ route('department') }}"><i class="fa fa-angle-right text-blue"
                                                                            style="width:5px"></i> Departments</a></li>

                        <li class=""><a href="{{ route('designation') }}"><i class="fa fa-angle-right text-blue"
                                                                             style="width:5px"></i> Designations</a>
                        </li>
                    </ul>
                </li>

            </ul>

        </section>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <a href="">Anything you want</a>
        </div>
        <strong>Copyright &copy; 2018 <a href="#"> HRMS</a>.</strong> All rights reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<script src="{{ asset('public/admin_css/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('public/admin_css/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin_css/dist/js/app.min.js') }}"></script>
<script src="{{ asset('public/admin_css/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('public/admin_css/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('public/admin_css/plugins/datatables/3/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin_css/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('public/admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
@yield('scripts')
</body>


<script>
    $(document).ready(function () {

        $('.date')
            .datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                showTodayButton: true,
                autoclose: true,
                clearBtn: true,
                showClose: true,
            })

        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        })

    });
</script>

</html>