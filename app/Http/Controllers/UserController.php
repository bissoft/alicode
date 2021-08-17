<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function userLoginRegister()
    {
        return view('front.users.login-register');
    }
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            // return $data;
            $userCount = User::where('email',$data['email'])->count();
            if($userCount > 0)
            {
                return redirect()->back()->with('flash_message_success','User Email is Already Exist');
            }else
            {
                $user = new User();
                $user->first_name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->email = $data['email'];
                if($data['password'] !== $data['cpassword'])
                {
                    return redirect()->back()->with('flash_message_error','Confirm password is not matched');
                }
                // $user->subdomain = $data['subdomain'];
                $user->password = bcrypt($data['password']) ;
                $user->save();
                if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
                {
                    Session::put('frontSession',$data['email']);
                    return redirect('/index');
                }
            }
        }
        return view('front.users.register');
    }

    public function login(Request $request)
    {
        // $data1 = $request->all();
        // $subdomain = $data1['subdomain'];
        if($request->isMethod('post'))
        {
        $data = $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
        {
            Session::put('frontSession',$data['email']);
            return redirect('/index');
        }
        else{
            return redirect()->back()->with('flash_message_error','Invalid Username or Password');
        }
    }

    }

    public function logout()
    {
        Session::flush('frontSession');
        Auth::logout();
        return redirect('/admin');
    }
    public function accounts($subdomain)
    {
        $user_id = Auth::user()->id;
        $countries = Country::all();
        $userDetail = User::where('id',$user_id)->first();
        $orders = Order::with('ordersproducts')->where('user_id',$user_id)->whereSubdomain($subdomain)->get();
        return view('front.users.accounts',compact('countries','userDetail','orders'));
    }
    public function changeAddress(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $user_id = Auth::user()->id;
            User::where('id',$user_id)->update(['address'=>$data['address'],'city'=>$data['city'],'state'=>$data['state'],
            'country'=>$data['country'],'pincode'=>$data['pincode'],'mobile'=>$data['mobile']]);
            return redirect('user/account')->with('flash_message_success','Address is Changed Successfully!!');
        }
    }
    public function changePassword(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $userDetail = User::where('id',$user_id)->first();
            $old_pwd = $data['current_password'];
            if(Hash::check($old_pwd, $userDetail->password))
            {
                if($data['new_password'] ==  $data['confirm_password'])
                {
                    $new_pwd = bcrypt($data['new_password']);
                    User::where('id',$user_id)->update(['password'=>$new_pwd]);
                    return redirect()->back()->with('flash_message_success','Password is Changed Successfully!!');
                }
                else{
                    return redirect()->back()->with('flash_message_error','Confirm Password is not matched with New Password');
                }
            }
            else{
                return redirect()->back()->with('flash_message_error','Old Password is Incorrect!!');
            }
        }
    }
    public function viewProfile($name)
    {
        $user = User::where('subdomain',$name)->first();
        return view('front.users.profile',compact('user'));
    }
}
