<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\TransactionItem;
use App\Http\Controllers\Controller;

class TransactionItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get(TransactionItem $transactionItem)
    {
        return ApiResponse::data($transactionItem->toArray());
    }

    public function update(TransactionItem $transactionItem)
    {
        try {
            $transactionItem->update(request()->all());
            return ApiResponse::success('Transaction Item Successfully Updated');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(TransactionItem $transactionItem)
    {
        try {
            $transactionItem->delete();
            return ApiResponse::success('Transaction Successfully Deleted', ['transaction_item_id' => $transactionItem->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
