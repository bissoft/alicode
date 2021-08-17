<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class PagesController extends Controller
{
    public function pages()
    {
        $pages = Page::get();
        return view('admin.pages.pages',compact('pages'));
    }
    public function addPage(Request $request)
    {
        if($request->isMethod('post'))
        {
           $data = $request->all();
           $pages = new Page();
           $pages->page_name = $data['page_name'];
           $pages->meta_title = $data['meta_title'];
           $pages->meta_keyword = $data['meta_keyword'];
           $pages->meta_description = $data['meta_description'];
           $pages->slug = $data['slug'];
           if(!empty($data['content_image']))
           {
               $pages->content_image = $data['content_image'];
           }else{
            $pages->content_image = "";
           }
           if(!empty($data['banner_image']))
           {
               $pages->content_image = $data['banner_image'];
           }else{
            $pages->banner_image = "";
           }
           if($request->hasFile('content_image'))
            {
               $img_temp = $request->file('content_image');
               if($img_temp->isValid())
               {
                   $extension = $img_temp->getClientOriginalExtension();
                   $file_name1 = rand(111,999).".".$extension;
                   $content_path = 'uploads/content/'.$file_name1;
                   Image::make($img_temp)->resize(500,500)->save($content_path);
                   $pages->content_image = $file_name1;
               }
            }
            if($request->hasFile('banner_image'))
            {
               $img_temp = $request->file('banner_image');
               if($img_temp->isValid())
               {
                   $extension = $img_temp->getClientOriginalExtension();
                   $file_name2 = rand(111,999).".".$extension;
                   $banner_path = 'uploads/banners/'.$file_name2;
                   Image::make($img_temp)->resize(500,500)->save($banner_path);
                   $pages->banner_image = $file_name2;
               }
            }
           $pages->sort_order = $data['sort_order'];
           $pages->short_content = $data['short_content'];
           $pages->long_content = $data['long_content'];
        //    $pages->page_name = $data['page_name'];
        $pages->save();
        return redirect('/page/view')->with('flash_message_success','Page is Successfully Created!!');
        }
        return view('admin.pages.add_page');
    }
    public function aboutUs()
    {
        $about = Page::where('meta_keyword','about-us')->first();
        return view('front.about',compact('about'));
    }
}
