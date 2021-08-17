@extends('admin.layouts.app')
@section('heading','View Products')
@section('title','View Products')
@section('style')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
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
<div id="message_success" style="display: none"; class="alert alert-sm alert-success">Status Enabled</div>
<div id="message_error" style="display: none"; class="alert alert-sm alert-danger">Status Disabled</div>

<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Products</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        Order Id
                    </th>
                    <th style="width: 20%">
                        Order Date
                    </th>
                    <th style="width: 30%">
                        Order Name
                    </th>
                    <th style="width: 30%">
                        Order Email
                    </th>
                    <th style="width: 30%">
                        Ordered Products
                    </th>
                    <th style="width: 30%">
                        Grand Total
                    </th>
                    <th style="width: 30%">
                        Order Status
                    </th>
                    <th style="width: 30%">
                        Payment Method
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->user_email}}</td>
                    <td>
                        @foreach ($order->ordersproducts as $product)

                            {{$product->product_code}}
                            {{$product->product_qty}}
                        <br><br>
                        @endforeach
                    </td>

                    <td>{{$order->grand_total}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{$order->payment_method}}</td>
                    <td><a class="btn btn-primary" href="{{url('/orders/view/'.$order->id)}}">View Details</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
@endsection
@section('scripts')
@section('scripts')
<script>
    $(document).ready(function()
    {

        $('.ProductStatus').change(function(){
           var id =  $(this).attr('rel');
           if($(this).prop("checked")==true)
            {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/product/status',
                data : {status:'1',id:id},
                success:function(data){
                    $("#message_success").show();
                    setTimeout( function() {$('#message_success').fadeOut('slow'); }, 2000);
                },error:function(){
                    alert('Error');
                }
                });
            }
           else{
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/product/status',
                data : {status:'0',id:id},
                success:function(resp){
                   $("#message_error").show();
                   setTimeout( function() {$('#message_error').fadeOut('slow'); }, 2000);
                },
                error:function(){
                   alert('Error');
                }
            });
        }


        });

    });
</script>
@endsection
@endsection
