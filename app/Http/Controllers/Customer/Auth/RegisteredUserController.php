<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('customer.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'age' => ['required','numeric'],
            'city' => ['required','string','max:255'],
            'street' => ['required','string','max:255'],
            'house_no' => ['required','string','max:255'],
            'gender' => ['required','string','max:10'],
            'nationality' => ['required','string','max:255'],
        ]);

        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'phone_no' => $request->phone_no,
            'city' => $request->city,
            'street' => $request->street,
            'house_no' => $request->house_no,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
        ]);

        event(new Registered($user));

        Auth::guard('customer')->attempt($request->only('email','password'));

        return redirect(route('customer.dashboard', absolute: false));
    }
}
