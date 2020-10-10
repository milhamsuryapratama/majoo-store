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
                                    <li class="list-inline-item">Add Products</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Product Form</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Product Name *</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="product_name" name="product_name" placeholder="Product Name" class="form-control" value="{{ old('product_name') }}">
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('product_name') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="price" class=" form-control-label">Price *</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="price" name="price" placeholder="Price" class="form-control" value="{{ old('price') }}">
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('price') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="stock" class=" form-control-label">Stock *</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="stock" name="stock" placeholder="Stock" class="form-control" value="{{ old('stock') }}">
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('stock') : '' }}</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="description" class=" form-control-label">Description *</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="description" id="description" rows="9" placeholder="Description . . ." class="form-control">
                                                {{ old('description') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Product Picture *</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="picture" name="picture" class="form-control-file">
                                            <small class="form-text text-muted" style="color: red">{{ $errors ? $errors->first('picture') : '' }}</small>
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
@push('scripts')
    <script>
        $(function () {
            tinymce.init({
                selector: '#description'
            });
        });
    </script>
@endpush