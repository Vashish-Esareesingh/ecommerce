<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        // To see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];
        // Determine which user is logged in
        $user = Auth::user();
        // Retireve the products that the user added to their cart
        $cart_data = $user->products()->withPrices()->get();
        // Calculate Subtotal
        $cart_data->calculateSubtotal();

        // Load page
        return view('pages.default.cartpage', compact('cart_data'));
    }

    public function store(Request $request)
    {
        // The amount of a product that is chosen by the user
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => DB::raw('quantity +'.$request->quantity), 'updated_at' => now()]
        );

        // Sends user to the cart page
        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }

    public function destroy(string $id)
    {
        // Remove product from the cart
        Cart::destroy($id);

        return redirect()->route('cart.index')->with('message', 'Product removed from cart');
    }

    public function addToCartFromStore(Request $request)
    {
        // The amount of a product that is chosen by the user
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->id],
            ['quantity' => DB::raw('quantity +'. 1), 'updated' => now()]
        );

        // Sends user to the cart page
        return redirect()->route('cart.index')->with('message', 'Product added to cart');
    }
}
