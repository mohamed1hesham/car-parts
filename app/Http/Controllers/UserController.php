<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userpage()
    {
        $featuredData = Product::with('category')->where('featured', 1)->get();
        $onSaleData = Product::with('category')->where('on_sale', 1)->get();
        $topRatedData = Product::with('category')->where('top_rated', 1)->get();
        $categories = Category::all();
        $cart = [];

        if (auth()->check()) {
            // User is logged in, retrieve cart data
            $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        }

        // dd($cart);
        $data['header_title'] = 'Sub Categories';
        return view('store.index-1', ['getFeaturedData' => $featuredData, 'getOnSaledData' => $onSaleData, 'getTopRatedData' => $topRatedData, 'categories' => $categories, 'cart' => $cart]);
    }
    public function removeFromCart($productId)
    {
        // Retrieve the cart item by product ID and user ID
        $cartItem = Cart::where('product_id', $productId)
            ->where('user_id', auth()->id())
            ->first();

        if ($cartItem) {
            // Delete the cart item
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }
}
