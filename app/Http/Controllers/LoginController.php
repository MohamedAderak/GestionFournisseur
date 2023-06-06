<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $remember = $request->has('remember');
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            if ($user->role == 'admin') {
                return to_route('admin_dashboard');
            } elseif ($user->role == 'user') {
                return to_route('user_dashboard');
            }
        } else {
            // Authentication failed
            return redirect()->route('login')->with('message', 'Invalid email or password!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function signup(Request $request)
    {
        return view('pages.createaccount');
    }


    public function SignupSubmit(Request $request)
    {
        $rules = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'Agree' => 'required',
        ]);

        $validatedData = [
            'name' => $rules['name'],
            'email' => $rules['email'],
            'password' => bcrypt($rules['password']),

        ]; 
        DB::table('users')->insert($validatedData);
        return to_route('login')->with('success', 'Account created successfully. Login now');
    }

}
