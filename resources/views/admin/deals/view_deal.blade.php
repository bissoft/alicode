@extends('admin.layouts.app')
@section('heading','View Deals')
@section('title','View Deals')
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
        <h3 class="card-title">View Deals</h3>

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
                        Deal Title
                    </th>
                    <th style="width: 30%">
                        Category
                    </th>
                    <th style="width: 30%">
                        Salon
                    </th>
                    <th style="width: 30%">
                        Start date
                    </th>
                    <th style="width: 30%">
                        End Date
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Deal Cost
                    </th>

                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deals as $deal)
                <tr>
                    <td>
                        {{$loop->index +1}}
                    </td>
                    <td>
                        {{$deal->title}}
                    </td>
                    <td>
                        {{$deal->category->title}}
                    </td>
                    <td>
                        {{$deal->salon->salon_name}}
                    </td>
                    <td>
                        {{$deal->start_date}}
                    </td>
                    <td>
                        {{$deal->end_date}}
                    </td>

                    <td>
                        <img src="{{asset('uploads/deals/'.$deal->image)}}" style="height: 100px; width: 100px;" alt="">
                    </td>

                    <td>
                        {{$deal->deal_cost}}
                    </td>
                    <td >

                        <a class="btn btn-info btn-sm" href="{{url('/deal/edit',$deal->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form id="delete-form-{{ $deal->id }}" action="{{url('/deal/delete',$deal->id)}}" method="post"  style="display: none;">
                            @csrf()
                            @method('POST')
                          </form>
                          <a href="" onclick="if(confirm('Are you sure, you want to delete this?'))

                          {event.preventDefault(); document.getElementById('delete-form-{{$deal->id}}').submit();}
                          else{
                            event.preventDefault();
                          }" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>

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
