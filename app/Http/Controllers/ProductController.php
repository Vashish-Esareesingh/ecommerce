<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // to see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // Retrieve products from products table
        $product_data = Product::withPrices()->get();

        // dd($product_data);

        // Returns data to views/ productspage
        // return view('pages.default.productspage', compact('product_data'));

        return view('pages.testing.productspage', compact('product_data'));
    }
}
