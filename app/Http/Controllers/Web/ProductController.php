<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all();
        return view('web.product', $data);
    }

    public function detail($slug)
    {
        $data['product'] = Product::whereSlug($slug)->first();
        return view('web/product_detail', $data);
    }
}
