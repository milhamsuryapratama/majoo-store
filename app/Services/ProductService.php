<?php


namespace App\Services;


use App\Models\Product;
use App\Repositories\ProductRepository;
use File;
use ImageResize;

class ProductService
{
    public static function validatePicture($data, $id = null)
    {
        $product = Product::find($id);
        if ($data->hasFile('picture')) {

            $picture = $data['picture'];

            $name = uniqid() . '_' . trim($picture->getClientOriginalName());

            $img = ImageResize::make($picture->path());

            $img->resize(296, 180)->save('assets/admin/products/'.$name);

//            $picture->move("assets/admin/products",$picture->getClientOriginalName());

            if (request()->method() == 'PUT') {
                File::delete('assets/admin/products/' . $product->picture);
                return ProductRepository::update($data, $id, $name);
            } else {
                return ProductRepository::store($data, $name);
            }
        }

        return ProductRepository::update($data, $id, $product->picture);
    }
}