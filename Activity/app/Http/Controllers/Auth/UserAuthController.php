<?php
 
 namespace App\Http\Controllers\Auth;
 
 use App\Models\User;
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;
 
 class UserAuthController extends Controller
 {
     public function showLoginForm()
     {
         // If already logged in, redirect to dashboard
         if (Auth::check()) {
             return redirect()->route('std.index');
         }
         return view('login');
     }
 
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|min:6',
         ]);
 
         if (Auth::attempt($request->only('email', 'password'))) {
             // Regenerate session on successful login
             $request->session()->regenerate();
             return redirect()->route('std.index');
         }
 
         return back()->withErrors(['email' => 'Invalid email or password']);
     }
 
    
     public function showRegisterForm()
     {
         if (Auth::check()) {
             return redirect()->route('std.index');
         }
         return view('register');
     }
 
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|min:3|confirmed',
         ]);
 
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
         ]);
 
         Auth::login($user);
         return redirect()->route('std.index');
     }

 
     public function logout(Request $request)
     {
         Auth::logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();
         return redirect()->route('login');
     }
 }