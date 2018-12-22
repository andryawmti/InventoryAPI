<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_category_id',
        'customer_id',
        'distributor_id',
        'delivery_cost',
        'sub_total',
        'total',
        'status'
    ];

    public static function add(array $payload)
    {
        $transaction = Transaction::create($payload);
        $items = $payload['transaction_items'];

        foreach ($items as $item) {
            $item['transaction_id'] = $transaction->id;
            TransactionItem::create($item);
        }

        return $transaction->id;
    }

    public function items()
    {
        return $this->hasMany('App\TransactionItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function scopeOfCategory($q, $category_id)
    {
        return $q->where('transaction_category_id', $category_id);
    }

    public function scopeOfCustomer($q, $customer_id)
    {
        return $q->where('customer_id', $customer_id);
    }
}
