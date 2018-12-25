<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Distributor;
use App\Http\Controllers\Controller;

class DistributorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function get(Distributor $distributor)
    {
        return ApiResponse::data($distributor->toArray());
    }

    public function getAll()
    {
        $distributors = Distributor::all();
        return ApiResponse::data($distributors->toArray());
    }

    public function add()
    {
        try{
            Distributor::create(request()->all());
            return ApiResponse::success('Distributor Successfully Added');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Distributor $distributor)
    {
        try{
            $distributor->update(request()->all());
            return ApiResponse::success('Distributor Successfully Updated');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Distributor $distributor)
    {
        try{
            $distributor->delete();
            return ApiResponse::success('Distributor Successfully Deleted');
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function countOfDistributor()
    {
        return Distributor::count();
    }
}
