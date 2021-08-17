@extends('admin.layouts.app')
@section('head-title','View Orders')
@section('style')
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')
 <!-- Main content -->
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
<div id="message_success" style="display: none"; class="alert alert-sm alert-success">Status Enabled</div>
<div id="message_error" style="display: none"; class="alert alert-sm alert-danger">Status Disabled</div>

 <section class="content">
    <div class="row">
       <div class="col-sm-6">
          <div class="panel panel-bd lobidrag">
             <div class="panel-heading">
                <div class="btn-group" id="buttonexport">
                   <a href="#">
                      <h4>View Orders</h4>
                   </a>
                </div>
             </div>
             <div class="panel-body">
             <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                {{-- <div class="btn-group">
                   <div class="buttonexport" id="buttonlist">
                      <a class="btn btn-add" href="{{url('admin/add-coupon')}}"> <i class="fa fa-plus"></i> Add a Coupon
                      </a>
                   </div>

                </div> --}}
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->


                <div class="table-responsive">
                   <table id="myTable" class="table table-bordered table-striped table-hover">
                     <tbody>
                         <tr>
                             <td class="taskDesc">Order Date</td>
                            <td class="taskStatus">{{$orderDetails->created_at->format('Y-m-d')}}</td>
                         </tr>
                         <tr>
                            <td class="taskDesc">Order Status</td>
                            <td class="taskStatus">{{$orderDetails->order_status}}</td>

                         </tr>
                         <tr>
                            <td class="taskDesc">Order Total</td>
                            <td class="taskStatus">{{$orderDetails->grand_total}}</td>
                         </tr>
                         <tr>
                            <td class="taskDesc">Shipping Charges</td>
                            <td class="taskStatus">{{$orderDetails->shipping_charges}}</td>
                         </tr>
                         <tr>
                            <td class="taskDesc">Coupon Code</td>
                            <td class="taskStatus">{{$orderDetails->coupon_code}}</td>

                         </tr>
                         <tr>
                            <td class="taskDesc">Coupon Amount</td>
                            <td class="taskStatus">{{$orderDetails->coupon_amount}}</td>

                         </tr>
                         <tr>
                            <td class="taskDesc">Payment Method</td>
                            <td class="taskStatus">{{$orderDetails->payment_method}}</td>
                         </tr>
                     </tbody>
                   </table>
                </div>
             </div>
          </div>

          {{-- Billing Details --}}
          <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4>Billing Details</h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               {{-- <div class="btn-group">
                  <div class="buttonexport" id="buttonlist">
                     <a class="btn btn-add" href="{{url('admin/add-coupon')}}"> <i class="fa fa-plus"></i> Add a Coupon
                     </a>
                  </div>

               </div> --}}
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->


               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td class="taskDesc">Name</td>
                           <td class="taskStatus">{{$userDetails->name}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">Address</td>
                           <td class="taskStatus">{{$userDetails->address}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">City</td>
                           <td class="taskStatus">{{$userDetails->city}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">State</td>
                           <td class="taskStatus">{{$userDetails->state}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">Country</td>
                           <td class="taskStatus">{{$userDetails->country}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">Country Code</td>
                           <td class="taskStatus">{{$orderDetails->coupon_amount}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">Mobile</td>
                           <td class="taskStatus">{{$userDetails->mobile}}</td>
                        </tr>
                    </tbody>
                  </table>
               </div>
            </div>
         </div>
       </div>
       <div class="col-sm-6">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4>Order Detail</h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
            <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
               {{-- <div class="btn-group">
                  <div class="buttonexport" id="buttonlist">
                     <a class="btn btn-add" href="{{url('admin/add-coupon')}}"> <i class="fa fa-plus"></i> Add a Coupon
                     </a>
                  </div>

               </div> --}}
               <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->


               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td class="taskDesc">Customer Name</td>
                           <td class="taskStatus">{{$orderDetails->name}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">Customer Email</td>
                           <td class="taskStatus">{{$orderDetails->user_email}}</td>

                        </tr>

                    </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4>Order Status</h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
                <form action="{{url('/admin/update-order-status')}}" method="post">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$orderDetails->id}}">
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <select name="order_status" id="order_status" class="form-control">
                                    <option value="New" @if ($orderDetails->order_status == 'New') selected @endif>New</option>
                                    <option value="Pending" @if ($orderDetails->order_status == 'Pending') selected @endif>Pending</option>
                                    <option value="In Process" @if ($orderDetails->order_status == 'In Process') selected @endif>In Process</option>
                                    <option value="Shipped" @if ($orderDetails->order_status == 'Shipped') selected @endif>Shipped</option>
                                    <option value="Delivered" @if ($orderDetails->order_status == 'Delivered') selected @endif>Delivered</option>
                                    <option value="Paid" @if ($orderDetails->order_status == 'Paid') selected @endif>Paid</option>
                                    <option value="Cancelled" @if ($orderDetails->order_status == 'Cancelled') selected @endif>Cancelled</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" value="Update" class="btn btn-success">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
         </div>
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
               <div class="btn-group" id="buttonexport">
                  <a href="#">
                     <h4>Shipping Details</h4>
                  </a>
               </div>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="myTable" class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td class="taskDesc">Name</td>
                           <td class="taskStatus">{{$userDetails->name}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">Address</td>
                           <td class="taskStatus">{{$userDetails->address}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">City</td>
                           <td class="taskStatus">{{$userDetails->city}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">State</td>
                           <td class="taskStatus">{{$userDetails->state}}</td>
                        </tr>
                        <tr>
                           <td class="taskDesc">Country</td>
                           <td class="taskStatus">{{$userDetails->country}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">Country Code</td>
                           <td class="taskStatus">{{$orderDetails->coupon_amount}}</td>

                        </tr>
                        <tr>
                           <td class="taskDesc">Mobile</td>
                           <td class="taskStatus">{{$userDetails->mobile}}</td>
                        </tr>
                    </tbody>
                  </table>
               </div>
            </div>
         </div>
       </div>

    </div>

 </section>
 <section>
     <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>Ordered Products</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                        <table>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            {{-- <th>Order Id</th> --}}
                                            <th>Product Code</th>
                                            <th>Product Size</th>
                                            <th>Product Color</th>
                                            <th>Product Price</th>
                                            <th>Product Quantity</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                    @foreach ($orderDetails->ordersproducts as $product)
                                    <tr>
                                        <td>{{$product->product_code}}</td>
                                        <td>{{$product->product_size}}</td>
                                        <td>{{$product->product_color}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td>{{$product->product_qty}}</td>
                                    </tr>
                                    @endforeach
                                   </tbody>
                                </table>
                             </div>
                        </table>
                </div>
             </div>
         </div>
     </div>
 </section>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready( function () {
    $('#myTable').DataTable({
        'paging':false,
    });

    $(".CouponStatus").change(function(){
            var id = $(this).attr('rel');
            if($(this).prop("checked")==true)
            {
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
                    },
                    type : 'post',
                    url : '/admin/update-coupon-status',
                    data : {status:'1',id:id},
                    success:function(data){
                        $("#message_success").show();
                        setTimeout( function() {$('message_success').fadeOut('slow'); }, 2000);
                    },error:function(){
                        alert('Error');
                    }
                });
            }
            else{
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
                    } ,
                    type : 'post',
                    url : '/admin/update-coupon-status',
                    data : {status:'0',id:id},
                    success:function(resp){
                       $("#message_error").show();
                       setTimeout( function() {$('message_error').fadeOut('slow'); }, 2000);
                    },
                    error:function(){
                       alert('Error');
                    }
                });
            }
        });
    //     $(".FeaturedStatus").change(function(){
    //         var id = $(this).attr('rel');
    //         if($(this).prop("checked")==true)
    //         {
    //             $.ajax({
    //                 headers : {
    //                     'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
    //                 },
    //                 type : 'post',
    //                 url : '/admin/update-featured-product-status',
    //                 data : {status:'1',id:id},
    //                 success:function(data){
    //                     $("#message_success").show();
    //                     setTimeout( function() {$('message_success').fadeOut('slow'); }, 2000);
    //                 },error:function(){
    //                     alert('Error');
    //                 }
    //             });
    //         }
    //         else{
    //             $.ajax({
    //                 headers : {
    //                     'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
    //                 } ,
    //                 type : 'post',
    //                 url : '/admin/update-featured-product-status',
    //                 data : {status:'0',id:id},
    //                 success:function(resp){
    //                    $("#message_error").show();
    //                    setTimeout( function() {$('message_error').fadeOut('slow'); }, 2000);
    //                 },
    //                 error:function(){
    //                    alert('Error');
    //                 }
    //             });
    //         }
    //     });
    });
    </script>
@endsection
