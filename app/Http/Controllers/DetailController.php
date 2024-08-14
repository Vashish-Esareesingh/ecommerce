<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id)
    {
        // to see whether a user is authenticated and what group they belong to
        $group_ids = Auth::check() ? Auth::user()->getGroups() : [1];

        // getting a single product by id
        $data = Product::singleProduct($id)->withPrices()->get()->first();

        return view('pages.testing.detailspage', compact('data'));
    }
}
