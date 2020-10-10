<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaidRequest;
use App\Models\Transaction;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Transaction::orderBy('created_at', 'DESC')->whereUserId(Auth::id())->paginate(3);
        return view('web.order', $data);
    }

    public function detail($id)
    {
        $data['order'] = Transaction::with(['details', 'details.product'])->findOrFail($id);
        return view('web.order_detail', $data);
    }

    public function pay(Request $request)
    {
        $id = $request->query('id');
        $data['payment'] = Transaction::findOrFail($id);
        return view('web.pay', $data);
    }

    public function paid(PaidRequest $paidRequest)
    {
        $paidRequest->validated();

        OrderRepository::saveFile($paidRequest);
        return redirect()->to('orders/data/'.$paidRequest->id)->with('success', 'Congratulations, your payment has been received');
    }
}
