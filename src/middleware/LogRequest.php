<?php

namespace Pixan\Api\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogRequest
{
	public function handle($request, Closure $next)
    {
		if (config('pixanapi.options.log_requests')) {
			
		}
		return $next($request);
    }
}
