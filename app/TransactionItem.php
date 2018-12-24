<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionItem extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'price'
    ];

    public static function getItems($transaction_id)
    {
        $query = "SELECT ti.*, p.name as product_name FROM transaction_items AS ti
                  LEFT JOIN products AS p ON ti.product_id = p.id
                  WHERE ti.transaction_id = '$transaction_id' ORDER BY ti.id ASC";
        return DB::select($query);
    }

    public static function deleteByTransactionId($transaction_id)
    {
        return TransactionItem::where('transaction_id', $transaction_id)
                                ->delete();
    }
}
