<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;

class AdminController extends Controller
{

public function admin()
    {
        $data=User::getAdmin();
       // dd($data);
        $header_title = 'Admin';
        return view('admin.admin.list', ['header_title' => $header_title , 'getRecord' => $data]);
    }
    
    public function add(){
        $data['header_title']='Add New Admin';
        return view('admin.admin.add',$data);
    }


    public function insert(Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect('admin/dashboard/list')->with('status',"Admin Successfully Created");

    }


    public function edit($id){
        $data=User::getSingle($id);
        $data['header_title']='edit Admin';
        return view('admin.admin.edit',['getRecord'=> $data]);
        // return view('admin.admin.list', ['header_title' => $header_title , 'getRecord' => $data]);

    }


    public function Update($id, Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users'.$id
        ]);
        $user=User::getSingle($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->status = $request->status;
        $user->is_admin = 1;
        $user->save();
        return redirect('admin/dashboard/list')->with('status',"Admin Successfully updated");

    }


    
    public function delete($id){
        $data=User::getSingle($id);
        $data->is_delete= 1;
        $data->save();

        return redirect()->back()->with('status',"Admin Successfully deleted");


    }

    
}
