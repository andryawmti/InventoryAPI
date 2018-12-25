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
            $customer = Customer::create(request()->post());
            return ApiResponse::success('Customer Successfully Added',['customer_id' => $customer->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Customer $customer)
    {
        try{
            $customer->update(request()->post());
            return ApiResponse::success('Customer Successfully Updated', ['customer_id' => $customer->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Customer $customer)
    {
        try{
            $customer->delete();
            return ApiResponse::success('Customer Successfully Deleted', ['customer_id' => $customer->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function countOfCustomer()
    {
        return Customer::count();
    }
}
