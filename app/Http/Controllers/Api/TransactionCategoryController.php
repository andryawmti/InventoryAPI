<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\TransactionCategory;
use App\Http\Controllers\Controller;

class TransactionCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll()
    {
        return ApiResponse::data(TransactionCategory::all()->toArray());
    }

    public function get(TransactionCategory $transactionCategory)
    {
        return ApiResponse::data($transactionCategory->toArray());
    }

    public function add()
    {
        try {
            TransactionCategory::create(request()->all());
            return ApiResponse::success('Transaction Category Successfully Added');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(TransactionCategory $transactionCategory)
    {
        try {
            $transactionCategory->update(request()->all());
            return ApiResponse::success('Transaction Category Successfully Updated');
        } catch(\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(TransactionCategory $transactionCategory)
    {
        try {
            $transactionCategory->delete();
            return ApiResponse::success('Transaction Category Successfully Deleted');
        } catch(\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
