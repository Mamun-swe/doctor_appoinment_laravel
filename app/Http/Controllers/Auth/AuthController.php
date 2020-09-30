<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Regisration
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'account_type' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ];
        $this->validate($request, $rules);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'user_type' => $request['account_type'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with('success', 'Successfully account created.');
    }

    // Login
    public function login(Request $request)
    {
        $data = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            if (Auth()->User() && Auth()->User()->user_type == 'patient') {
                return redirect()->route('user.profile');
            }

            if (Auth()->User() && Auth()->User()->user_type == 'doctor') {
                return redirect()->route('doctor.dashboard');
            }

            if (Auth()->User() && Auth()->User()->user_type == 'admin') {
                return redirect()->route('admin.dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Email or password incorrect');
        }
    }

    // Reset
    public function resetPass(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|string|min:8',
        ]);
        $form_data = array(
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );

        $data = User::where('email', $request->email)->get();
        if (count($data) > 0) {
            $record = User::where('email', $request->email);
            $record->update($form_data);
            return redirect()->back()->with('success', 'Password successfully reset.');
        } else {
            return redirect()->back()->with('errorx', 'Account not found, Try with correct e-mail.');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return back();
    }
}
