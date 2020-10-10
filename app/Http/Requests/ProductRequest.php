<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::guard('admin')->check()) {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'price' => ['required', 'numeric'],
            'description' => ['required'],
            'stock' => ['required', 'numeric']
        ];

        if (request()->isMethod('PUT')) {
            $rule['product_name'] = ['required', 'min:10' ,'max:255'];
        } else {
            $rule['product_name'] = ['required', 'unique:products', 'min:10' ,'max:255'];
            $rule['picture'] = ['required', 'mimes:jpeg,jpg,png'];
        }

        return $rule;
    }
}
