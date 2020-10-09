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
        <div class="col-md-6">
            <img src="{{ asset('assets/admin/products/'.$product->picture) }}" width="100%">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->product_name }}</h2>
            <hr>
            <h3>Rp. {{ $product->price }}</h3>
            <p>{{ $product->description }}</p>

            <form method="POST">
                @csrf
                <input type="text" value="{{ $product->id }}"/> <br/> <br/>
                <button class="btn btn-primary">Buy Now</button>
            </form>
        </div>
    </div>
@endsection