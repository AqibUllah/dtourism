<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransporterController extends Controller
{
    public function showLoginForm()
    {
        return view('transporter.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('transporter')->attempt($credentials)) {
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('transporter.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:transporters',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $transporter = Transporter::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::guard('transporter')->login($transporter);

        return redirect()->route('home');
    }

    public function showDashboard()
    {
        return view('dashboard.index');
    }
}
