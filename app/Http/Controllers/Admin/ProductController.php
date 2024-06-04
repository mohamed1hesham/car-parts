<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        // $data['getRecord'] = Product::all();
        // $data['header_title'] = 'Product';
        return view('admin.product.list');
    }
}
