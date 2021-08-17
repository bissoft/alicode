@extends('front.layouts.app')
@section('content')
@if(Session::has('flash_message_error'))
 <div class="alert alert-sm alert-danger alert-block" role="alert">
     <button type="button" class="close" data-dismiss='alert' aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
     <strong>{!! session('flash_message_error') !!}</strong>
 </div>
@endif
@if(Session::has('flash_message_success'))
<div class="alert alert-sm alert-success alert-block" role="alert">
 <button type="button" class="close" data-dismiss='alert' aria-label="Close">
     <span aria-hidden="true">&times;</span>
 </button>
 <strong>{!! session('flash_message_success') !!}</strong>
</div>
@endif
    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    {{$totalamount = 0}}
                                    @foreach ($userCart as $cart)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="{{asset('uploads/products/'.$cart->image)}}" alt="Image"></a>
                                                <p>{{$cart->product_name}} || {{$cart->size}}</p>
                                            </div>
                                        </td>
                                        <td>{{$cart->price}}</td>
                                        <td>
                                            <div class="qty">
                                                {{-- <button class="btn-minus" href="{{url('cart/update-quantity/'.$cart->id.'/1')}}"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="{{$cart->quantity}}" >
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button> --}}

                                                @if ($cart->quantity>0)
                                                    <a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}" class="" style="font-size: 30px;" rel="{{$cart->id}}" >+</a>
                                                @endif
                                                <input type="number" size="4" value="{{$cart->quantity}}" min="0" step="1" class="">
                                                @if ($cart->quantity>1)
                                                    <a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}" style="font-size: 50px;" class="" >-</a>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{$cart->price * $cart->quantity}}</td>
                                        <td><a href="{{url('cart/delete/'.$cart->id)}}"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @php
                                        $totalamount = $totalamount + $cart->price*$cart->quantity;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="coupon">
                                    <input type="text" placeholder="Coupon Code">
                                    <button>Apply Code</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        <p>Sub Total<span>{{$totalamount}}</span></p>
                                        <p>Shipping Cost<span>$1</span></p>
                                        <h2>Grand Total<span>{{$totalamount}}</span></h2>
                                    </div>
                                    <div class="cart-btn">
                                        {{-- <button>Update Cart</button> --}}
                                        <a href="{{url('/cart/checkout')}}"><button>Checkout</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
