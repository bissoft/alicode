@extends('admin.layouts.app')
@section('heading','Add Salon')
@section('title','Add Salon')
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
                  <h3 class="card-title">Add Salon <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/salon/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Owner Name</label>
                      <input type="text" name="owner_name" class="form-control" id="owner_name" placeholder="Enter Owner Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Owner Email</label>
                        <input type="text" name="owner_email" class="form-control" id="owner_email" placeholder="Enter Owner Email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Owner Phone</label>
                        <input type="text" name="owner_phone" class="form-control" id="owner_phone" placeholder="Enter Owner Phone">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon Name</label>
                        <input type="text" name="salon_name" class="form-control" id="salon_name" placeholder="Enter Salon Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon Address</label>
                        <textarea name="salon_address" id="salon_address" cols="143" rows="10"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon Type</label>
                        <select name="salon_type" id="salon_type" class="form-control">
                            <option value="Select Salon Type">Select Salon type</option>
                            @foreach (App\Generic::$salonTypes as $type)
                            <option value="{{$type}}">{{$type}}</option>
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Salon Description</label>
                        <textarea name="salon_description" id="salon_description" cols="143" rows="10"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Salon Image</label>
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
