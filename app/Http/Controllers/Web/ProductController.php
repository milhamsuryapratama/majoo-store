<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['title'] = "Products";
        $data['products'] = Product::orderBy('created_at', 'DESC')->get();
        return view('web.product', $data);
    }

    public function detail($slug)
    {
        $data['title'] = "Products";
        $data['product'] = Product::whereSlug($slug)->first();
        return view('web/product_detail', $data);
    }
}
