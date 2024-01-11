<?php

namespace App\Http\Middleware;

use App\Models\Account;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('getLogin');
        }

        $account = Account::where('accountName', Auth::user()->accountName)->first();

        // Redirect faculty members trying to access student dashboard
        if ($account->accountType === 'F' && $request->route()->getName() === 'studentDashboard') {
            return redirect()->route('facultyDashboard');
        }

        // Redirect students trying to access faculty dashboard
        if ($account->accountType === 'S' && $request->route()->getName() === 'facultyDashboard') {
            return redirect()->route('studentDashboard');
        }

        return $next($request);
    }
}
