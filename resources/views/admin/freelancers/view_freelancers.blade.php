@extends('admin.layouts.app')
@section('heading','View Freelancers')
@section('title','View Freelancers')
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
        <h3 class="card-title">View Products</h3>

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
                        Name
                    </th>
                    <th style="width: 30%">
                        Email
                    </th>
                    <th style="width: 30%">
                        Phone
                    </th>
                    <th style="width: 30%">
                        Salone
                    </th>
                    <th style="width: 30%">
                        Image
                    </th>
                    <th style="width: 30%">
                         Status
                    </th>
                    <th style="width: 30%">
                         Services
                    </th>
                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($freelancers as $freelancer)
                <tr>
                    <td>
                        {{$loop->index +1}}
                    </td>
                    <td>
                        {{$freelancer->name}}
                    </td>
                    <td>
                        {{$freelancer->email}}
                    </td>
                    <td>
                        {{$freelancer->phone}}
                    </td>
                    <td>
                        {{$freelancer->salon->salon_name}}
                    </td>
                    <td>
                        <img src="{{asset('uploads/freelancers/'.$freelancer->image)}}" style="height: 100px; width: 100px;" alt="">
                    </td>
                    <td>

                            <input type="checkbox" class="FreelancerStatus btn btn-success" rel="{{$freelancer->id}}"
                            data-toggle="toggle" data-on="Active" data-off = "InActive" data-onstyle="success"
                            data-offstyle="danger" @if ($freelancer['status']=='1') checked  @endif >
                        <div id="myElem" style="display: none"; class="alert alert-success">Status Enabled</div>

                    </td>
                    <td>
                        {{$freelancer->services}}
                    </td>
                    <td>

                        <a class="btn btn-info btn-sm" href="{{url('/freelancer/edit',$freelancer->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        {{-- <a class="btn btn-success btn-sm" href="{{url('/product/attributes',$product->id)}}">
                            <i class="fas fa-list-alt">
                            </i>
                            Product Attributes
                        </a> --}}
                        <form id="delete-form-{{ $freelancer->id }}" action="{{url('/freelancer/delete',$freelancer->id)}}" method="post"  style="display: none;">
                            @csrf()
                            @method('POST')
                          </form>
                          <a href="" onclick="if(confirm('Are you sure, you want to delete this?'))

                          {event.preventDefault(); document.getElementById('delete-form-{{$freelancer->id}}').submit();}
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

        $('.FreelancerStatus').change(function(){
           var id =  $(this).attr('rel');
           if($(this).prop("checked")==true)
            {
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN' : $('meta[name= "csrf-token"]').attr('content')
                },
                type : 'post',
                url : '/freelancer/status',
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
                url : '/freelancer/status',
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
