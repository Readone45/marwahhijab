<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    protected $table = 'price_list';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'price', 'product_id'
    ];
}
