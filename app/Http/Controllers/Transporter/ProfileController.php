<?php

namespace App\Http\Controllers\Transporter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transporter\ProfileUpdateRequest;
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
        return view('transporter.profile.edit', [
            'user' => Auth::guard('transporter')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Auth::guard('transporter')->user()->fill($request->validated());

//        if (Auth::guard('transporter')->isDirty('email')) {
//            Auth::guard('transporter')->user()->email_verified_at = null;
//        }

        Auth::guard('transporter')->user()->save();

        return Redirect::route('transporter.profile.edit')->with('status', 'profile-updated');
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
