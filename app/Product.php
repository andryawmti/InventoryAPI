<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $fillable = ['product_category_id', 'unit_id', 'name', 'buy_price', 'sell_price', 'stock'];

    public static function getAll()
    {
        $sql = "SELECT p.*, pc.name AS product_category, u.name AS unit FROM `products` AS p
                LEFT JOIN product_categories AS pc ON p.product_category_id = pc.id
                LEFT JOIN units AS u ON p.unit_id = u.id";
        return DB::select($sql);
    }
}
