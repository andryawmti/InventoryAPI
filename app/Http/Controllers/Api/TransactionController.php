<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Transaction;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api');
    }

    public function getAll()
    {
        return ApiResponse::data(Transaction::all()->toArray());
    }

    public function get(Transaction $transaction)
    {
        $return = $transaction->toArray();
        $return['transaction_items'] = $transaction->items()->get();
        return ApiResponse::data($return);
    }

    public function add()
    {
        try {
            $id = Transaction::add(request()->post());
            return ApiResponse::success('Transaction Successfully Added',['transaction_id' => $id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Transaction $transaction)
    {
        try {
            $transaction->update(request()->all());
            return ApiResponse::success('Transaction Successfully Updated');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return ApiResponse::success('Transaction Successfully Deleted');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
