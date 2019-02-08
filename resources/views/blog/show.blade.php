@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
 <div class="card">
            <div class="card-header">Blog Details

                <a href="{{route('blogs')}}" class="btn btn-primary" style="margin-left:400px;" >View All Blogs</a>
                
            </div>
            <div class="panel-body">
                <div class="card-body">
                <div class="col-md-8">
                   <p><strong>Title </strong>: {{$blog->title}}</p>
                    </div>
                    <div class="col-md-8">
                   <p><strong>Post Info </strong>: {{$blog->post}}</p>
               </div>
               <div class="col-md-8">
                   <p><strong>Author </strong>: {{$blog->Author->name}}</p>
               </div>
               <div class="col-md-8">
                   <p><strong>Created At </strong>: {{date('d-M-Y H:i:s',strtotime($blog->created_at))}}</p>
               </div>
                             
           
           </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection