<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    protected $table = 'transaction_details';
    protected $fillable = [
        'transaction_id',
        'product_id',
        'qty',
        'sub_total',
        'price'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
