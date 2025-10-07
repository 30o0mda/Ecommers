<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Review;

class ReviewController extends Controller
{
    public function AllReviews()
    {
        $reviews = Review::all();
        return view('reviews.review', ['reviews' => $reviews]);
    }

    public function StoreReview(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'review' => 'required',
        ]);

        $review = new Review();
        $review->name = $request->name;
        $review->phone = $request->phone;
        $review->email = $request->email;
        $review->subject = $request->subject;
        $review->review = $request->review;
        $review->save();
        return redirect('/reviews');
    }
}
