@extends('admin.layouts.app')
@section('heading','Add Freelancer')
@section('title','Add Freelancer')
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Freelancer <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/freelancer/edit/'.$freelancer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" value="{{$freelancer->name}}" class="form-control" id="name" placeholder="Enter Freelancer Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" value="{{$freelancer->email}}" id="email" placeholder="Enter Freelancer Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{$freelancer->phone}}" placeholder="Enter Freelancer Phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Select Gender">Select Gender</option>

                            <option value="male" @if($freelancer->gender == 'male') selected @endif>Male</option>
                            <option value="female" @if($freelancer->gender == 'female') selected @endif>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" id="address" cols="143" rows="5">{{$freelancer->address}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon</label>
                        <select name="salon_id" id="salon_id" class="form-control">
                            <option value="Select Salon ">Select Salon</option>
                            @foreach ($salons as $salon)
                            <option value="{{$salon->id}}" @if($salon->id == $freelancer->salon_id) selected @endif>{{$salon->salon_name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Freelancer Services</label>
                        <textarea name="services" id="services" cols="143" rows="5">{{$freelancer->services}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <input type="hidden" name="current_image" value="{{$freelancer->image}}">
                        <img src="{{asset('uploads/freelancers/'.$freelancer->image)}}" alt="" style="width: 100px; height: 100px;">
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
