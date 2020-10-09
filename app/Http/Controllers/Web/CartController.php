<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Repositories\CartRepository;
use App\Repositories\CartRespository;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::with('product')->get();
        $data['total'] = CartRepository::getTotal();
        return view('web.cart', $data);
    }

    public function store(Request $request)
    {
        try {
            CartService::cekStock($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        return redirect()->to('cart');
    }

    public function delete($id)
    {
        $cart = Cart::findOrFail($id);
        if ($cart->delete()) {
            return redirect()->back()->with(['success' => 'Delete cart successfully']);
        }

        return redirect()->back()->with(['error' => 'Failed to delete cart']);
    }

    public function change_qty(Request $request)
    {
        try {
            if ($request->ajax()) {
                return CartService::changeQty($request->all());
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
