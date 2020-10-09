@extends('web.master')

@section('content')
    <div class="row">
        @foreach($products as $p)
            <div class="col-md-3">
                <div class="product_item">
                    <div class="img">
                        <a href="{{ URL::to('product/'.$p->slug) }}">
                            <img src="{{ asset('assets/admin/products/'.$p->picture) }}" alt="{{ $p->product_name }}" style="width: 100%">
                        </a>
                        <p class="brand_name">
                            <a href="#">
                                {{ $p->product_name }}
                            </a>
                        </p>
                    </div>
                    <div class="size_color">
                        <div class="title">
                            {{ $p->description }}
                        </div>
                    </div>
                    <div class="price">
                        <p>{{ $p->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection