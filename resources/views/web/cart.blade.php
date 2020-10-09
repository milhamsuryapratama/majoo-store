@extends('web.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Cart</a></li>
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
                        <td>Rp. {{ $c->product->price }}</td>
                        <td>
                            <input type="button" class="minus" data-id="{{ $c->product->id }}" value="-">
                            <input type="text" name="qty" value="{{ $c->qty }}" min="1" step="1" size="4" class="form-control qty" />
                            <input type="button" class="plus" data-id="{{ $c->product->id }}" value="+">
                            <small class="out" style="color: red;"></small>
                        </td>
                        <td scope="row" class="subtotal">
                            Rp. {{ $c->qty * $c->product->price }}
                        </td>
                        <td scope="row">
                            <a href="{{ URL::to('cart/delete/'.$c->id) }}" class="btn btn-danger">Remove</a>
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
                    <td class="total">Rp. {{ $total[0]['total'] }}</td>
                </tr>
                <tr>
                    <td>
                        <form method="POST" action="{{ URL::to('checkout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">Checkout</button>
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
        $(function () {
            $(".plus").click(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                // alert(id)
                changeQty(id, 'plus', row);
            });

            $(".minus").click(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                changeQty(id, 'minus', row);
            });

            $(".qty").keyup(function () {
                let row = $(this).closest('tr');
                let id = $(this).data('id');

                changeQty(id, null, row, $(this).val());
            });

            $(".qty").keypress(function (event) {
                if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
                    event.preventDefault();
                }
            });
        });

        function changeQty(product_id, action, row, val = null) {
            if (val != '') {
                $.ajax({
                    url: '{{ URL::to('cart/change_qty') }}',
                    type: 'POST',
                    data: {
                        'product_id': product_id,
                        'action': action,
                        'val': val
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response, statusText, xhr) {
                        console.log(response)
                        if (response != 'Out of stock !') {
                            row.find('.qty').val(response.data.qty);
                            $(".total").html('Rp.' + rupiah(response.data.total[0].total));
                            row.find('.subtotal').html('Rp.' + rupiah(response.data.subtotal));
                            row.find('.out').html(response);
                            $("#checkout").prop('disabled',false);
                        } else {
                            $("#checkout").prop('disabled',true);
                            row.find('.out').html(response);
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            }
        }

        function rupiah(angka){
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    </script>
@endpush