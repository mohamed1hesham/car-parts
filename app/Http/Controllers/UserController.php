<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userpage()
    {
        $featuredData = Product::with('category')->where('featured', 1)->get();
        $onSaleData = Product::with('category')->where('on_sale', 1)->get();
        $topRatedData = Product::with('category')->where('top_rated', 1)->get();

        $data['header_title'] = 'Sub Categories';
        return view('store.index-1', ['getFeaturedData' => $featuredData, 'getOnSaledData' => $onSaleData, 'getTopRatedData' => $topRatedData]);
    }
}
