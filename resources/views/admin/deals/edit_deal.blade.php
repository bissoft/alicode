@extends('admin.layouts.app')
@section('heading','Edit Deal')
@section('title','Edit Deal')
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
                  <h3 class="card-title">Edit Deal <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/deal/edit/'.$deal->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title</label>
                      <input type="text" name="title" class="form-control" id="title" value="{{$deal->title}}" placeholder="Enter Deal Title">
                    </div>
                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control select2" name="category_id" style="width: 100%;">
                            <option selected="selected">Select Category</option>
                          {{-- <option selected="selected">Alabama</option> --}}
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}" @if ($deal->category_id == $category->id) selected @endif>{{$category->title}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Select Salon</label>
                        <select class="form-control select2" name="salon_id" style="width: 100%;">
                            <option selected="selected">Select Salon</option>
                          {{-- <option selected="selected">Alabama</option> --}}
                          @foreach ($salons as $salon)
                          <option value="{{$salon->id}}" @if($deal->salon_id == $salon->id) selected @endif>{{$salon->salon_name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" name="start_date" value="{{$deal->start_date}}" class="form-control" id="start_date" placeholder="Enter Start Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" name="end_date" class="form-control" id="end_date" value="{{$deal->end_date}}" placeholder="Enter End Date">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="{{$deal->start_time}}" id="start_time" placeholder="Enter Start Time">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">End Time</label>
                        <input type="time" name="end_time" class="form-control" id="end_time" value="{{$deal->end_time}}" placeholder="Enter End Time">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Deal Description</label>
                        <textarea name="description" id="description" cols="143" rows="10">{{$deal->deal_description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="image">Deal Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                        <input type="hidden" name="current_image" value="{{$deal->image}}">
                        <img src="{{asset('uploads/deals/'.$deal->image)}}" alt="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Deal Cost</label>
                        <input type="text" name="deal_cost" class="form-control" value="{{$deal->deal_cost}}" id="deal_cost" placeholder="Enter Deal Cost">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" id="address" cols="143" rows="10">{{$deal->address}}</textarea>
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
