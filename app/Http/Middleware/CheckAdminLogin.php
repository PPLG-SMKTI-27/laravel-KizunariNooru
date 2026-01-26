<?php
// app/Http/Middleware/CheckAdminLogin.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }
        
        return $next($request);
    }
}