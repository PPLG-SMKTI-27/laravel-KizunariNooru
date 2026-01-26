<?php
// app/Http\Controllers\Admin\DashboardController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Debug: cek semua session
        \Log::info('Dashboard access attempt:', [
            'session_id' => session()->getId(),
            'admin_logged_in' => session('admin_logged_in'),
            'path' => $request->path(),
            'ip' => $request->ip(),
        ]);
        
        // Cek session
        if (!session('admin_logged_in')) {
            \Log::warning('Unauthorized dashboard access');
            return redirect('/login')->with('error', 'Please login first!');
        }
        
        \Log::info('Dashboard accessed successfully by:', [session('admin_email')]);
        
        return view('admin.dashboard', [
            'admin_name' => session('admin_name'),
            'admin_email' => session('admin_email'),
            'login_time' => session('login_time'),
        ]);
    }
}