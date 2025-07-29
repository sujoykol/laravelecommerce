<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductReview;

class ReviewController extends Controller
{
    public function index()
{
    $reviews = ProductReview::with('product', 'user')->latest()->paginate(20);
    return view('admin.reviews.list', compact('reviews'));
}

public function approve($id)
{
    $review = ProductReview::findOrFail($id);
    $review->is_approved = true;
    $review->save();
    return back()->with('success', 'Review approved.');
}

public function destroy($id)
{
    ProductReview::findOrFail($id)->delete();
    return back()->with('success', 'Review deleted.');
}
}
