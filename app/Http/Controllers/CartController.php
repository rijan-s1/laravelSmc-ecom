<?php

namespace App\Http\Controllers;
use App\Models\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
{
    // Validate the request input
    $data = $request->validate([

        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);
    $data['user_id'] = Auth::id(); // Set the authenticated user's ID
    $cart= Cart::where('user_id', $data['user_id'])
        ->where('product_id', $data['product_id'])
        ->first();
    if ($cart) {
        return redirect()->back()->with('error', 'Product already in cart.');
    }
    Cart::create($data);
    return redirect()->back()->with('success', 'Product added to cart.');
}

}
