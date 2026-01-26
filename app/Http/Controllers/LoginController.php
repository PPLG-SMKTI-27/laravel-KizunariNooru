<?php
// app/Http\Controllers\Auth\LoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        // Hardcoded credentials
        $validEmail = 'admin@furinadev.com';
        $validPassword = 'Admin123!';
        
        if ($request->email === $validEmail && $request->password === $validPassword) {
            // Set session
            session([
                'admin_logged_in' => true,
                'admin_name' => 'Admin Furina',
                'admin_email' => $request->email,
            ]);
            
            // Redirect ke DASHBOARD yang sudah kita buat di routes
            return redirect('/dashboard'); // ATAU /admin/dashboard
        }
        
        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
    
    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_name', 'admin_email']);
        return redirect('/');
    }
}