<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function detailsUpdate(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric|regex:/^07\d{8}$/',
                'password' => 'required|string',
                'confirmPassword' => 'required|string',
            ],
            $messages = [
                'phone.regex' => 'The phone number must start with "07" and be 10 digits long.',
            ]
        );
        if ($request->password == $request->confirmPassword) {
            $user = User::find(Auth::id());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->update();
            return redirect()->back();
        } else {
            return back()->withErrors('Passwords not match');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|numeric|regex:/^07\d{8}$/',
                'password' => 'required|string',
                'confirmPassword' => 'required|string',
            ],
            $messages = [
                'phone.regex' => 'The phone number must start with "07" and be 10 digits long.',
            ]
        );
        if ($request->password == $request->confirmPassword) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->role = 'applicant';
            $user->save();
            return redirect('/');
        } else {
            return redirect('/register')->withErrors('Password not match');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        if ($user->role == 'applicant') {
            return view('applicant.settings', ['data' => $user]);
        } elseif ($user->role == 'board') {
            return view('board.settings', ['data' => $user]);
        } else {
            return view('register.settings', ['data' => $user]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
