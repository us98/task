<?php

namespace App\Http\Middleware;
use App\User;

use Closure;

class userAuth
{

    public function handle($request, Closure $next)
    {
        $user = User::select([
                'username'
            ])
            ->where([
                'username' => $request->username
            ])
            ->first();
            
        return $next($request);
    }
}
