<?php

namespace App\Http\Controllers\reviews;

use App\Http\Controllers\Controller;
use App\Models\reviews\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product_id)
    {
        $review = Review::where('product_id', $product_id)
        ->where('user_id', Auth::id())
        ->latest()
        ->first();
        if ($review) {
            return redirect()->route('reviews.edit', ['review' => $review->id])->with('message', 'You can only post one review');
        }

        return view('pages.additional.reviews.reviews-write', compact('product_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $product_id)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $product_id;
        $review->rating = $request->rating;
        $review->title = $request->title;
        $review->description = $request->description;
        $review->save();

        // TODO: TO DETERMINE IF REVIEW IS VERIFIED
        return redirect()->route('shop.details', ['id' => $product_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $review = Review::findorFail($id);

        return view('pages.additional.reviews.reviews-edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
