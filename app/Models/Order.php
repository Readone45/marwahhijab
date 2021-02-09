<?php

namespace App\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'postal_code',
        'city',
        'province',
        'district',
        'subdistrict',
        'address',
        'weight',
        'shipping_cost',
        'shipping_method',
        'total',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
