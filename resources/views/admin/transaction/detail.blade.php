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
                                    <li class="list-inline-item">Transactions</li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">MAJOO-{{ $detail->id }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @elseif(session('error'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Error</span>
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detail->details as $d)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/admin/products/'.$d->product->picture) }}"
                                                 width="100"/>
                                        </td>
                                        <td>{{ $d->product->product_name }}</td>
                                        <td>{{ $d->qty }}</td>
                                        <td>@currency($d->price)</td>
                                        <td>@currency($d->qty * $d->price)</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="text-right">Total</td>
                                    <td colspan="4" class="text-right">@currency($detail->total)</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <strong>Buyer Information</strong>
                            </div>
                            <div class="card-body card-block">
                                <input type="hidden" name="_token" value="2GnLAzjUjondv9R1vNOELgkg0OappvMVWaxJ1nok">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{ $detail->user->name }}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="price" class=" form-control-label">Province</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{ $detail->province }}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="stock" class=" form-control-label">City</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{ $detail->city }}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{ $detail->getAddress() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    @if($detail->payment_process != 'Y')
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Admin Actions</strong>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Action</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <form method="POST" action="{{ URL::to('admin/transaction/delivered/'.$detail->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Deliver ?</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection