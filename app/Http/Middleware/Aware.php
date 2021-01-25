<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Aware
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->hasRole('Admin')) {
            return $next($request);
        } else {
            return redirect()->back()->with('error', 'You have no such permission!');
        }
    }
}
