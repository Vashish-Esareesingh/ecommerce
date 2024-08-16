<?php

namespace App\Http\Controllers;

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

        return view('pages.testing.homepage', [
            'random' => $random,
            'recent' => $recent,
            'best_selling_products' => $best_selling_products,
        ]);
    }

    // Random products
    public function randomProducts()
    {
        return DB::table('products')->inRandomOrder()->limit(4)->get();
    }

    // Latest products
    public function recentProducts()
    {
        return DB::table('products')->orderBy('created_at', 'desc')->limit(4)->get();
    }

    // Best Sellers
    public function bestSellingProducts()
    {
        return DB::table('order_products')
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->select('products.*', DB::raw('SUM(order_products.quantity) as quantity_sold'))
            ->groupBy('order_products.product_id', 'products.id')
            ->orderByDesc('quantity_sold')
            ->limit(4) // Optional: Limit to top 4 best sellers
            ->get();
    }
}
