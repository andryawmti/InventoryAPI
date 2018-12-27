<?php

namespace App\Http\Middleware;

use App\ApiLog;
use App\User;
use Closure;

class ApiLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        $ip = $request->ip();
        $user = User::findOneByApiToken($request->get('api_token'));

        ApiLog::create([
            'user_id' => $user->id,
            'path' => $path,
            'ip_address' => $ip,
        ]);

        return $next($request);
    }
}
