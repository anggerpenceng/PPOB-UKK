<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheckMiddleware
{

    public function handle(Request $request , Closure $next){

        $roles = Auth::user()->id_role;

        if ($roles == 1){
            return $next($request);
        }

        return redirect('/');

    }

}