@extends('admin.layouts.app')
@section('heading','Add Banner')
@section('title','Add Banner')
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
                  <h3 class="card-title">Add Banner <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/banner/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" id="name" placeholder="Enter Banner Tite">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Banner Head</label>
                        <input type="text" name="banner_head" class="form-control" id="banner_head" placeholder="Enter Banner Head">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Banner Sub-Heading</label>
                        <input type="text" name="banner_subhead" class="form-control" id="banner_subhead" placeholder="Enter Product Color">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Banner Description</label>
                        <textarea name="banner_description" id="description" cols="143" rows="10"></textarea>
                      </div>
                      {{-- <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <input type="hidden" name="old_image">
                      </div> --}}
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
