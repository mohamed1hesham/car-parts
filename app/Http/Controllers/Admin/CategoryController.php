<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
class CategoryController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = Category::all();
        $data['header_title'] = 'Category';
        return view('admin.category.list', $data);
    }
    
    public function add(){
        $data['header_title']='Add New Category';
        return view('admin.category.add',$data);
    }
    public function insert(Request $request)
    {
        // dd($request->all());
        

        $request->validate([
            'name'=>'required|unique:categories'
        ]);
        
        $category = new Category();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug); 
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        if (auth()->check()) {
            $category->created_by = auth()->user()->name;
        } 
        $category->save();
        return redirect('admin/category/list')->with('status', "category Successfully Created");
        

    }

    public function edit($id){
    //    dd($id);
        
    $data= Category::getSingle($id);
        $data['header_title'] = 'Edit Category';
      //  dd(  $data['getRecord']->name);
        return view('admin.category.edit',['data'=> $data]);
        // return view('admin.admin.list', ['header_title' => $header_title , 'getRecord' => $data]);

    }


    public function Update($id, Request $request)
    {
    
        $category=Category::getSingle($id);
        $category->name = $request->name;
        $category->slug = trim($request->slug); 
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = auth()->user()->name;
        $category->save();
        return redirect('admin/category/list')->with('status',"category Successfully updated");

    }


    public function delete($id){
        $data=Category::getSingle($id);
        // dd($data);
        $data->is_delete= 1;
        $data->delete();

        return redirect()->back()->with('status',"category Successfully deleted");


    }


}
