<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_category_id', 'unit_id', 'name', 'buy_price', 'sell_price', 'stock'];
}
