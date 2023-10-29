<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActingCommitmentMarkerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::check() && Auth::user()->role == 'Admin') {
            return redirect()->route('dashboard.admin');
        } else if (Auth::check() && Auth::user()->role == 'Partner') {
            return redirect()->route('partner.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'Supervising Consultant') {
            return redirect()->route('supervising.consultant.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'Site Supervisor') {
            return redirect()->route('site.supervisor.dashboard');
        } else if (Auth::check() && Auth::user()->role == 'Acting Commitment Marker') {
            return $next($request);
        }

        return redirect('/');
    }
}
