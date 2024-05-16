<?php

namespace App\Http\Controllers\TourGuide;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourGuide\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('tour_guide.profile.edit', [
            'user' => Auth::guard('tour_guide')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Auth::guard('tour_guide')->user()->fill($request->validated());

//        if (Auth::guard('tour_guide')->isDirty('email')) {
//            Auth::guard('tour_guide')->user()->email_verified_at = null;
//        }

        Auth::guard('tour_guide')->user()->save();

        return Redirect::route('tour_guide.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::guard('tour_guide')->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
