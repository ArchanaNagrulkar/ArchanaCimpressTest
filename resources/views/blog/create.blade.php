@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Blog 
                 <a href="{{route('blogs')}}" class="btn btn-primary" style="margin-left:400px;" >View All Blogs</a>
               
                    </div>
                           @if($errors->any())
                            <div class="alert alert-danger">
                             <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </div>
                            @endif

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                    <b> Blog Successfully Created !!</b>
                            </div>
                            @endif
                            @if(Session::has('fails'))
                            <div class="alert alert-danger">
                            <b> Blog Creation failed !!</b>
                            </div>
                            @endif
              <div class="panel-body">
                        <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{route('blogs.save')}}">
                        {{ csrf_field() }}
                   <div class="form-group row">
                        <lable for="title" class="col-md-4 col-form-label text-md-right">Title</lable>
                         <div class="col-md-6">
                        <input class="form-control" type="text" name="title" value="" placeholder="Enter Title">
                    </div>
                     </div>
                    <div class="form-group row">
                        <lable for="post" class="col-md-4 col-form-label text-md-right">Post</lable>
                         <div class="col-md-6">
                        <textarea   class="form-control"  name="posts"  placeholder="Enter Post Details"> </textarea>
                    </div>
                    
                   </div>
                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                       <input type="submit" class="btn btn-success">
                    
                   </div>
                     </div>
                    <div></div>
                </form>

            </div>
           </div>
        </div>
    </div>
</div>
</div>
@endsection