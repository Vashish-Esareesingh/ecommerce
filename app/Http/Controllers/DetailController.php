<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\reviews\ReviewFilter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index($id)
    {
        // to see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // getting a single product by id
        $data = Product::singleProduct($id)->withPrices()->get()->first();

        // recommended products based on orders
        $recommendedProducts = $this->recommendedProducts($id);

        // Reviews and Ratings
        $product = $data;

        // Gets all Reviews for a specific product
        $review_data = ReviewFilter::forProduct($id)
        ->filterReviews([])
        ->limit(4)
        ->get();

        // Gets the average
        $average_rating = ReviewFilter::averageOnly($product->id);

        // Get the amount of users who gave a specfic rating
        $rating_data = ReviewFilter::calculateRatings($product->id);

        // Get total reviews whether verified or not
        $total_reviews = ReviewFilter::forProduct($product->id)->count();

        // dd($data);

        return view('pages.default.detailspage',
            compact('data', 'recommendedProducts', 'review_data', 'average_rating', 'rating_data', 'total_reviews', 'product'));
    }

    // Recommended Products based or order products
    // public function recommendedProducts($product_id)
    // {
    //     return DB::select(
    //         "
    //     SELECT *
    //     FROM products
    //     WHERE id != $product_id
    //     AND id IN (
    //         SELECT DISTINCT product_id
    //         FROM order_products
    //         WHERE order_id IN (
    //             SELECT DISTINCT order_id
    //             FROM order_products
    //             WHERE product_id = $product_id
    //         )
    //     )
    //     "
    //     );
    // }

    // Recommended Products based on Category
    public function recommendedProducts($product_id)
    {
        // Retrieve up to 4 products in the same category but not the current product
        return Product::where('id', '!=', $product_id)
            ->where('category', function ($query) use ($product_id) {
                $query->select('category')
                    ->from('products')
                    ->where('id', $product_id);
            })
            ->limit(4)
            ->get();
    }
}
