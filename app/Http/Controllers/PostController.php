<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=DB::table('users')
        ->join('posts','users.id',"=","posts.user_id")
        ->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post=new Post();
        if ($request->hasFile('image')) {
            $extension = $request->image->extension();
           
            $size = $request->image->getSize();
            $allowed_size=1000000;
            $allowed_extensions=array('jpg','png','jpeg');
            if(in_array($extension,$allowed_extensions)){
                if($size<$allowed_size){
                    $title=$request->title;
                    $content=$request->content;
                    $new_file=$request->file('image');
                    $image_path=$new_file->store('public/images');
                    $user_id=Auth::user()->id;

                    Post::create([
                        'title'=>$title,
                        'content'=>$content,
                        'image_path'=>$image_path,
                        'user_id'=>$user_id
                    ]);
                    return redirect()->route('admin.posts.index');

                }else{
                    return redirect()->route('admin.posts.create')->with('image','please select an image below 1 MB');
                }

            }else{
                return redirect()->route('admin.posts.create')->with('image','please a jpj, png or jpeg image format');
            }            
        }else{
            return redirect()->route('admin.posts.create')->with('image','please select a file');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post=Post::find($id);
        return view('admin.posts.edit',compact('post'));
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
        //
        $post=Post::find($id);
        $post->title=$request->title;
        $post->content=$request->content;
        $post->save();
        return redirect()->route('admin.posts.index');
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
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }



    ############START OF ADMIN FUNCTION###################
    function list(){
        $posts=DB::table('users')
        ->join('posts','users.id',"=","posts.user_id")
        ->get();
        return view('index',compact('posts'));
    }


    public function singlePost($id){
        $post=DB::table('users')
        ->join('posts','users.id',"=","posts.user_id")
        ->where('posts.id',$id)
        ->first();
        return view('single-post',compact('post'));
    }
}
