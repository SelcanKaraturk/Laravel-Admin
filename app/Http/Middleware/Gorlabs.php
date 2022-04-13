<?php

namespace App\Http\Middleware;

use App\Helper\Helper;
use Closure;
use Illuminate\Http\Request;
use DB;

class Gorlabs
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
        if (!checkDBConnection() && !$request->is('install')){
            /*clearLogs();
            return redirect()->route('install.index');*/
        }
        if (checkDBConnection()){
            DB::connection()->disableQueryLog(); //birden fazla bağlantı olması durumunda connection kullanılır, disabledquerylog istekler sırasında sorguların sürekli hafızaya kaydedilmesini önler
            Helper::setRoles();

        }

        return $next($request);
    }
}
