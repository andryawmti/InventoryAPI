<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 12/27/18
 * Time: 3:52 PM
 */

namespace App\Classes\Query;


use Illuminate\Support\Facades\DB;

class GetApiStatistic
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
                    MIN(DATE(created_at)) AS `date`,
                    COUNT(id) AS `value`
                FROM `api_logs`";
        return $query;
    }

    public function ofDate($date_start, $date_end)
    {
        $this->where .= " AND DATE_FORMAT(created_at, '%Y-%m-%d') BETWEEN $date_start AND $date_end";
        return $this;
    }

    public function ofUser($user_id)
    {
        $this->where .= " AND user_id = $user_id";
        return $this;
    }
}