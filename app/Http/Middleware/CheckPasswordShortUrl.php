<?php

namespace App\Http\Middleware;

use App\Shorturl;
use Closure;

class CheckPasswordShortUrl
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
        $shorturl = Shorturl::where('shortCode', request()->path)->first();
        if($shorturl->shortPwd != null){
            return redirect()->route('path.pass', ['path' => $shorturl->shortCode]);
        }
        return $next($request);
    }
}
