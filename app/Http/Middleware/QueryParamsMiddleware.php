<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryParamsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $sortField = $request->query('sort_field');
        $sortDirection = $request->query('sort_direction', 'asc');
        $count = $request->query('count', 25);

        if (!in_array($sortField, ['user_name', 'email', 'created_at'])) {
            abort(400, 'Invalid sort field.');
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            abort(400, 'Invalid sort direction.');
        }

        if (!is_numeric($count) || $count <= 0) {
            abort(400, 'Invalid count parameter.');
        }

        $request->merge(['sort_field' => $sortField, 'sort_direction' => $sortDirection, 'count' => $count]);

        return $next($request);
    }
}
