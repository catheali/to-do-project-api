<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConfigCORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        return $response;

        // header("Access-Control-Allow-Origin: *");

        // $headers = [
        //     'Access-Control-Allow-Methods'      => 'POST, GET, OPTIONS, PUT, DELETE',
        //     'Access-Control-Allow-Headers'      => 'Content-Type, X-Auth-Token, Origin, Authorization',
        //     'Access-Control-Allow-Credentials'  => true,
        //     'Cache-Control'                     => 'no-store, no-cache, must-revalidate',
        // ];
        // if ($request->getMethod() == "OPTIONS") {
        //     return response('OK')
        //         ->withHeaders($headers);
        // }

        // $response = $next($request);
        // foreach ($headers as $key => $value)
        //     $response->header($key, $value);
        // return $response;

        // return $next($request)
        //     ->header('Access-Control-Allow-Origin', '*')
        //     ->header('Access-Control-Allow-Methods', '*')
        //     ->header('Access-Control-Allow-Credentials', true)
        //     ->header('Access-Control-Allow-Headers', 'X-Requested-With,Content-Type,X-Token-Auth,Authorization')
        //     ->header('Accept', 'application/json');
    }
}
