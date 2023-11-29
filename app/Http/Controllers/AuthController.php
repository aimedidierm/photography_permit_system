<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $passwordMatch = Hash::check($password, $user->password);
            if ($passwordMatch) {
                Auth::login($user);
                if ($user->role == 'applicant') {
                    return redirect("/applicant");
                } elseif ($user->role == 'register') {
                    return redirect("/register/applications");
                } elseif ($user->role == 'board') {
                    return redirect("/board/applications");
                } else {
                    return back()->withErrors('Role not found');
                }
            } else {
                return redirect("/login")->withErrors(['msg' => 'Incorect password']);
            }
        } else {
            return redirect('/login')->withErrors(['msg' => 'Incorect email and password']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect(route("login"));
        } else {
            return back();
        }
    }
}
