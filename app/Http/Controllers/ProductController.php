<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve products from products table
        $product_data = Product::all();

        // Returns data to views/ productspage
        return view('pages.testing.productspage', compact('product_data'));
    }
}
