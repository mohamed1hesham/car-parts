<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class SubCategoryController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = SubCategory::with('category')->get();
        $data['header_title'] = 'Sub Categories';
        return view('admin.sub_category.list', $data);
    }

    public function add()
    {
        $data['categories'] = Category::all();
        $data['header_title'] = 'Add New Sub Categories';
        return view('admin.sub_category.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = new SubCategory();
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

        return redirect('admin/sub_category/list')->with('status', "Sub Category Successfully Created");
    }

    public function edit($id)
    {
        $data['subCategory'] = SubCategory::findOrFail($id);
        $data['categories'] = Category::all();
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.sub_category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();

        return redirect('admin/sub_category/list')->with('status', "Sub Category Successfully Updated");
    }



    public function delete($id){
        $data=SubCategory::findOrFail($id);
        // dd($data);
        $data->is_delete= 1;
        $data->delete();

        return redirect()->back()->with('status',"category Successfully deleted");


    }


    // public function delete($id)
    // {
    //     $subCategory = SubCategory::findOrFail($id);
    //     $subCategory->delete();

    //     return redirect()->back()->with('status', "Sub Category Successfully Deleted");
    }

