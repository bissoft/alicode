@extends('admin.layouts.app')
@section('heading','Add Page')
@section('title','Add Page')
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
                  <h3 class="card-title">Add Page <small></small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" action="{{url('/page/add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Page Name</label>
                      <input type="text" name="page_name" class="form-control" id="page_name" placeholder="Enter Page Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Keyword</label>
                        <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Meta Keyword">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Meta Description</label>
                        <input type="text" name="meta_description" class="form-control" id="meta_description" placeholder="Enter Meta Description">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Sort Order</label>
                        <input type="text" name="sort_order" class="form-control" id="sort_order" placeholder="Enter Page Sort Order">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug" class="form-control" id="slug" placeholder="Enter Page Slug">
                      </div>
                      <div class="form-group">
                        <label for="image">Content Image</label>
                        <input type="file" name="content_image" class="form-control" id="image">
                        <input type="hidden" name="content_oldimage">
                      </div>
                      <div class="form-group">
                        <label for="image">Banner Image</label>
                        <input type="file" name="banner_image" class="form-control" id="image">
                        <input type="hidden" name="banner_oldimage">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Short Content</label>
                        <textarea type="text" cols="143" rows="10" name="short_content" class="form-control" id="slug" placeholder="Enter Short Content"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Long Content</label>
                        <textarea type="text" cols="143" rows="10" name="long_content" class="form-control" id="" placeholder="Enter Long Content"></textarea>
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
@section('scripts')
<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
@endsection
