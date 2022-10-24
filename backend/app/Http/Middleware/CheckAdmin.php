<?php

namespace App\Http\Middleware;

use App\Services\CheckAdminService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{

    public function handle(Request $request, Closure $next)
    {
        $credentials['email'] = $request->email;
        $credentials['password'] = $request->password;
        Auth::attempt($credentials);
        if (auth()->user()) {
            if (CheckAdminService::check(auth()->user())) {
                return $next($request);
            }
            return abort(404);
        }
        return abort(404);
    }
}
