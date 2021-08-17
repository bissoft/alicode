<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Salon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function addFreelancer(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();

            $freelancer = new Freelancer();
            $freelancer->name = $data['name'];
            $freelancer->email = $data['email'];
            $freelancer->phone = $data['phone'];
            $freelancer->address = $data['address'];
            $freelancer->gender = $data['gender'];
            $freelancer->salon_id = $data['salon_id'];
            $freelancer->services = $data['services'];
            if($request->hasFile('image'))
            {
                $img_temp = $request->file('image');
                if($img_temp->isValid())
                {
                    $extension = $img_temp->getClientOriginalExtension();
                    $file_name = rand(111,999).".".$extension;
                    $img_path = 'uploads/freelancers/'.$file_name;
                    Image::make($img_temp)->resize(500,500)->save($img_path);
                    $freelancer->image = $file_name;
                }
            }
            $freelancer->save();
            return redirect()->back()->with('flash_message_success','Freelancer is Added Successfully!!');
        }
        $salons = Salon::all();
        return view('admin.freelancers.add_freelancer',compact('salons'));
    }
    public function viewFreelancer()
    {
        $freelancers = Freelancer::all();
        return view('admin.freelancers.view_freelancers',compact('freelancers'));
    }
    public function freelancerStatus(Request $request)
    {
        $data = $request->all();
        Freelancer::where('id',$data['id'])->update(['status'=>$data['status']]);
    }
    public function editFreelancer(Request $request , $id)
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
                $filename = rand(111,99999).'.'.$extension;
                $img_path = 'uploads/freelancers/'.$filename;
                Image::make($img_temp)->resize(500,500)->save($img_path);
                }
            }
            else{
                $filename = $data['current_image'];
            }
            Freelancer::where('id',$id)->update(['name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone'],'address'=>$data['address'],'gender'=>$data['gender'],'salon_id'=>$data['salon_id'],'image'=>$filename]);
            return redirect('/freelancer/view')->with('flash_message_success','Freelancer is Updated Successfully!!');
        }
        $freelancer = Freelancer::where('id',$id)->first();
        $salons = Salon::all();
        return view('admin.freelancers.edit_freelancer',compact('freelancer','salons'));
    }

    public function deleteFreelancer($id)
    {
        Freelancer::where('id',$id)->delete();
        return redirect('/freelancer/view')->with('flash_message_error','Freelancer is Deleted !!!');
    }
}
