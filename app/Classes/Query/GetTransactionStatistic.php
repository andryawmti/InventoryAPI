<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/24/18
 * Time: 3:58 PM
 */

namespace App\Classes\Query;

use Illuminate\Support\Facades\DB;

class GetTransactionStatistic
{
    private $where = " WHERE 1";
    private $groupBy = " GROUP BY YEAR(created_at), MONTH(created_at), DAY(created_at)";

    public function get()
    {
        return DB::select($this->getQuery() . $this->where . $this->groupBy);
    }

    private function getQuery()
    {
        $query = "SELECT 
                    MIN(DATE(created_at)) AS `day`,
                    COUNT(id) AS `total_transaction`
                FROM `transactions`";
        return $query;
    }

    public function ofCategory($transaction_category_id)
    {
        $this->where .= " AND transaction_category_id = $transaction_category_id";
        return $this;
    }
}
