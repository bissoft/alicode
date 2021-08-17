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
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    {{-- <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a> --}}
                    <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                    {{-- <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a> --}}
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
                    <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Change Password</a>
                    <a class="nav-link" href="index.html"><i class="fa fa-sign-out-alt"></i>Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    {{-- <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                        <h4>Dashboard</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div> --}}
                    <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Products</th>
                                        <th>Order Status</th>
                                        <th>Order Amount</th>
                                        <th>Payment Method</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>@foreach ($order->ordersproducts as $product)
                                            {{$product->code || $product->name}}
                                        @endforeach</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>{{$order->grand_total}}</td>
                                        <td>{{$order->payment_method}}</td>
                                        <td>{{$order->created_at}}</td>
                                        {{-- <td>Approved</td> --}}
                                        <td><button class="btn">View</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                        </p>
                    </div> --}}
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <form action="{{url('user/change-address/'.$userDetail->id)}}" method="POST" >
                            @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$userDetail->address}}" placeholder="Enter your Address" id="address" name="address" required data-error="Please Enter Your Address">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$userDetail->city}}" id="city" placeholder="Enter your city"  name="city" required data-error="Please Enter Your City">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$userDetail->state}}" id="state" placeholder="Enter your state" name="state" required data-error="Please Enter Your State">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="country" id="country" class="form-control" >

                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option @if($userDetail->country_name == $country->country_name) selected @endif value="{{$country->country_name}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{$userDetail->pincode}}" placeholder="Enter your pincode" id="pincode" name="pincode" required data-error="Please Enter Your Pin Code">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter your mobile" value="{{$userDetail->mobile}}" id="mobile" name="mobile" required data-error="Please Enter Your Mobile No">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Address">
                            </div> --}}
                            <div class="col-md-12">
                                <button class="btn" type="submit ">Update Address</button>
                                <br><br>
                            </div>
                            {{-- <div class="col-md-6">
                                <h5>Shipping Address</h5>
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div> --}}
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        {{-- <h4>Account Details</h4> --}}
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Address">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Update Account</button>
                                <br><br>
                            </div>
                        </div> --}}
                        <h4>Password change</h4>
                        <form action="{{url('/user/change-password')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="password" name="current_password" placeholder="Current Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="password " name="new_password" placeholder="New Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn" type="submit">Save Changes</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
