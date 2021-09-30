<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductsRequest;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = auth()->user();
        //dd($currentUser);
        if ($currentUser->email == 'Phuongnyo98@gmail.com') {
            return $next($request);
        }

        return redirect()->route('home-page');
    }
}