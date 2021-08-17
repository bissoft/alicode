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
<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <h1 align='center'>Thanks for Purchasing Us !!</h1> <br><br>
        <div class="row">
            <div class="col-lg-12">
                <div align='center'>
                    <h2>YOUR ORDER HAS BEEN PLACED</h2>
                    <P>Your Order Number is {{Session::get('order_id')}} and Total Payable about is PKR {{Session::get('grand_total')}}</P>
                </div>
            </div>
        </div>



        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">

            </div>

        </div>

    </div>
</div>
<!-- End Cart -->
@endsection
@php
    Session::forget('order_id');
    Session::forget('grand_total');
@endphp
@section('scripts')
    <script>
        // $(document).ready(function()
        // {
        //     $('.upd-qty').click(function(){

        //     var id = $(this).attr('rel');
        //     var quantity = 1;
        //         $.ajax({
        //            type : 'get',
        //            url : '/cart/update-quantity/'+id+'/1',
        //            data : {id:id,quantity:quantity},
        //            success:function(resp){
        //                alert(resp);

        //            },error:function(resp){
        //                alert('Error');
        //            }
        //        });

        //     });
        // });
    </script>
@endsection
