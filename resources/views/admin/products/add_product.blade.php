@extends('admin.layouts.app')
@section('heading','Add Product')
@section('title','Add Product')
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
                  <h3 class="card-title">Add Product <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/product/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Code</label>
                        <input type="text" name="product_code" class="form-control" id="product_code" placeholder="Enter Product Code">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Color</label>
                        <input type="text" name="product_color" class="form-control" id="product_color" placeholder="Enter Product Color">
                      </div>
                      <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control select2" name="category_id" style="width: 100%;">
                            <option selected="selected">Select Category</option>
                          {{-- <option selected="selected">Alabama</option> --}}
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Description</label>
                        <textarea name="description" id="description" cols="143" rows="10"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <input type="hidden" name="old_image">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product Price</label>
                        <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter Product Color">
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
