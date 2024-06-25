<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{

    public function index()
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
    public function product($id)
    {
        $product = Product::find($id);

        $cart = [];

        if (auth()->check()) {
            // User is logged in, retrieve cart data
            $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        }

        // dd($cart);
        $data['header_title'] = 'Sub Categories';
        return view('store.product', ['cart' => $cart, 'product' => $product]);
    }
}
