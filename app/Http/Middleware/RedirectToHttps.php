<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToHttps
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
        $environment = \App::environment();
        echo $environment;
        if ( !$this->is_ssl() && $environment === 'production' )
        {
            //return redirect('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            echo "not secure" . "<br/>";
            echo $_SERVER['HTTP_HOST'] . "<br/>";
            echo $_SERVER['REQUEST_URI'] . "<br/>";
        } else {
            
        }
        
        return $next($request);
    }
    
    public function is_ssl()
    {
        if ( isset($_SERVER['HTTPS']) === true ) // Apache
        {
            return ( $_SERVER['HTTPS'] === 'on' or $_SERVER['HTTPS'] === '1' );
        }
        elseif ( isset($_SERVER['SSL']) === true ) // IIS
        {
            return ( $_SERVER['SSL'] === 'on' );
        }
        elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) === true ) // Reverse proxy
        {
            return ( strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https' );
        }
        elseif ( isset($_SERVER['HTTP_X_FORWARDED_PORT']) === true ) // Reverse proxy
        {
            return ( $_SERVER['HTTP_X_FORWARDED_PORT'] === '443' );
        }
        elseif ( isset($_SERVER['SERVER_PORT']) === true )
        {
            return ( $_SERVER['SERVER_PORT'] === '443' );
        }
        
        return false;
    }
}
