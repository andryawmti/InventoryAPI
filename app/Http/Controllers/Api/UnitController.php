<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Unit;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getAll()
    {
        return ApiResponse::data(Unit::all()->toArray());
    }

    public function get(Unit $unit)
    {
        return ApiResponse::data($unit->toArray());
    }

    public function add()
    {
        try {
            $unit = Unit::create(request()->all());
            return ApiResponse::success('Unit Successfully Added', ['unit_id' => $unit->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Unit $unit)
    {
        try {
            $unit->update(request()->all());
            return ApiResponse::success('Unit Successfully Added', ['unit_id' => $unit->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function delete(Unit $unit)
    {
        try {
            $unit->delete();
            return ApiResponse::success('Unit Successfully Deleted', ['unit_id' => $unit->id]);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
