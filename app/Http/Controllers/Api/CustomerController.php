<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Customer;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get(Customer $customer)
    {
        return ApiResponse::data($customer->toArray());
    }

    public function getAll()
    {
        $customers = Customer::all();
        return ApiResponse::data($customers->toArray());
    }

    public function add()
    {
        try{
            Customer::create(request()->all());
            return ApiResponse::success('Customer Successfully Added');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Customer $customer)
    {
        try{
            $customer->update(request()->all());
            return ApiResponse::success('Customer Successfully Updated');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Customer $customer)
    {
        try{
            $customer->delete();
            return ApiResponse::success('Customer Successfully Deleted');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
