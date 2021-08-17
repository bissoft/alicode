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
                <form role="form" id="quickForm" action="{{url('/freelancer/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Freelancer Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Freelancer Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Freelancer Phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Select Gender">Select Gender</option>

                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" id="address" cols="143" rows="5"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon</label>
                        <select name="salon_id" id="salon_id" class="form-control">
                            <option value="Select Salon ">Select Salon</option>
                            @foreach ($salons as $salon)
                            <option value="{{$salon->id}}">{{$salon->salon_name}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Freelancer Services</label>
                        <textarea name="services" id="services" cols="143" rows="5"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <input type="hidden" name="old_image">
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
