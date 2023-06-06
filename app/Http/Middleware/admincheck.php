<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\UserList;

class admincheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $username = $request->route('username');
        $users = UserList::where('username', $username);
    
        if ($users && $users->username === auth()->user()->username) {
            return $next($request);
        }
    
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
