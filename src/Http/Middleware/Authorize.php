<?php

namespace Taronyuu\NovaMollieTool\Http\Middleware;

use Taronyuu\NovaMollieTool\NovaMollieTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(NovaMollieTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
