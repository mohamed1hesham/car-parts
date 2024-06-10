<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = Product::with('category')->get();
        $data['header_title'] = 'Sub Categories';
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $data['header_title'] = 'Add New Sub Categories';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure the file is an image and limit its size
           
        ]);
        // on_sale
        // top_rated
      // Handle the file upload
      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('ProductImages'), $imagename);
    } else {
        return redirect()->back()->withErrors(['image' => 'File upload failed']);
    }
        $Product = new Product();
        $Product->name = $request->name;
        $Product->category_id = $request->category_id;
        $Product->image = $imagename; 




        $Product->price = trim($request->price);
        $Product->description = trim($request->description);
        $Product->featured = trim($request->featured);
        $Product->on_sale = trim($request->on_sale);
        $Product->top_rated = trim($request->top_rated);
        $Product->status = trim($request->status);
        if (auth()->check()) {
            $Product->created_by = auth()->user()->name;
        } 


        $Product->save();

        return redirect('admin/product/list')->with('status', "Sub Category Successfully Created");
    }

    public function edit($id)
    {
        $data['data'] = Product::findOrFail($id);
        $data['categories'] = Category::all();
        $data['header_title'] = 'Edit product';
        return view('admin.product.edit', $data);
    }

    public function update($id, Request $request)
    {

                // dd($data);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $Product = Product::findOrFail($id);
        $Product->name = $request->name;
        $Product->category_id = $request->category_id;
        $Product->image = trim($request->image); 
        $Product->price = trim($request->price);
        $Product->description = trim($request->description);
        $Product->featured = trim($request->featured);
        $Product->on_sale = trim($request->on_sale);
        $Product->top_rated = trim($request->top_rated);
        $Product->status = trim($request->status);
        $Product->save();

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
