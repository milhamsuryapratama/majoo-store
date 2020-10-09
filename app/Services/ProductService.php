<?php


namespace App\Services;


use App\Models\Product;
use App\Repositories\ProductRepository;
use File;

class ProductService
{
    public static function validatePicture($data, $id = null)
    {
        $product = Product::find($id);
        if ($data->hasFile('picture')) {

            $picture = $data['picture'];

            $name = uniqid() . '_' . trim($picture->getClientOriginalName());

            $picture->move("assets/admin/products",$picture->getClientOriginalName());

            if (request()->method() == 'PUT') {
                File::delete('assets/photo/' . $product->picture);
                return ProductRepository::update($data, $id, $name);
            } else {
                return ProductRepository::store($data, $name);
            }
        }

        return ProductRepository::update($data, $id, $product->picture);
    }
}