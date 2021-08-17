<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function addSalon(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $salon = new Salon();
            $salon->owner_name = $data['owner_name'];
            $salon->owner_email = $data['owner_email'];
            $salon->owner_phone = $data['owner_phone'];
            $salon->salon_name = $data['salon_name'];
            $salon->salon_address = $data['salon_address'];
            $salon->salon_type = $data['salon_type'];
            $salon->salon_description = $data['salon_description'];
            $salon->salon_status = 1;
            if($request->hasFile('image'))
            {
                $img_temp = $request->file('image');
                if($img_temp->isValid())
                {
                    $extension = $img_temp->getClientOriginalExtension();
                    $file_name = rand(111,999).".".$extension;
                    $img_path = "uploads/salons/".$file_name;
                    Image::make($img_temp)->resize(500,500)->save($img_path);
                   $salon->image = $file_name;
                }
            }
            $salon->save();
            return redirect('/salon/add')->with('flash_message_success','Salon Created Successfully');
        }
        return view('admin.salon.add_salon');
    }
    public function viewSalon()
    {
        $salons = Salon::all();
        return view('admin.salon.view_salon',compact('salons'));
    }
    public function editSalon(Request $request,$id)
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
                $img_path = 'uploads/salons/'.$filename;
                Image::make($img_temp)->resize(500,500)->save($img_path);
                }
            }
            else{
                $filename = $data['current_image'];
            }

            Salon::where('id',$id)->update(['owner_name'=>$data['owner_name'],'owner_email'=>$data['owner_email'],'owner_phone'=>$data['owner_phone']
            ,'salon_name'=>$data['salon_name'],'salon_address'=>$data['salon_address'],'salon_description'=>$data['salon_description'],'salon_type'=>$data['salon_type'],'image'=>$filename]);
            return redirect('/salon/view')->with('flash_message_success','Salon is Updated Successfully!!');
        }
        $salon = Salon::where('id',$id)->first();
        return view('admin.salon.edit_salon',compact('salon'));
    }
    public function deleteSalon($id)
    {
        Salon::where('id',$id)->delete();
        return redirect('salon/view')->with('flash_message_error','Salon is Deleted!!');
    }
    public function salonStatus(Request $request)
    {
        $data = $request->all();
        Salon::where('id',$data['id'])->update(['salon_status'=>$data['salon_status']]);
    }
}
