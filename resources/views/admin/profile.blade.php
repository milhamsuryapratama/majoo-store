@extends('admin.master')

@section('content')
    <section class="au-breadcrumb m-t-75">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Profile</li>
                                </ul>
                            </div>
                            {{--                            <a href="{{ route('products.create') }}" class="au-btn au-btn-icon au-btn--green">--}}
                            {{--                                <i class="zmdi zmdi-plus"></i>add product--}}
                            {{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if(session('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @elseif(session('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Admin Data</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ URL::to('admin/profile/update_photo') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Name </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('name') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('email') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="photo" class=" form-control-label">Photo</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="photo" name="photo" class="form-control" required>
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('photo') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        {{--                                        <button type="reset" class="btn btn-danger btn-sm">--}}
                                        {{--                                            <i class="fa fa-ban"></i> Reset--}}
                                        {{--                                        </button>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Change Password</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ URL::to('admin/profile/update_password') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="old_password" class=" form-control-label">Old Password * </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="old_password" name="old_password" placeholder="Old Password" class="form-control" required>
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('old_password') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password" class=" form-control-label">New Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="password" placeholder="New Password" class="form-control" required>
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('password') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password_confirmation" class=" form-control-label">New Password Confirmation</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="New Password Confirmation" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        {{--                                        <button type="reset" class="btn btn-danger btn-sm">--}}
                                        {{--                                            <i class="fa fa-ban"></i> Reset--}}
                                        {{--                                        </button>--}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection