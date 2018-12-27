<?php

namespace App\Http\Controllers;

use App\ApiLog;
use App\Classes\Query\GetApiStatistic;
use App\Classes\Query\GetTransactionStatistic;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countOfUser = User::ofUser()->count();
        $countOfAdmin = User::ofAdmin()->count();
        $today = date('Y-m-d') . ' 00:00:00';
        $countOfApiCallToday = ApiLog::where('created_at', '>=', $today)->count();
        $countOfApiCallAll = ApiLog::count();

        $query = new GetApiStatistic();
        $apiCallStats = $query->get();

        $params = [
            'count_of_user' => $countOfUser,
            'count_of_admin' => $countOfAdmin,
            'count_of_api_call_today' => $countOfApiCallToday,
            'count_of_api_call_all' => $countOfApiCallAll,
            'api_call_stats' => $apiCallStats,
        ];

        return view('dashboard.home', $params);
    }

    public function test()
    {
        return (new GetTransactionStatistic())->get();
    }
}
