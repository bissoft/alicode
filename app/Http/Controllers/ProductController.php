<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductsAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $product = new Product();
            $product->name = $data['name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->description = $data['description'];
            $product->price = $data['product_price'];
            $product->category_id = $data['category_id'];
            // if($request->hasFile('image'))
            // {
            //     $img_temp =$request->file('image');
            //     if($img_temp->isValid())
            //     {
            //         $extension = $img_temp->getClientOriginalExtension();
            //         $file_name = rand(111,999).'.'.$extension;
            //         $image_path = 'uploads/products/'.$file_name;
            //         Image::make($img_temp)->resize(500,500)->save($image_path);
            //         $product->image = $file_name;
            //     }
            // }
            if($request->hasFile('image'))
            {
               $img_temp = $request->file('image');
               if($img_temp->isValid())
               {
                   $extension = $img_temp->getClientOriginalExtension();
                   $file_name = rand(111,999).".".$extension;
                   $img_path = 'uploads/products/'.$file_name;
                   Image::make($img_temp)->resize(500,500)->save($img_path);
                   $product->image = $file_name;
               }
            }
            $product->save();
            return redirect('/product/view')->with('flash_message_success','Product Added Successfully!!');
        }
        $categories = Category::all();
        return view('admin.products.add_product',compact('categories'));
    }
    public function viewProduct()
    {
        $products = Product::all();
        return view('admin.products.view_product',compact('products'));
    }
    public function editProduct(Request $request , $id)
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
                $img_path = 'uploads/products/'.$filename;
                Image::make($img_temp)->resize(500,500)->save($img_path);
                }
            }
            else{
                $filename = $data['current_image'];
            }

            Product::where('id',$id)->update(['name'=>$data['name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color']
            ,'price'=>$data['product_price'],'description'=>$data['description'],'image'=>$filename]);
            return redirect('/product/view')->with('flash_message_success','Product is Updated Successfully!!');
        }
        $categories = Category::all();
        $product = Product::where('id',$id)->first();
        return view('admin.products.edit_product',compact('product','categories'));
    }
    public function deleteProduct($id)
    {
        Product::where('id',$id)->delete();
        return redirect('/product/view')->with('flash_message_error','Product is Deleted Successfully!!!');
    }
    public function productStatus(Request $request)
    {
        $data = $request->all();
        Product::where('id',$data['id'])->update(['status'=>$data['status']]);
    }

    public function addAttributes(Request $request ,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            foreach($data['sku'] as $key => $val)
            {
                if(!empty($val))
                {
                   $skuCount = ProductsAttributes::where('sku',$val)->count();
                    if($skuCount > 0)
                    {
                        return redirect()->back()->with('flash_message_error','Product SKU is Already Exist!!');
                    }
                    $sizeCount = ProductsAttributes::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if($sizeCount > 0 )
                    {
                        return redirect()->back()->with('flash_message_error','Product Size is Already Exist!!');
                    }
                    $attribute = new ProductsAttributes();
                    $attribute->product_id = $id;
                    $attribute->sku = $val;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->save();
                }

            }
            return redirect('product/attributes/'.$id)->with('flash_message_success','Product Attributes are Stored Successfully!!');
        }
        $product = Product::where('id',$id)->first();
        return view('admin.products.add_attributes',compact('product'));
    }
    public function viewAttributes($id)
    {
        $product = Product::with('attributes')->where('id',$id)->first();
        return view('admin.products.add_attributes',compact('product'));
    }
    public function editAttributes(Request $request ,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            foreach($data['attr'] as $key=>$attr)
            {
                ProductsAttributes::where(['id'=>$data['attr'][$key]])->update(['sku'=>$data['sku'][$key],'size'=>$data['size'][$key],'stock'=>$data['stock'][$key],'price'=>$data['price'][$key]]);
            }
            return redirect()->back()->with('flash_message_success','Attributes are updated Successfully!!');
        }

    }
    public function deleteAttributes($id)
    {
        ProductsAttributes::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_error','Product Attribute is Successfully Deleted!!');
    }
    public function addImages(Request $request ,$id)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            if($request->hasFile('image'))
            {
                $file = $request->file('image');


                    $image = new ProductImages();
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $img_path = 'uploads/products/'.$filename;
                    Image::make($file)->resize(500,500)->save($img_path);
                    $image->image = $filename;
                    $image->product_id = $id;
                    $image->save();

            }
            return redirect('/product/add-images/'.$id)->with('flash_message_success','Image has been stored');
        }
        $product = Product::where('id',$id)->first();
        $productImages = ProductImages::where('product_id',$id)->get();
        return view('admin.products.add_images',compact('product','productImages'));
    }
    public function deleteImages($id)
    {
        ProductImages::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_error','Product Alternate image is deleted!!');
    }

    public function productDetail($id)
    {
        $product = Product::where('id',$id)->first();
        return view('front.products.product_details',compact('product'));
    }
    public function addCart(Request $request)
    {
        $data = $request->all();
        if(empty(Auth::user()->email))
        {
            $data['user_email'] = " ";
        }else{
            $data['user_email'] = Auth::user()->email;
        }

        $session_id = Session::get('session_id');
        if(empty($session_id))
        {
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }
        $sizeArr = explode('-',$data['size']);
        $Cartcount =  DB::table('carts')->where(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],
        'price'=>$data['product_price'],'product_color'=>$data['product_color'],'size'=>$sizeArr[1],'session_id'=>$session_id])->count();
        if($Cartcount > 0)
        {
            return redirect()->back()->with('flash_message_error','Product is Already exist!!');
        }
        else{
            DB::table('carts')->insert(['product_id'=>$data['product_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'size'=>$sizeArr[1],
            'price'=>$data['product_price'],'quantity'=>$data['quantity'],'user_email'=>$data['user_email'],'session_id'=>$session_id ]);
            return redirect('/cart/view')->with('flash_message_success','Products are added to cart Successfully');
        }
    }
    public function viewCart()
    {
        $session_id = Session::get('session_id');
        $userCart = Cart::where('session_id',$session_id)->get();
        foreach($userCart as $key=>$products)
        {
           $productDetails =  Product::where('id',$products->product_id)->first();
           $userCart[$key]->image = $productDetails->image;
        }
        return view('front.carts.view_cart',compact('userCart'));
    }
    public function updateCartQuantity($id ,$quantity)
    {
        Cart::where('id',$id)->increment('quantity',$quantity);
        return redirect('/cart/view')->with('flash_message_success','cart quantity is updated!!');
    }
    public function deleteCart($id)
    {
        Cart::where('id',$id)->delete();
        return redirect()->back()->with('flash_message_error','product is removed from cart');
    }
    public function checkOut(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $countries = Country::all();
        $userDetail = User::where('id',$user_id)->first();
        $shippingCount = DeliveryAddress::where('user_id',$user_id)->count();
        $shippingDetails = DeliveryAddress::where('user_id',$user_id)->first();

        /// cart total
        $userCart = Cart::where('user_email',$user_email)->get();
        $totalamount = 0 ;
        foreach($userCart as $cart)
        {
            $total = $cart->quantity * $cart->price;
            $totalamount = $totalamount + $total;
        }

        if($request->isMethod('post'))
        {
            $data = $request->all();
            User::where('id',$user_id)->update(['name'=>$data['billing_name'],'email'=>$data['billing_email'],'mobile'=>$data['billing_mobile'],
            'address'=>$data['billing_address'],'city'=>$data['billing_city'],'country'=>$data['billing_country'],'state'=>$data['billing_state']]);
            if($shippingCount > 0)
            {
                DeliveryAddress::where('user_id',$user_id)->update(['name'=>$data['shipping_name'],'user_email'=>$data['shipping_email'],'mobile'=>$data['shipping_mobile'],
                'address'=>$data['shipping_address'],'city'=>$data['shipping_city'],'country'=>$data['shipping_country'],'state'=>$data['shipping_state']]);
            }
            else{
                $shipping = new DeliveryAddress();
                $shipping->name = $data['shipping_name'];
                $shipping->user_id = $user_id;
                $shipping->user_email = $data['shipping_email'];
                $shipping->mobile = $data['shipping_mobile'];
                $shipping->address = $data['shipping_address'];
                $shipping->city = $data['shipping_city'];
                $shipping->state = $data['shipping_state'];
                $shipping->pincode = $data['shipping_pincode'];
                $shipping->country = $data['shipping_country'];
                $shipping->save();

            }
            $order = new Order();
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->country = $shippingDetails->country;
            $order->state = $shippingDetails->state;
            $order->pincode = $shippingDetails->pincode;
            $order->mobile = $shippingDetails->mobile;
            $order->order_status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'];
            $order->save();

            $order_id = DB::getPdo()->lastinsertID();
            $cartProducts = Cart::where('user_email',$user_email)->get();
            foreach($cartProducts as $product)
            {
                $CartPro = new OrdersProduct();
                $CartPro->order_id = $order_id;
                $CartPro->user_id = $user_id;
                $CartPro->product_id = $product->product_id;
                $CartPro->product_name = $product->product_name;
                $CartPro->product_code = $product->product_code;
                $CartPro->product_color = $product->product_color;
                $CartPro->product_size = $product->size;
                $CartPro->product_price = $product->price;
                $CartPro->product_qty = $product->quantity;
                $CartPro->save();
            }
            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['grand_total']);
            return redirect('/thanks');
        }
        return view('front.carts.checkout',compact('userDetail','countries','totalamount','shippingDetails'));
    }
    public function thanks()
    {
        $user_email = Auth::user()->email;
        Cart::where('user_email',$user_email)->delete();
        return view('front.orders.thanks');
    }
    public function viewOrders()
    {
        $orders = Order::with('ordersproducts')->orderBy('id','DESC')->get();
        return view('admin.orders.view_orders',compact('orders'));
    }
    public function viewOrdersDetail($id)
    {
        $orderDetails = Order::with('ordersproducts')->where('id',$id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        return view('admin.orders.order_detail',compact('orderDetails','userDetails'));
    }
}
