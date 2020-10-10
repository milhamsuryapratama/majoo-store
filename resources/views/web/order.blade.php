@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::to('orders') }}">Orders</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">ID</th>
                    <th scope="col">Total</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($orders as $o)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>MAJOO-{{ $o->id }}</td>
                            <td>@currency($o->total)</td>
                            <td>{{ $o->created_at }}</td>
                            <td>
                                <a href="{{ URL::to('orders/data/'.$o->id) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td class="actions text-center" colspan="6">
                            {{ $orders->links() }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection