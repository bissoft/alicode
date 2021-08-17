@extends('admin.layouts.app')
@section('heading','View Categories')
@section('title','View Categories')
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
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Categories</h3>

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
                        Category Title
                    </th>
                    <th style="width: 30%">
                        Category Description
                    </th>

                    <th style="width: 20%">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>
                        {{$loop->index +1}}
                    </td>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        {{$category->description}}
                    </td>
                    {{-- class="project-actions text-right" --}}
                    <td >

                        <a class="btn btn-info btn-sm" href="{{url('/category/edit',$category->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <form id="delete-form-{{ $category->id }}" action="{{url('/category/delete',$category->id)}}" method="post"  style="display: none;">
                            @csrf()
                            @method('POST')
                          </form>
                          <a href="" onclick="if(confirm('Are you sure, you want to delete this?'))

                          {event.preventDefault(); document.getElementById('delete-form-{{$category->id}}').submit();}
                          else{
                            event.preventDefault();
                          }" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete </a>
                        {{-- <form id="delete-form-{{$category->id}}" action="{{url('/category/delete/'.$category->id)}}" method="post" style="display: none">
                            @csrf
                            @method('POST')

                        </form>
                        <a  class="btn btn-danger btn-sm" href="" onclick="if(confirm('Are You Sure , You Want to Delete This???'))
                            {
                                event.preventDefault(); document.getElementById('delet-form-{{$category->id}}').submit();
                            }
                            else{
                                event.preventDefault();
                            }">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a> --}}
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
