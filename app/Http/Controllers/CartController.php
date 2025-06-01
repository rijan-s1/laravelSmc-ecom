<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
{
    // Validate the request input
    $data = $request->validate([

        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);
    $data['user_id'] = auth()->id(); // Set the authenticated user's ID
    Cart::create($data);
    return redirect()->back()->with('success', 'Product added to cart.');
}

}
