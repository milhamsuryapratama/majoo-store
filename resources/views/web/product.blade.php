@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::to('product') }}">Product</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <br/>
    <div class="row">
        @foreach($products as $p)
            <div class="col-md-3">
                <div class="product_item">
                    <div class="img">
                        <a href="{{ URL::to('product/'.$p->slug) }}">
                            <img src="{{ asset('assets/admin/products/'.$p->picture) }}" alt="{{ $p->product_name }}" style="width: 100%">
                        </a>
                        <p class="brand_name">
                            <a href="{{ URL::to('product/'.$p->slug) }}">
                                {{ $p->product_name }}
                            </a>
                        </p>
                    </div>
                    <div class="size_color">
                        <div class="title">
                            {!! substr($p->description, 0, 50) !!} ...
                        </div>
                    </div>
                    <div class="price">
                        <p>@currency($p->price)</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection