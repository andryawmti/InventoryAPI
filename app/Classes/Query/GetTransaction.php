<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/17/18
 * Time: 4:23 PM
 */

namespace App\Classes\Query;


use Illuminate\Support\Facades\DB;

class GetTransaction
{
    private $where = " WHERE 1";
    private $select = "SELECT t.*, tc.name as transaction_category";
    private $leftJoin = " LEFT JOIN transaction_categories AS tc ON t.transaction_category_id = tc.id";

    public function get()
    {
        return DB::select($this->select . $this->getQuery() . $this->leftJoin . $this->where . " ORDER BY t.id ASC");
    }

    private function getQuery()
    {
        $query = " FROM `transactions` AS t";
        return $query;
    }

    public function ofCustomer($customer_id)
    {
        $this->where .= " AND t.customer_id = $customer_id";
        return $this;
    }

    public function ofCategory($transaction_category_id)
    {
        if ($transaction_category_id == 1) {
            $this->select .= ", CONCAT(c.first_name, ' ', c.last_name) AS customer_name";
            $this->leftJoin .= " LEFT JOIN customers AS c ON t.customer_id = c.id ";
        } else if ($transaction_category_id == 2) {
            $this->select .= ", CONCAT(d.first_name, ' ', d.last_name) AS distributor_name";
            $this->leftJoin .= " LEFT JOIN distributors AS d ON t.distributor_id = d.id";
        }

        $this->where .= " AND t.transaction_category_id = $transaction_category_id";
        return $this;
    }

    public function ofTransactionId($transaction_id)
    {
        $this->where .= " AND t.id = $transaction_id";
        return $this;
    }

    public function ofDate($date_start, $date_end)
    {
        $this->where .= " AND ( DATE_FORMAT(t.created_at, '%Y-%m-%d') BETWEEN '$date_start' AND '$date_end' )";
        return $this;
    }
}