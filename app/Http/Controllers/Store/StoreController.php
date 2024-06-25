<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function addToCart(Request $request)
    {
        if (!auth()->user()) {
            return redirect()->back()->with('error', 'Please login first.');
        }

        // Validate the incoming request data if necessary

        // Get the product ID and user ID from the form submission
        $productId = $request->input('product_id');
        $userId = $request->input('user_id', auth()->user()->id);

        // Save the product ID and user ID in the cart model
        $cartItem = new Cart();
        $cartItem->product_id = $productId;
        $cartItem->user_id = $userId;
        $cartItem->save();

        return redirect()->back()->with(['success' => 'Product added to cart']);
    }

    public function checkout()
    {

        return view('store.checkout');
    }
}
