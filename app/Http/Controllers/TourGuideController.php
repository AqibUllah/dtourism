<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourGuide;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TourGuideController extends Controller
{
    
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('home');
        }
        return view('tourists.login');
    }

   
    public function login(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        if (Auth::guard('tourguide')->attempt($credentials)) {
           
            return redirect()->route('tourguide.dashboard');
        } else {
            
            return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function showRegistrationForm()
    {
        return view('tourists.register');
    }

    
    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:tour_guides|max:255',
            'age' => 'required|integer|min:18',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_no' => 'required|string|max:10',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|in:pakistani,other',
        ]);

       
        $tourGuide = TourGuide::create($validatedData);

       
        return redirect()->route('tourists.login')->with('success', 'Registration successful. Please log in.');
    }

    
   
    
    public function logout()
    {
        Auth::guard('tourguide')->logout();
        return redirect()->route('tourguide.login');
    }

   
    public function showProfile()
    {
        $tourGuide = Auth::guard('tourguide')->user();
        return view('tourguides.profile', compact('tourGuide'));
    }

    
    public function updateProfile(Request $request)
    {
        $tourGuide = Auth::guard('tourguide')->user();

        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:18',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_no' => 'required|string|max:10',
            'gender' => 'required|in:male,female',
            'nationality' => 'required|in:pakistani,other',
        ]);

       
        $tourGuide->update($validatedData);

        
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
