<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // return $data;
            $adminCount = Admin::where(['username'=>$data['username'],'password'=>md5($data['password']),'status'=>1])->count();
            if($adminCount > 0)
            {
                Session::put('adminSession',$data['username']);
                return redirect('/index');
            }
            else{
                return redirect('/admin');
            }
        }
        return view('admin.admin_login');
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success','LogOut Successfully!!');
    }
}
