<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $deals = Deal::all();
        $banner = Banner::all();
        return view('front.index',compact('products','deals','banner'));
    }
}
