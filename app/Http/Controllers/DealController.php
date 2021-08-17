<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Salon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function addDeal(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $deal = new Deal();
            if($request->hasFile('image'))
            {
                $img_temp = $request->file('image');
                if($img_temp->isValid())
                {
                    $extension = $img_temp->getClientOriginalExtension();
                    $file_name = rand(111,999).".".$extension;
                    $img_path = 'uploads/deals/'.$file_name;
                    Image::make($img_temp)->resize(500,500)->save($img_path);
                    $deal->image = $file_name;
                }
            }
            $deal->title = $data['title'];
            $deal->category_id = $data['category_id'];
            $deal->salon_id = $data['category_id'];
            $deal->start_date = $data['start_date'];
            $deal->end_date = $data['end_date'];
            $deal->start_time = $data['start_time'];
            $deal->end_time = $data['end_time'];
            $deal->deal_description = $data['description'];
            $deal->deal_cost = $data['deal_cost'];
            $deal->address = $data['address'];
            $deal->save();
        }
        $categories = Category::all();
        $salons = Salon::all();
        return view('admin.deals.add_deal',compact('categories','salons'));
    }
    public function viewDeal()
    {
        $deals = Deal::all();
        return view('admin.deals.view_deal',compact('deals'));
    }
    public function editDeal(Request $request ,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            if($request->hasFile('image'))
            {
                echo $img_temp = $request->file('image');
                // image path code
                if($img_temp->isValid())
                {
                $extension = $img_temp->getClientOriginalExtension();
                $file_name = rand(111,99999).'.'.$extension;
                $img_path = 'uploads/products/'.$file_name;
                Image::make($img_temp)->resize(500,500)->save($img_path);
                }
            }
            else{
                $file_name = $data['current_image'];
            }
            Deal::where('id',$id)->update(['title'=>$data['title'],'category_id'=>$data['category_id'],'salon_id'=>$data['salon_id'],'start_date'=>$data['start_date'],'end_date'=>$data['end_date'],'start_time'=>$data['start_time'],'end_time'=>$data['end_time'],'deal_description'=>$data['description'],'deal_cost'=>$data['deal_cost'],'image'=>$file_name]);
            return redirect('/deal/view')->with('flash_message_success','Deal is Successfully Updated!!!');
        }
        $deal = Deal::where('id',$id)->first();
        $categories = Category::all();
        $salons  = Salon::all();
        return view('admin.deals.edit_deal',compact('deal','categories','salons'));
    }
    public function deleteDeal($id)
    {
        Deal::where('id',$id)->delete();
        return redirect('/deal/view')->with('flash_message_error','Deal is Deleted!!');
    }

}
