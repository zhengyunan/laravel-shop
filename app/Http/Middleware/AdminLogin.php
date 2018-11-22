<?php

namespace App\Http\Middleware;

use Closure;
use URL;
class AdminLogin
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
        if(!session('id')){
            return redirect()->route('create');
        }

        // $path = isset($_SERVER["PATH_INFO"])? 'Admin/'.\Request::route()->getName() : '/';
        $path = isset($_SERVER["PATH_INFO"])? trim($_SERVER['PATH_INFO'], '/') : '/';
        // dd($_SERVER);
        $whiteList = ['admin','admin/welcome'];
        
        // var_dump($path);
        // echo "<hr>";
        // echo "<pre>";
        // var_dump(session('url'));die;
        if(!in_array($path,array_merge($whiteList,session('url')))){
            
            // dd($path);
            //    var_dump($path);
            //     // echo "<pre>";
            //   dd(array_merge($whiteList,session('url')));
               die('无权访问'); 
        }
        return $next($request);

        
    }
}
