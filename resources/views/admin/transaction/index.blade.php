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

    <section class="statistic">
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
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-earning" id="table-transaction">
                                <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>ID</th>
                                    <th>Buyer</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $t)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>MAJOO-{{ $t->id }}</td>
                                            <td>{{ $t->user->name }}</td>
                                            <td>@currency($t->total)</td>
                                            <td>{{ $t->created_at }}</td>
                                            <td>
                                                <a href="{{ URL::to('admin/transaction/data/'.$t->id) }}" class="btn btn-primary">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(function () {
            $("#table-transaction").DataTable();
        });
    </script>
@endpush