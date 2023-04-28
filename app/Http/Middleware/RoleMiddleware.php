<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    private $roles;
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roleNames)
    {
        $roles = $this->roles->whereIn('name', $roleNames)->get();

        if (Auth::check() && Auth::user()->hasAnyRole($roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }


    /* public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::$user()->hasRole($roles)){
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    } */
}
