<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthBasic

{

    public function handle(Request $request, Closure $next)

    {
        
        if($request->header('username')== env('AUTH_USERNAME') && $request->header('password')== env('AUTH_PASSWORD'))

        {
            return $next($request);
            

        }
        else
        {
            return response()->json(['Unauthorized' => 'authentication failed'] , 401);
        }

    }

}



?>