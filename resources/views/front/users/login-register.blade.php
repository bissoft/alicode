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
<!-- Login Start -->
<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5 mx-auto">
                <div class="card sahdow p-3">
                    <h1 class="mb-5 text-center font-weight-bold text-dark">Login</h1>
                    <form action="{{url('/user-login')}}" method="POST" enctype="multipart/form-data">
                        @csrf
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
</div>
<p class="text-right"><a href="#" class="">Forget Password</a></p>
<div class="form-check">
<input type="checkbox" class="form-check-input" id="exampleCheck1">
<label class="form-check-label" for="exampleCheck1">Remember me </label>
</div>
<button type="submit" class="btn btn-primary btn-block mt-4 font-weight-bold btn-lg">Login</button>
<h4 class="text-center mt-3">OR</h4>
<hr>
<h6 class="text-center mb-3">Sign Up with</h6>
<div class="d-flex justify-content-center">
<a href="#" class="mr-3"><img src="{{asset('frontassets/img/facebook.png')}}" width="50"></a>
<a href="#"><img src="{{asset('frontassets/img/google.png')}}" width="50"></a>
</div>
<h5 class="text-center mt-4"><a href="{{url('/user-register')}}">Sign Up</a></h5>
</form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login End -->
@endsection
