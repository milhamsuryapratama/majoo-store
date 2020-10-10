@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Checkout</a></li>
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
                        <td>{{ $c->qty }}</td>
                        <td scope="row" class="subtotal">
                            @currency($c->qty * $c->product->price)
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row" colspan="6">No Data</th>
                    </tr>
                @endforelse
                <tr>
                    <th scope="col" colspan="5" class="text-right">Total</th>
                </tr>
                <tr>
                    <td class="total text-right" colspan="5">@currency($total[0]['total'])</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Shipping Form</th>
                </tr>
                <tr>
                    <td>
                        <form method="POST" action="{{ URL::to('checkout/store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name" name="name" value="{{ Auth::user()->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" name="province" id="province" placeholder="Your Province" required/>
                                <small style="color: red">{{ $errors ? $errors->first('province') : '' }}</small>
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="Your City" required/>
                                <small style="color: red">{{ $errors ? $errors->first('city') : '' }}</small>
                            </div>
                            <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode" required/>
                                <small style="color: red">{{ $errors ? $errors->first('postcode') : '' }}</small>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" required></textarea>
                                <small style="color: red">{{ $errors ? $errors->first('address') : '' }}</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection