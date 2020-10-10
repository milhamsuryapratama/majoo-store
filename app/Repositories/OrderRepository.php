<?php


namespace App\Repositories;


use App\Models\Transaction;

class OrderRepository
{
    public static function saveFile($data)
    {
        if ($data->hasFile('file')) {
            $file = $data['file'];

//            $name = uniqid() . '_' . trim($file->getClientOriginalName());

//            $img = ImageResize::make($file->path());

//            $img->resize(195, 243)->save('assets/order_confirm/'.$name);
            $file->move("assets/admin/payment/",$file->getClientOriginalName());
            return Transaction::find($data['id'])->update([
                'file' => $file->getClientOriginalName(),
                'payment_process' => 'Y'
            ]);
        }
    }
}