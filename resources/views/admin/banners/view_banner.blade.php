@extends('admin.layouts.app')
@section('heading','View Banners')
@section('title','View Banners')
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
        <h3 class="card-title">View Banners</h3>

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
                        Sr.No:
                    </th>
                    <th style="width: 20%">
                        Banner Title
                    </th>
                    <th style="width: 30%">
                        Banner Head
                    </th>
                    <th style="width: 30%">
                        Banner Sub Head
                    </th>
                    {{-- <th style="width: 30%">
                        Product Image
                    </th>
                    <th style="width: 30%">

                    </th>
                    <th style="width: 30%">
                        Product Price
                    </th> --}}
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                <tr>
                    <td>
                        {{$loop->index +1}}
                    </td>
                    <td>
                        {{$banner->title}}
                    </td>
                    <td>
                        {{$banner->head}}
                    </td>
                    <td>
                        {{$banner->sub_head}}
                    </td>
                    {{-- <td>
                        <img src="{{asset('uploads/products/'.$product->image)}}" style="height: 100px; width: 100px;" alt="">
                    </td> --}}
                    {{-- <td>

                            <input type="checkbox" class="ProductStatus btn btn-success" rel="{{$product->id}}"
                            data-toggle="toggle" data-on="Active" data-off = "InActive" data-onstyle="success"
                            data-offstyle="danger" @if ($product['status']=='1') checked  @endif >
                        <div id="myElem" style="display: none"; class="alert alert-success">Status Enabled</div>

                    </td> --}}
                    {{-- <td>
                        {{$product->price}}
                    </td> --}}
                    <td >

                        <a class="btn btn-info btn-sm" href="{{url('/banner/edit',$banner->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        {{-- <a class="btn btn-success btn-sm" href="{{url('/product/attributes',$product->id)}}">
                            <i class="fas fa-list-alt">
                            </i>
                            Product Attributes
                        </a> --}}
                        {{-- <a class="btn btn- btn-sm" href="{{url('/product/add-images',$product->id)}}">
                            <i class="fas fa-list-alt">
                            </i>
                            Product Images
                        </a> --}}
                        <form id="delete-form-{{ $banner->id }}" action="{{url('/banner/delete',$banner->id)}}" method="post"  style="display: none;">
                            @csrf()
                            @method('POST')
                          </form>
                          <a href="" onclick="if(confirm('Are you sure, you want to delete this?'))

                          {event.preventDefault(); document.getElementById('delete-form-{{$banner->id}}').submit();}
                          else{
                            event.preventDefault();
                          }" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete </a>

                    </td>
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
