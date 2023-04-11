<?php

namespace App\Http\Middleware;

use App\Events\PageViewed;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Dispatch the PageViewed event after processing the request
        $url = $request->fullUrl();
        $user_id = auth()->id();
        event(new PageViewed($url, $user_id));
        return $response;
    }
}
