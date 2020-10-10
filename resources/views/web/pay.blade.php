@extends('web.master')

@section('content')
    <div class="i-am-centered">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    Payment Form
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('orders/paid') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $payment->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $payment->user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" id="total" name="total" value="{{ $payment->total }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="file">Payment Proof</label>
                            <input type="file" class="form-control" id="file" name="file">
                            <small style="color: red">{{ $errors ? $errors->first('file') : '' }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection