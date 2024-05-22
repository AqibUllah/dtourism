<?php

namespace App\Http\Controllers\TourGuide\Auth;

use App\Http\Controllers\Controller;
use App\Models\HotelManager;
use App\Models\TourGuide;
use App\Models\Transporter;
use App\Models\User;
use App\traits\Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use Image;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('tour_guide.auth.register');
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.TourGuide::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'numeric','min:6'],
            'city' => ['required', 'string','max:255'],
            'age' => ['required', 'numeric'],
            'street' => ['required', 'string','max:255'],
            'house_no' => ['required', 'string','max:255'],
            'specialization' => ['required', 'string','max:255'],
            'price_per_3_hours' => ['required', 'string','max:255'],
            'image' => ['file','mimes:jpg,jpeg,png,gif','max:5000'],
            'language' => ['required', 'string','max:255'],
            'gender' => ['required', 'string','max:10'],
            'nationality' => ['required', 'string','max:255'],
        ]);

        if ($request->hasFile('image')){
            $image = $this->uploadImage($request->file('image'),'uploads/users');
        }else{
            $image = "";
        }

        $user = TourGuide::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'street' => $request->street,
            'age' => $request->age,
            'house_no' => $request->house_no,
            'specialization' => $request->specialization,
            'language' => $request->language,
            'price_per_3_hours' => $request->price_per_3_hours,
            'gender' => $request->gender,
            'nationality' => $request->nationality,
            'image' => $image,
        ]);

        event(new Registered($user));

        Auth::guard('tour_guide')->login($user);

        return redirect(route('tour_guide.dashboard', absolute: false));
    }
}
