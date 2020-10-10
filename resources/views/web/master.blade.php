<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Document</title>
    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700|Trade+Winds&display=swap');

    *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
        font-family: 'Montserrat';
    }

    .product_wrap{
        display: flex;
        width: 950px;
        margin: 100px auto;
    }

    .product_item{
        width: 300px;
        background: #fff;
        margin-right: 20px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 0 2px rgba(0,0,0,0.125);
    }

    .product_item:last-child{
        margin-right: 0;
    }

    .product_item .img img{
        width: 200px;
        margin-bottom: 10px;
    }

    .product_item .size_color{
        margin: 25px 0;
    }

    .product_item .size_color .title{
        margin-bottom: 10px;
    }

    .product_item .size_wrap ul{
        display: flex;
        justify-content: center;
    }

    .product_item .size_wrap li{
        width: 35px;
        height: 35px;
        line-height: 35px;
        border-radius: 50%;
        border: 1px solid #7f8db0;
        margin: 5px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .product_item .size_wrap li span{
        font-size: 14px;
    }

    .product_item .size_wrap li:hover{
        background: #7f8db0;
        color: #fff;
    }

    .product_item .price{
        font-weight: 600;
        font-size: 20px;
    }

    .product_item .color_wrap ul{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 40px;
    }

    .product_item .color_wrap ul li{
        width: 22px;
        height: 22px;
        background: #000;
        margin: 5px;
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .product_item .color_wrap ul li.active{
        width: 30px;
        height: 30px;
    }


    .btn .bx {
        vertical-align: inherit;
        margin-top: -3px;
        font-size: 1.15rem;
    }

    .form-control {
        height: calc(2.5rem + 2px);
        padding: 0.5rem 1.5rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.3rem;
    }

    .btn {
        font-size: 1rem;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 0.25rem;
    }

    .bx.icon-single {
        font-size: 1.5rem;
    }

    .form-inline .form-control {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .form-inline .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    /* Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) {
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .form-inline .form-control {
            width: 210px;
        }
    }

    /* Large devices (desktops, 992px and up) */
    @media (min-width: 992px) {
        .form-inline .form-control {
            width: 440px;
        }
    }

    /* Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .form-inline .form-control {
            width: 600px;
        }
    }

    .sub-menu.navbar-light .navbar-nav .active > .nav-link,
    .sub-menu.navbar-light .navbar-nav .nav-link.active,
    .sub-menu.navbar-light .navbar-nav .nav-link.show,
    .sub-menu.navbar-light .navbar-nav .show > .nav-link {
        border-bottom: 3px solid #007bff;
        color: #007bff;
    }

    .navbar .navbar-toggler {
        border: none;
    }

    .navbar-light .navbar-toggler:focus {
        outline: none;
    }

    .navbar {
        padding: 1rem;
    }

    .main-menu {
        position: relative;
        z-index: 3;
    }

    .sub-menu {
        position: relative;
        z-index: 2;
        padding: 0 1rem;
    }

    /* Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) {
        .sub-menu {
            padding: 0 1rem;
        }

        .sub-menu.navbar-expand-md .navbar-nav .nav-link {
            padding: 1rem 1.5rem;
        }
    }

    .navbar.bg-light {
        background: #fff !important;
        box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .user-dropdown .nav-link {
        padding: 0.15rem 0;
    }

    #sidebar {
        background: #fff;
        height: 100%;
        left: -100%;
        top: 0;
        bottom: 0;
        overflow: auto;
        position: fixed;
        transition: 0.4s ease-in-out;
        width: 84%;
        z-index: 5001;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
        padding: 1.25rem 1rem 1rem;
    }

    #sidebar.active {
        left: 0;
    }

    #sidebar .sidebar-header {
        background: #fff;
        border-bottom: 1px solid #e4e4e4;
        padding-bottom: 1.5rem;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #e4e4e4;
        margin-bottom: 40px;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px 16px;
        font-size: 1.1em;
        display: block;
        color: #000;
    }

    #sidebar ul li a:hover {
        color: #7386d5;
        background: #fff;
    }

    #sidebar ul li.active > a,
    #sidebar a[aria-expanded="true"] {
        color: #007bff;
        background: #e6f2ff;
        border-radius: 6px;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    #sidebar .links .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    section {
        padding: 6rem;
        /*background: #e4e4e4;*/
        margin-bottom: 30px;
        position: relative;
        z-index: 1;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.7);
        height: 100vh;
        left: 0;
        position: fixed;
        top: 0;
        -webkit-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        z-index: -1;
        width: 100%;
        opacity: 0;
    }

    .overlay.visible {
        opacity: 1;
        z-index: 5000;
    }

    /* .mobiHeader .menuActive~.overlay {
        opacity: 1;
        width: 100%;
    } */

    ul.social-icons {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    ul.social-icons li {
        display: inline-block;
        margin-right: 0px;
        margin-bottom: 0;
    }

    #sidebar ul.social-icons li a {
        font-size: 24px;
    }

    .utility-nav {
        background: #e4e4e4;
        padding: 0.5rem 1rem;
    }

    .utility-nav p {
        margin-bottom: 0;
    }

    .search-bar {
        position: relative;
        z-index: 2;
        box-shadow: 0px 2px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .search-bar .form-control {
        width: calc(100% - 45px);
    }

    .avatar {
        border-radius: 50%;
        width: 4.5rem;
        height: 4.5rem;
        margin-right: 8px;
    }

    .avatar.avatar-xs {
        width: 2.25rem;
        height: 2.25rem;
    }

    .user-dropdown .dropdown-menu {
        left: auto;
        right: 0;
    }

</style>
<body>

<div class="overlay"></div>

<div class="utility-nav d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="small"><i class="bx bx-envelope"></i> logo@example.com | <i class="bx bx-phone"></i> +91-9876543210
                </p>
            </div>

            <div class="col-12 col-md-6 text-right">
                <p class="small">Free shipping on total of $99 of all products</p>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none">
    <div class="container">

        <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
            <i class="bx bx-menu icon-single"></i>
        </button>

        <a class="navbar-brand" href="{{ URL::to('/') }}">
            <img src="https://majoo.id/assets/dist/img/majoo@2x.png" width="150"/>
{{--            <h4 class="font-weight-bold">Logo</h4>--}}
        </a>

        <ul class="navbar-nav ml-auto d-block d-md-none">
            <li class="nav-item">
                <a class="btn btn-link" href="#"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger">3</span></a>
            </li>
        </ul>

        <div class="collapse navbar-collapse">
            <form class="form-inline my-2 my-lg-0 mx-auto">
                <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
{{--                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>--}}
            </form>

            <ul class="navbar-nav">
{{--                <li class="nav-item">--}}
{{--                    <a class="btn btn-link" href="#"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger">3</span></a>--}}
{{--                </li>--}}
                <li class="nav-item ml-md-3">
                    @if(Auth::check())
                        <a class="btn btn-sm" href="#"><i class="bx bxs-user-circle mr-1"></i> Halo {{ Auth::user()->name }}</a>
                        <a class="btn btn-sm" href="{{ route('logout') }}"><i class="bx bxs-user-circle mr-1"></i> Logout</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}"><i class="bx bxs-user-circle mr-1"></i> Log In / Register</a>
                    @endif
                </li>
            </ul>
        </div>

    </div>
</nav>

<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ Request::segment(1) == '' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::segment(1)  == 'product' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('product') }}">Products</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'cart' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('cart') }}">Cart</a>
                </li>
                <li class="nav-item {{ Request::segment(1) == 'orders' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('orders') }}">Orders</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="search-bar d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form-inline mb-3 mx-auto">
                    <input class="form-control" type="search" placeholder="Search for products..." aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="bx bx-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10 pl-0">
                    <a class="btn btn-primary" href="#"><i class="bx bxs-user-circle mr-1"></i> Log In</a>
                </div>

                <div class="col-2 text-left">
                    <button type="button" id="sidebarCollapseX" class="btn btn-link">
                        <i class="bx bx-x icon-single"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <ul class="list-unstyled components links">
        <li class="active">
            <a href="#"><i class="bx bx-home mr-3"></i> Home</a>
        </li>
        <li>
            <a href="#"><i class="bx bx-carousel mr-3"></i> Products</a>
        </li>
        <li>
            <a href="#"><i class="bx bx-book-open mr-3"></i> Schools</a>
        </li>
        <li>
            <a href="#"><i class="bx bx-crown mr-3"></i> Publishers</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="bx bx-help-circle mr-3"></i>
                Support</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Delivery Information</a>
                </li>
                <li>
                    <a href="#">Privacy Policy</a>
                </li>
                <li>
                    <a href="#">Terms & Conditions</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="bx bx-phone mr-3"></i> Contact</a>
        </li>
    </ul>

    <h6 class="text-uppercase mb-1">Categories</h6>
    <ul class="list-unstyled components mb-3">
        <li>
            <a href="#">Category 1</a>
        </li>
        <li>
            <a href="#">Category 1</a>
        </li>
        <li>
            <a href="#">Category 1</a>
        </li>
        <li>
            <a href="#">Category 1</a>
        </li>
        <li>
            <a href="#">Category 1</a>
        </li>
        <li>
            <a href="#">Category 1</a>
        </li>
    </ul>

    <ul class="social-icons">
        <li><a href="#" target="_blank" title=""><i class="bx bxl-facebook-square"></i></a></li>
        <li><a href="#" target="_blank" title=""><i class="bx bxl-twitter"></i></a></li>
        <li><a href="#" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li>
        <li><a href="#" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
    </ul>

</nav>
<br>
<div class="container">
    @yield('content')
</div>

{{--<div class="utility-nav d-none d-md-block" style="position: absolute;--}}
{{--  right: 0;--}}
{{--  bottom: 0;--}}
{{--  left: 0;--}}
{{--  padding: 1rem;--}}
{{--  background-color: #efefef;--}}
{{--  text-align: center;">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12 col-md-12 text-center">--}}
{{--                <p class="small"><i class="bx bx-envelope"></i> Majoo Store--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Jquery JS-->
<script src="{{ asset('assets/admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>