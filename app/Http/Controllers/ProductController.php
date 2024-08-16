<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\products\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // to see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // Store values
        $values = $request->query();

        // Retrieve products from products table
        $product_data = Product::withPrices()->get();
        $product_data = ProductFilter::withPrices()->filter($values)->get();
        $category_data = Product::distinct('category')->pluck('category');

        // dd($product_data);

        // Returns data to views/ productspage
        // return view('pages.default.productspage', compact('product_data'));

        return view('pages.testing.productspage', compact('product_data', 'category_data'));
    }
}
