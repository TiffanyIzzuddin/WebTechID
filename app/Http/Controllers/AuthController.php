<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
     // Menampilkan halaman registrasi
     public function showRegistrationForm()
     {
         return view('auth.register');
     }
 
     // Proses registrasi
     public function register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'name' => 'required|string|max:255',
             'username' => 'required|string|max:255|unique:users',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'date_of_birth' => 'required|date',
             'phone_number' => 'required|string|max:15',
             'profile_picture' => 'nullable|image|max:2048',
             'role' => 'required|in:admin,user',
         ]);
 
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
 
         $profilePicturePath = null;
         if ($request->hasFile('profile_picture')) {
             $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
         }
 
         User::create([
             'name' => $request->name,
             'username' => $request->username,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'date_of_birth' => $request->date_of_birth,
             'phone_number' => $request->phone_number,
             'profile_picture' => $profilePicturePath,
             'role' => $request->role,
         ]);
 
         return redirect()->route('login')->with('success', 'Registration successful! Please login.');
     }
 
     // Menampilkan halaman login
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // Proses login
     public function login(Request $request)
     {
         $credentials = $request->only('email', 'password');
 
         if (Auth::attempt($credentials)) {
             return redirect()->intended('dashboard');
         }
 
         return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
     }
 
     // Proses logout
     public function logout()
     {
         Auth::logout();
         return redirect()->route('login');
     }
 
     // Menampilkan dashboard berdasarkan role
     public function dashboard()
     {
         $user = Auth::user();
         if ($user->role == 'admin') {
             return view('dashboard.admin');
         } else {
             return view('dashboard.user');
         }
     }
}
