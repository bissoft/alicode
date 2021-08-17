<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function addBanner(Request $request)
    {  if($request->isMethod('post'))
        {
            $data = $request->all();
            $banner = new Banner();
            $banner->title = $data['title'];
            $banner->head = $data['banner_head'];
            $banner->sub_head = $data['banner_subhead'];
            $banner->description = $data['banner_description'];
            $banner->save();
            return redirect('banner/view')->with('flash_message_success','Banner Added Successfully!!');
        }
        return view('admin.banners.add_banner');
    }
    public function viewBanner()
    {
        $banners = Banner::all();
        return view('admin.banners.view_banner',compact('banners'));
    }
    public function editBanner(Request $request , $id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Banner::where('id',$id)->update(['title'=>$data['title'],'head'=>$data['banner_head'],'sub_head'=>$data['banner_subhead'],'description'=>$data['banner_description']]);
            return redirect('/banner/view')->with('flash_message_success','Banner Updated Successfully!!');
        }
        $banner = Banner::where('id',$id)->first();
        return view('admin.banners.edit_banner',compact('banner'));
    }
    public function deleteBanner($id)
    {
        Banner::where('id',$id)->delete();
        return redirect('/banner/view')->with('flash_message_error','Banner Deleted Successfully!!');
    }
}
