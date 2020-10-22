<?php

namespace App\Http\Controllers;
use App\Post;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
class Postscontroller extends Controller
{

    public function index(){
    	$posts=Post::paginate(8);
      $postes=Post::orderBy('created_at','Desc')->paginate(6);
    	return view('posts.index',compact('posts','postes'));
    }
    public function show($slug){
    	$post=Post::where('slug',$slug)->firstOrFail();
    	$author=$post->user_id;
    	$comments=$post->comments;
    	return view('posts.show',compact('post','author','comments'));
    }
    public function admin(){
    	$posts=Post::all();
    	return view('posts.admin',compact('posts'));
    }
    public function edit($id){
    	$posts=Post::find($id);
        if($posts){                                
    	return view('posts.edit',compact('posts'));
         }
         else{
            return view('posts.create');
         }
    }
    public function delete($id){
    	$posts=Post::find($id);
    	$posts->delete();
        return redirect()->route('posts.admin');
    }
      public function create() {
        return view('posts.create');
    }
     public function store(Request $request) {
         $post = new Post();
          $post->name=$request->name;
          $post->content=$request->content;
          $post->user_id=Auth::id();
          $post->slug=$request->name;
        $post->save();
        return redirect()->route('posts.create');
          // var_dump($post->user_id);
    }

    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $post->update($request->all());
        return redirect()->route('posts.admin');
            }
}
