<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $random = $this->randomProducts();
        $recent = $this->recentProducts();
        $best_selling_products = $this->bestSellingProducts();

        return view('pages.default.homepage', [
            'random' => $random,
            'recent' => $recent,
            'best_selling_products' => $best_selling_products,
        ]);
    }

    // Random products
    public function randomProducts()
    {
        return Product::inRandomOrder()->limit(3)->get(); // Ensure this returns Product models
    }

    // Latest products
    public function recentProducts()
    {
        return Product::orderBy('created_at', 'desc')->limit(3)->get(); // Ensure this returns Product models
    }

    // Best Sellers
    public function bestSellingProducts()
    {
        // Fetch raw data with the product ids
        $bestSelling = DB::table('order_products')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->select('products.id', 'products.title', 'products.image_path', 'products.image_name', 'products.price', DB::raw('SUM(order_products.quantity) as quantity_sold'))
            ->groupBy('products.id', 'products.title', 'products.image_path', 'products.image_name', 'products.price')
            ->orderByDesc('quantity_sold')
            ->limit(3)
            ->get();

        // Convert to Product model instances
        return $bestSelling->map(function ($item) {
            return Product::find($item->id);
        });
    }
}
