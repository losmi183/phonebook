<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        // Domeni kojima je dozvoljen pristup resursima na backendu
        $domains = ['http://localhost:8080'];

        // Proverava da li je zahtev sa drugog domena
        if( isset($request->server()['HTTP_ORIGIN']) ) {
            
            // Ako jeste sacuvamo ga u $origin
            $origin = $request->server()['HTTP_ORIGIN'];

            // Proveravamo da li je origin medju domenima kojima je omogucen pristup / ako jeste
            if(in_array($origin, $domains)) {
                // Dodajemo potrebne hedere
                header('Access-Control-Allow-Origin: ' . $origin);

                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Requested-With');

                header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH');
            }
        }

        return $next($request);
    }
}
