<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
{{--    <title>Online Library Management System | </title>--}}
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<!------MENU SECTION START-->
<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin-dashboard')}}">
                <img src="{{asset('assets/img/logo.png')}}" />
            </a>

        </div>

        <div class="right-div">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a href="route('logout')" class="btn btn-danger pull-right" onclick="event.preventDefault();
                                                this.closest('form').submit();" >LOG ME OUT</a>
            </form>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="{{route('admin-dashboard')}}" class="menu-top-active">DASHBOARD</a></li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-add-category')}}">Add Category</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-category')}}">Manage Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Authors <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-add-author')}}">Add Author</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-author')}}">Manage Authors</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-add-books')}}">Add Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-books')}}">Manage Books</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-add-issueBooks')}}">Issue New Book</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin-issueBooks')}}">Manage Issued Books</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('admin-student')}}">Reg Students</a></li>

                        <li><a href="{{route('admin-change-password')}}">Change Password</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
    <!-- MENU SECTION END-->
<div class="content-wrapper">
    {{ $slot }}
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; 2024 Online Library Management System |<a href="#" target="_blank"  > Designed by : Murad</a>
            </div>

        </div>
    </div>
</section>
    <!-- FOOTER SECTION END-->
<script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<!-- DATATABLE SCRIPTS  -->
<script src="{{asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>
