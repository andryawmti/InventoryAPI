<?php

namespace App\Http\Controllers;

use App\ApiLog;
use App\Classes\Query\GetApiStatistic;
use App\Classes\Query\GetTransactionStatistic;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d') . ' 00:00:00';

        $countOfUser = User::ofUser()->count();
        $countOfAdmin = User::ofAdmin()->count();

        $query = new GetApiStatistic();

        if (auth::user()->user_group_id == 1) {
            $countOfApiCallToday = ApiLog::where('created_at', '>=', $today)
                                    ->count();
            $countOfApiCallAll = ApiLog::count();
        } else if (auth::user()->user_group_id == 2) {
            $countOfApiCallToday = ApiLog::where('created_at', '>=', $today)
                ->where('user_id', auth::user()->id)
                ->count();
            $countOfApiCallAll = ApiLog::where('user_id', auth::user()->id)->count();
            $query->ofUser(auth::user()->id);
        }

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
