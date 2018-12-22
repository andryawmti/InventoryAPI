<?php

namespace App\Http\Controllers\Api;

use App\Classes\ApiResponse;
use App\Classes\Query\GetTransaction;
use App\Transaction;
use App\Http\Controllers\Controller;
use App\TransactionItem;

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

    public function findAll()
    {
        $params = request()->post();

        $query = new GetTransaction();

        if (isset($params['transaction_category_id'])) {
            $query->ofCategory($params['transaction_category_id']);
        }

        if (isset($params['customer_id'])) {
            $query->ofCustomer($params['customer_id']);
        }

        if (isset($params['date_start']) && isset($params['date_end'])) {
            $query->ofDate($params['date_start'], $params['date_end']);
        }

        return ApiResponse::data($query->get());
    }

    public function get(Transaction $transaction)
    {
        $return = $transaction->toArray();
        $return['transaction_items'] = $transaction->items()->get();
        return ApiResponse::data($return);
    }

    public function getDetail(Transaction $transaction)
    {
        if ($transaction->transaction_category_id == 1) {
            return $this->getSellingDetail($transaction->id);
        } else {
            return $this->getBuyingDetail($transaction->id);
        }
    }

    private function getSellingDetail($id)
    {
        $query = new GetTransaction();
        $transaction = (array)$query->ofCategory(1)
            ->ofTransactionId($id)->get()[0];

        $items = TransactionItem::getItems($id);

        $transaction['transaction_items'] = $items;

        return ApiResponse::data($transaction);
    }

    private function getBuyingDetail($id)
    {
        $query = new GetTransaction();
        $transaction = (array)$query->ofCategory(2)
            ->ofTransactionId($id)->get()[0];

        $items = TransactionItem::getItems($id);

        $transaction['transaction_items'] = $items;

        return ApiResponse::data($transaction);
    }

    /**
     * @post $post = {
     *          "transaction_category_id":"1",
     *          "customer_id":"1",
     *          "distributor_id":"",
     *          "delivery_cost":"25000",
     *          "sub_total":"550000",
     *          "total":"575000",
     *          "status":"checked",
     *          "transaction_items":[
     *              {
     *                  "product_id":"1",
     *                  "quantity":"2",
     *                  "price":"275000"
     *              }
     *          ]
     *      }
     * @return \Illuminate\Http\JsonResponse
     */
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
