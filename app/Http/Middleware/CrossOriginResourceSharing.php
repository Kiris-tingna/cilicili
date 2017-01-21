<?php

namespace App\Http\Middleware;

use Closure;
use Response;

class CrossOriginResourceSharing
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
        // Wildcard * will not work in Access-Control-Allow-Origin
        // header if Access-Control-Allow-Credentials header is set to 'true'

        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods'=> 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers'=> 'Origin, Content-Type, X-Requested-With, X-Auth-Token, Cookie, Accept',
            'Access-Control-Allow-Credentials'=>'false'
        ];

        if($request->isMethod('OPTIONS')) {
            return Response::json('{"method":"OPTIONS"}', 200, $headers);
        }
        $response = $next($request);

        foreach($headers as $key => $value)
        {
            $response->header($key, $value);
        }

        return $response;
    }
}
