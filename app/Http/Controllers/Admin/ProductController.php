<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = Product::with('category')->get();
        $data['header_title'] = 'product';
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $data['header_title'] = 'Add New product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = new Product();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->slug = trim($request->slug); 
        $subCategory->status = trim($request->status);
        $subCategory->meta_title = trim($request->meta_title);
        $subCategory->meta_description = trim($request->meta_description);
        $subCategory->meta_keywords = trim($request->meta_keywords);
        if (auth()->check()) {
            $subCategory->created_by = auth()->user()->name;
        } 


        $subCategory->save();

        return redirect('admin/product/list')->with('status', "product Successfully Created");
    }

    public function edit($id)
    {
        $data['data'] = Product::findOrFail($id);
        $data['categories'] = Category::all();
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request)
    {

                // dd($data);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = Product::findOrFail($id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->slug = trim($request->slug); 
        $subCategory->status = trim($request->status);
        $subCategory->meta_title = trim($request->meta_title);
        $subCategory->meta_description = trim($request->meta_description);
        $subCategory->meta_keywords = trim($request->meta_keywords);
        $subCategory->created_by = auth()->user()->name;
        $subCategory->save();

        return redirect('admin/product/list')->with('status', "Product Successfully Updated");
    }



    public function delete($id){
        $data=Product::findOrFail($id);
        // dd($data);
        $data->is_delete= 1;
        $data->delete();

        return redirect()->back()->with('status',"Product Successfully deleted");


    }


    // public function delete($id)
    // {
    //     $subCategory = SubCategory::findOrFail($id);
    //     $subCategory->delete();

    //     return redirect()->back()->with('status', "Sub Category Successfully Deleted");
    }
