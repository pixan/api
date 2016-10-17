<?php

namespace Pixan\Api\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogRequest
{
	public function handle($request, Closure $next)
    {
		die('dis request');
		return $next($request);
    }
}
