<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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
</head>
<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="https://majoo.id/assets/dist/img/majoo@2x.png" alt="Majoo Store">
                        </a>
                    </div>
                    <div class="login-form">
                        @if(session('success'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ URL::to('admin/login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
</body>
</html>