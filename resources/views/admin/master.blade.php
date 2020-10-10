<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link href="{{ asset('assets/admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
          media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('assets/admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
          rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('assets/admin/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('assets/admin/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/admin/vendor/dataTables/datatables.min.css') }}" rel="stylesheet">
</head>
<body class="animsition">
<div class="page-wrapper">
    <aside class="menu-sidebar2">
        <div class="logo" style="background-color: white">
            <a href="#">
                <img src="https://majoo.id/assets/dist/img/majoo@2x.png" alt="Majoo Store" width="150"/>
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1">
            <div class="account2">
                <div class="image img-120">
                    @if(is_null(Auth::guard('admin')->user()->photo))
                        <img src="https://majoo.id/assets/dist/img/majoo@2x.png" alt="Majoo Store" width="150"/>
                    @else
                        <img src="{{ asset('assets/admin/photo/'.Auth::guard('admin')->user()->photo) }}" alt="Photo" width="150"/>
                    @endif
                </div>
                <h4 class="name">{{ Auth::guard('admin')->user()->name }}</h4>
                <a href="{{ URL::to('admin/logout') }}">Sign out</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li class="{{ Request::segment(2) == 'products' ? 'active': '' }}">
                        <a href="{{ route('products.index') }}">
                            <i class="fas fa-chart-bar"></i>Products</a>
                    </li>
                    <li class="{{ Request::segment(2) == 'transaction' ? 'active': '' }}">
                        <a href="{{ URL::to('admin/transaction') }}">
                            <i class="fas fa-chart-bar"></i>Transactions</a>
                    </li>
                    <li class="{{ Request::segment(2) == 'profile' ? 'active': '' }}">
                        <a href="{{ URL::to('admin/profile') }}">
                            <i class="fas fa-chart-bar"></i>Profile</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/logout') }}">
                            <i class="fas fa-shopping-basket"></i>Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="page-container2">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop2">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap2">
                        <div class="logo d-block d-lg-none">
                            <a href="#">
                                <img src="https://majoo.id/assets/dist/img/majoo@2x.png" alt="CoolAdmin"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
            <div class="logo">
                <a href="#">
                    <img src="https://majoo.id/assets/dist/img/majoo@2x.png" alt="Cool Admin"/>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar2">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/icon/avatar-big-01.jpg" alt="John Doe"/>
                    </div>
                    <h4 class="name">john doe</h4>
                    <a href="{{ URL::to('admin/logout') }}">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">
                                        <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="inbox.html">
                                <i class="fas fa-chart-bar"></i>Inbox</a>
                            <span class="inbox-num">3</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-shopping-basket"></i>eCommerce</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-trophy"></i>Features
                                <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="table.html">
                                        <i class="fas fa-table"></i>Tables</a>
                                </li>
                                <li>
                                    <a href="form.html">
                                        <i class="far fa-check-square"></i>Forms</a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fas fa-calendar-alt"></i>Calendar</a>
                                </li>
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>Maps</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements
                                <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="button.html">
                                        <i class="fab fa-flickr"></i>Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">
                                        <i class="fas fa-comment-alt"></i>Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">
                                        <i class="far fa-window-maximize"></i>Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">
                                        <i class="far fa-id-card"></i>Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">
                                        <i class="far fa-bell"></i>Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">
                                        <i class="fas fa-tasks"></i>Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">
                                        <i class="far fa-window-restore"></i>Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">
                                        <i class="fas fa-toggle-on"></i>Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">
                                        <i class="fas fa-th-large"></i>Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">
                                        <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                </li>
                                <li>
                                    <a href="typo.html">
                                        <i class="fas fa-font"></i>Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER DESKTOP-->

        @yield('content')

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                        href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END PAGE CONTAINER-->
    </div>
</div>
<!-- Jquery JS-->
<script src="{{ asset('assets/admin/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('assets/admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/select2/select2.min.js') }}">
</script>
<script src="{{ asset('assets/admin/vendor/vector-map/jquery.vmap.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/vector-map/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/vector-map/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/dataTables/datatables.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@stack('scripts')
</body>
</html>