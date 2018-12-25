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
        return ApiResponse::data(Product::getAll());
    }

    public function add()
    {
        try {
            $product = Product::create(request()->all());
            return ApiResponse::success('Product Successfully Added', ['product_id' => $product->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Product $product)
    {
        try{
            $product->update(request()->all());
            return ApiResponse::success('Product Successfully Updated', ['product_id' => $product->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Product $product)
    {
        try {
            $product->delete();
            return ApiResponse::success('Product Successfully Deleted', ['product_id' => $product->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function countOfProduct()
    {
        return Product::count();
    }
}
