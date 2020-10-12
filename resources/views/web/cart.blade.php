@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::to('cart') }}">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-9">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($carts as $c)
                    <tr>
                        <th scope="row">
                            <img src="{{ asset('assets/admin/products/'.$c->product->picture) }}" width="100">
                        </th>
                        <td scope="row">{{ $c->product->product_name }}</td>
                        <td>@currency($c->product->price)</td>
                        <td>
                            <input type="button" class="minus btn" data-id="{{ $c->product->id }}" value="-">
                            <input type="text" name="qty" value="{{ $c->qty }}" min="1" step="1" size="4" class="form-control qty" data-id="{{ $c->product->id }}" />
                            <input type="button" class="plus btn" data-id="{{ $c->product->id }}" value="+">
                            <small class="out" style="color: red;"></small>
                        </td>
                        <td scope="row" class="subtotal">
                            @currency($c->qty * $c->product->price)
                        </td>
                        <td scope="row">
                            <a href="{{ URL::to('cart/delete/'.$c->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Remove</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row" colspan="6">No Data</th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Total</th>
                </tr>
                <tr>
                    <td class="total">@currency($total[0]['total'])</td>
                </tr>
                <tr>
                    <td>
                        <form method="POST" action="{{ URL::to('checkout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary" id="checkout">Checkout</button>
                        </form>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var base_url = '{{ URL::to('/') }}';
    </script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endpush