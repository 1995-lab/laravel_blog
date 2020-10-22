<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
// use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
	public function admin(){
		$comments=Comment::all();
		return view('comments.admin',compact('comments'));
	}
	public function delete($id){
		$comment=Comment::find($id);
		$comment->delete();
		return redirect()->route('comments.admin');
	}
    public function create(Request $request,$id){
         // $this->validate($request, array(
         //        'content'=> 'required'
         //    ));
         // $post = Post::find($id);
         //  $comments = new Comment();
         //  $comments->user_id = Auth::id();
         //  $comments->post_id = $post->id;
         //  $comments->content = $request->content;
          // $comments->post()->associate($post);
          // $comments->save();
        $comments = new Comment();
          $post = Post::find($id);
          $comments->user_id=Auth::id();
          $comments->post_id=$post->id;
          $comments->content=$request->input('content');
        $comments->save();
        return redirect()->back();

          // dd($comments->content);






// originale
        // $comments = new Comment();
        //   $post = Post::find($id);
        //   $comments->user_id=Auth::id();
        //   $comments->post_id=$post->id;
        //   $comments->content='tres bon';
        // $comments->save();
        // return redirect()->route('comments.admin');
     
    }
}
