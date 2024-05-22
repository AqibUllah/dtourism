<?php

namespace App\Http\Requests\TourGuide;

use App\Models\Customer;
use App\Models\HotelManager;
use App\Models\TourGuide;
use App\Models\Transporter;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(TourGuide::class)->ignore(auth()->guard('tour_guide')->user()->id)],
        ];
    }
}