@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Orders</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12 table-responsive">
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @forelse($order->details as $o)
                    <tr>
                        <td>
                            <img src="{{ asset('assets/admin/products/'.$o->product->picture) }}" width="100"/>
                        </td>
                        <td>{{ $o->product->product_name }}</td>
                        <td>{{ $o->qty }}</td>
                        <td>@currency($o->price)</td>
                        <td>@currency($o->qty * $o->price)</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No data</td>
                    </tr>
                @endforelse
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <td>{{ $order->total }}</td>
                </tr>
                @if($order->payment_process != 'Y')
                    <tr>
                        <th colspan="4" class="text-right"></th>
                        <td class="text-truncate">
                            <a href="{{ URL::to('orders/pay?id='.$order->id) }}">Pay Now ?</a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection