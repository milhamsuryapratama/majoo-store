@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->product_name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/admin/products/'.$product->picture) }}" width="100%">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->product_name }}</h2>
            <hr>
            <h3>@currency($product->price)</h3>
            <p>{!! $product->description !!}</p>

            <form action="{{ URL::to('cart') }}" method="POST">
                @csrf
                <input type="number" size="4" id="qty" name="qty" value="1" min="1" step="1" class="form-control" />
                <input type="hidden" value="{{ $product->id }}" name="product_id"/> <br/> <br/>
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </form>
        </div>
    </div>
@endsection