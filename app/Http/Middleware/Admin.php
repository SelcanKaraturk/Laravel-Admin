<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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

            if (auth()->check()){ //kullanıcı login olmuşmu onu gösterir
                $roles=auth()->user()->roles()->get(); //login olan kişinin rolünün ne olduğunu getirir
                foreach ($roles as $role){
                    if ($role->is_see_admin){

                        return $next($request);
                    }
                }
            }

        return redirect('/');
    }
}
