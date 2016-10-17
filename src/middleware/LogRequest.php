<?php

namespace Pixan\Api\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogRequest
{
	public function handle($request, Closure $next)
    {
		if (config('pixanapi.options.log_requests')) {
			\DB::table('pixan_api_logs')->insert([
				'headers' => json_encode($request->header()),
				'inputs' => json_encode($request->all()),
				"created_at" =>  \Carbon\Carbon::now(),
            	"updated_at" => \Carbon\Carbon::now(),
			]);
		}
		return $next($request);
    }
}
