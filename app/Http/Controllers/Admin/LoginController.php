<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->to('admin/products');
        }

        return view('admin/login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('admin/products');
//            dd('sukses');
        } else {
            return redirect()->back()->with(['error' => 'Login error, check your username anda password again']);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('admin/login');
    }
}
