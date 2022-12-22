<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login ()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginUser (Request $request)
    {
        $request->validate([
           'email' => 'required',
           'password' => 'required',
        ]);

        $userCheck = User::where('name', $request->email)->orWhere('username', $request->email)->orWhere('email', $request->email)->exists();
        if ($userCheck)
        {
            $user = User::where('name', $request->email)->orWhere('username', $request->email)->orWhere('email', $request->email)->first();
            if (Hash::check($request->password, $user->password))
            {
                $request->offsetSet('email', $user->email);
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials))
                {
                    return redirect('dashboard')->with('message', 'signed in successfully');
                }
            }
            return redirect('login')->with('fail', 'password is not correct');
        }
        return redirect('register')->with('fail', 'email is not registered');
    }


    public function registerUser (Request $request)
    {
        $request->validate([
           'name' => 'required',
           'username' => 'required|min:4|max:20|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:7|confirmed',
           'password_confirmation' => 'required',
        ]);

        User::saveUserData($request);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials))
        {
            return redirect()->intended('dashboard')->with('message', 'signed in successfully');
        }
        return redirect()->back()->with('fail', 'something went wrong');
    }


    public function dashboard ()
    {
        return view('dashboard');
    }

    public function logout (Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/login')->with('message', 'logout successfully');
    }
}
