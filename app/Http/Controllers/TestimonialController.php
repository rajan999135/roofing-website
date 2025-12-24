<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Safety: must be logged in
        if (!$user) {
            return redirect()->route('login');
        }

        // ✅ Allow only ONE review per user
        if (Testimonial::where('user_id', $user->id)->exists()) {
            return redirect()
                ->route('reviews')
                ->with('error', 'You have already submitted a review. Thank you!');
        }

        // ✅ Validate input
        $data = $request->validate([
            'rating'  => ['required', 'integer', 'min:1', 'max:5'],
            'content' => ['required', 'string', 'max:100'],
        ]);

        // ✅ Required DB fields
        $data['user_id']     = $user->id;
        $data['client_name'] = $user->name; // ✅ THIS FIXES THE ERROR

        Testimonial::create($data);

        return redirect()
            ->route('reviews')
            ->with('success', 'Thanks for your review!');
    }
}
