<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Auth;

class SubCategoryController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = SubCategory::all();
        $data['header_title'] = 'Sub Category';
        return view('admin.sub_category.list', $data);
    }
}
    