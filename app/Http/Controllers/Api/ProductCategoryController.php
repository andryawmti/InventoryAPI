<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\ProductCategory;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll()
    {
        return ApiResponse::data(ProductCategory::all()->toArray());
    }

    public function get(ProductCategory $productCategory)
    {
        return ApiResponse::data($productCategory->toArray());
    }

    public function add()
    {
        try {
            $productCategory = ProductCategory::create(request()->post());
            return ApiResponse::success('Product Category Successfully Added', ['product_category_id' => $productCategory->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(ProductCategory $productCategory)
    {
        try {
            $productCategory->update(request()->post());
            return ApiResponse::success('Product Category Successfully Updated', ['product_category_id' => $productCategory->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(ProductCategory $productCategory)
    {
        try {
            $productCategory->delete();
            return ApiResponse::success('Product Category Successfully Deleted', ['product_category_id' => $productCategory->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

}
