<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get(Product $product)
    {
        return ApiResponse::data($product->toArray());
    }

    public function getAll()
    {
        return ApiResponse::data(Product::all()->toArray());
    }

    public function add()
    {
        try {
            Product::create(request()->all());
            return ApiResponse::success('Product Successfully Added');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Product $product)
    {
        try{
            $product->update(request()->all());
            return ApiResponse::success('Product Successfully Updated');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Product $product)
    {
        try {
            $product->delete();
            return ApiResponse::success('Product Successfully Deleted');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
