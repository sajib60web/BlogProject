<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ setting()->app_name }} | @yield('title')</title>
    <link href="{{ asset(setting()->app_favicon) }}" rel="shortcut icon" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/AdminLTE.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/dist/css/skins/_all-skins.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="{{ asset('assets/admin') }}/css/toastr.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('styles')
    <style>
        .danger{
            color: red;
        }
        .amount::after {
            content: ".Tk";
            font-family: Arial, serif;
            text-align: right;
        }
        tbody td {
            font-weight: 500 !important;
        }

        span.badge.badge-success {
            background: green;
        }

        span.badge.badge-danger {
            background: red;
        }

        span.badge.badge-warning {
            background: #f39c12;
        }

        .danger {
            color: red;
        }

        .box {
            margin-bottom: 60px !important;
        }
        .buttons-html5 {
            background-color: #31B404 !important;
            color: #fff !important;
            font-weight: bold;
            font-size: 14px;
            border: 2px solid #ddd;
        }

        .buttons-print {
            background-color: #31B404 !important;
            color: #fff !important;
            font-weight: bold;
            font-size: 14px;
            border: 2px solid #ddd;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>{{ config('app.name') }}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth('admin')->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="img-circle" alt="User Image">
                                <p>
                                    {{ auth('admin')->user()->name }}
                                    <small>Admin</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" class="btn btn-default btn-flat">Logout</a>
                                </div>
                                <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('assets/admin') }}/dist/img/logo.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth('admin')->user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Request::is('admin')?'active':'' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-home"></i> <span>Dashboard</span>
                    </a>
                </li>

                @can('category-list')
                    <li class="{{ Request::is('admin/categories*')?'active':''}}">
                        <a href="{{ route('categories.index') }}">
                            <i class="fa fa-list"></i> <span>Category</span>
                        </a>
                    </li>
                @endcan

                @can('post-list')
                <li class="{{ Request::is('admin/post*')?'active':''}}">
                    <a href="{{ route('post.index') }}">
                        <i class="fa fa-list"></i> <span>Posts</span>
                    </a>
                </li>
                @endcan

                @can('faq-list')
                    <li class="{{ Request::is('admin/faqs*')?'active':''}}">
                        <a href="{{ route('faqs.index') }}">
                            <i class="fa fa-list"></i> <span>Faq</span>
                        </a>
                    </li>
                @endcan
                @can('page-list')
                    <li class="{{ Request::is('admin/pages*')?'active':''}}">
                        <a href="{{ route('pages.index') }}">
                            <i class="fa fa-list"></i> <span>Pages</span>
                        </a>
                    </li>
                @endcan

                @can('contact-message-list')
                    <li class="{{ Request::is('admin/contact_messages*')?'active':''}}">
                        <a href="{{ route('contact_messages.index') }}">
                            <i class="fa fa-list"></i> <span>Contact Message</span>
                        </a>
                    </li>
                @endcan
                @can('author-list')
                    <li class="{{ Request::is('admin/signup-user*') ?'active':''}}">
                        <a href="{{ route('signup.users.index') }}">
                            <i class="fa fa-list"></i> <span>Authors</span>
                        </a>
                    </li>
                @endcan
                @can('subscriber-list')
                    <li class="{{ Request::is('admin/subscribe*') ?'active':''}}">
                        <a href="{{ route('subscribe.list') }}">
                            <i class="fa fa-list"></i> <span>Subscribers</span>
                        </a>
                    </li>
                @endcan


                @if(auth('admin')->user()->can('user-list') || auth('admin')->user()->can('role-list'))
                <li class="treeview  {{ Request::is('admin/users') || Request::is('admin/users/*') ||   Request::is('admin/roles') || Request::is('admin/roles/*')?'active':'' }}">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>User Management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('user-list')
                                <li class="{{ Request::is('admin/users') || Request::is('admin/users/*')?'active':'' }}"><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> User Manage</a></li>
                            @endcan

                            @can('role-list')
                                <li class="{{ Request::is('admin/roles') || Request::is('admin/roles/*')?'active':'' }}"><a href="{{ route('roles.index') }}"><i class="fa fa-circle-o"></i> Role Manage</a></li>
                            @endcan
                        </ul>
                    </li>
                @endif

                @can('software-settings')
                <li class="{{ Request::is('admin/settings')?'active':''}}">
                    <a href="{{ route('settings') }}">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
                @endcan
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('main-content')
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-center">
        <strong>Developed by <a href="https://trickssoft.com" target="_blank">Tricks Soft</a></strong>
    </footer>
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('assets/admin') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('assets/admin') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin') }}/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/admin') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('assets/admin') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('assets/admin') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{ asset('assets/admin') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin') }}/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('assets/admin') }}/dist/js/pages/dashboard2.js"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin') }}/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="{{ asset('assets/admin') }}/bower_components/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/admin') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/toastr.min.js"></script>
<script src="{{ asset('assets/admin') }}/js/helper.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
        //Date picker
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        $('.summernote').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            minHeight: null,
            maxHeight: null,
            focus: true
        });
    });

    // print Div data
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        document.body.style.marginTop="0px";
        window.print();
        document.body.innerHTML = originalContents;
    }

    // input autocomplete off
    $(document).ready(function(){
        $(':input').focus(function(){
            $(this).attr('autocomplete', 'off');
        });
    });

    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script>
    $(function () {
        $('#example1').DataTable({
            'lengthMenu': [
                [10, 25, 50, 100, 250, 500, -1],
                [10, 25, 50, 100, 250, 500, "All"]
            ]
        });
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
@stack('scripts')
</body>
</html>

