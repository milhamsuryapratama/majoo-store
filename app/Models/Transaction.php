<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'province',
        'city',
        'postcode',
        'address',
        'status',
        'payment_process',
        'file'
    ];

    public function details()
    {
        return $this->hasMany(Transaction_Detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    function getAddress()
    {
        return $this->attributes['address'].', '.$this->attributes['city'].', '.$this->attributes['province'].', '.$this->attributes['postcode'];
    }
}
