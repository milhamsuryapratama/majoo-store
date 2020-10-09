<?php


namespace App\Services;


use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public static function validatePicture($data, $id = null)
    {
        if ($data->hasFile('picture')) {

            $picture = $data['picture'];

            $name = uniqid() . '_' . trim($picture->getClientOriginalName());

            $picture->move("assets/admin/products",$picture->getClientOriginalName());

            return ProductRepository::store($data, $name);
        }
    }
}