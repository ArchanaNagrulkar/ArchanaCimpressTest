@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="panel-heading"> <b>Blogs </b>
                 @if($UserId)
                <a href="{{route('blogs.create')}}" class="btn btn-primary" style="margin-left:550px; margin-bottom: 10px;" >Create New Blog</a>
                @endif 
            </div>     
                 
              <div class="panel-body">
                <div class="row">
                        <table class="table table-hover table-border">  
                         <tr><th>No</th><th>Title</th><th>Post</th><th>Author</th><th>Edit</th><th>Show</th></tr>
                           @if($blogs)
                           @foreach($blogs as $k=>$v)
                            <tr><td>{{$v->id}}</td><td>{{$v->title}}</td><td>{{$v->post}}</td><td>{{$v->AuthorName}}</td><td>
                                @if($v->user_id == $UserId || $role==1)
                                    <a href="{{route('blogs.edit',$v->id)}}" class="btn btn-sm btn-success">Edit</a>
                                @else
                                  --
                                @endif
                               </td>
                               <td><a href="{{route('blogs.show',$v->id)}}" class="btn btn-sm btn-info">Show</a></td></tr>
                            @endforeach
                            @endif
                       </table>
                    {{ $blogs->links() }}
               </div>
           </div>
        </div>
    </div>
</div>
@endsection