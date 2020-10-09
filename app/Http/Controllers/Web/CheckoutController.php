<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Repositories\CartRepository;
use App\Repositories\CartRespository;
use App\Repositories\CheckoutRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::whereUserId(Auth::id())->get();
        $data['total'] = CartRepository::getTotal();
        return view('web.checkout', $data);
    }

    public function store(CheckoutRequest $checkoutRequest)
    {
        $checkoutRequest->validated();

        $total = CartRepository::getTotal();
        $cart = Cart::whereUserId(Auth::id())->get();
        $transaction = CheckoutRepository::store($checkoutRequest, $total, $cart);

        dd($transaction);
//        return redirect()->to('orders');
    }
}
