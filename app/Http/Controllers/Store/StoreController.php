<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $featuredData= Product::with('category')->where('featured',1)->get();
        $onSaleData= Product::with('category')->where('on_sale',1)->get();
        $topRatedData= Product::with('category')->where('top_rated',1)->get();

                $data['header_title'] = 'Sub Categories';
        return view('store.index-1',['getFeaturedData'=> $featuredData,'getOnSaledData'=>$onSaleData,'getTopRatedData'=>$topRatedData] );
    }
}
