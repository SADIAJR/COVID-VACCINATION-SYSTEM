<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'stars'   => 'required|integer|min:1|max:5',
            'message' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'stars'   => $request->stars,
            'message' => $request->message,
        ]);

        // Just save the review and return success.
        // The JS will then submit the logout form automatically.
        return response()->json(['success' => true]);
    }
}
