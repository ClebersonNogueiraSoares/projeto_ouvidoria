<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        
        if (Auth::check()) {
            if (Auth::user()->idTipo_usuario != 5) {
                echo "<script>
        swal({
            title: 'Desculpe!',
            text: 'Você não tem permissão para acessar está área!',
            icon: 'error ',
        });
        </script>";
              return  redirect()->action('HomeController@index')->with('usuario',' ');
                
            } else {
                return $next($request); 
            } 
    }else{
        return redirect()->action('Auth\LoginController@showLoginForm');
    }
   
    }
}
