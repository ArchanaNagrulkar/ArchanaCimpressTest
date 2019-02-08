<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Blog;
use redirect;
use Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserId='';
        $role='';
        if(Auth::User()){
          $UserId=Auth::User()->id;
          $role=Auth::User()->role;
        }


        $blogs=Blog::join('users','blogs.user_id','=','users.id')->select('blogs.id','blogs.title','blogs.post','users.name AS AuthorName','blogs.user_id')->paginate(5);

       return view('blog.list',compact('blogs','UserId','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog= new Blog();
        $data=$request->all();
        $validator = Validator::make($data,[
        'title' => 'required|max:255',
        'posts' => 'required',
             ]);
        if($validator->fails()){
               return redirect()->route('blogs.create')->withErrors($validator);
        }
        else{

           $Success= $blog->saveRecords($data);
           if($Success){
                 return redirect()->route('blogs.create')->with('success','created');
           }else{
                 return redirect()->route('blogs.create')->with('fails','created');
           }
        }


       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog=Blog::find($id);
        return view('blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Blog::find($id);
        return view('blog.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog= new Blog();
        $data=$request->all();
        $validator = Validator::make($data,[
        'title' => 'required|max:255',
        'posts' => 'required',
             ]);
        if($validator->fails()){
               return redirect()->route('blogs.edit',$id)->withErrors($validator);
        }
        else{

           $Success= $blog->saveRecords($data,$id);
           if($Success){
                 return redirect()->route('blogs.edit',$id)->with('success','created');
           }else{
                 return redirect()->route('blogs.edit',$id)->with('fails','created');
           }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
