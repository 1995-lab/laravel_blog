<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function admin(){
    	$users=User::all();
    	return view('users.admin',compact('users'));
    }
    public function delete($id){
    	$user=User::find($id);
    	$user->delete();
    	return redirect()->route('users.admin');

    }
     public function permission($id){
    	$user=User::find($id);
    	if($user->is_admin){
    		$user->is_admin=0;
    		$user->save();
    	}
    	else{
    		$user->is_admin=1;
    		$user->save();
    	}
    	return redirect()->route('users.admin');
    }
   public function create() {
        return view('users.create');
    }
     public function store(Request $request) {
         $post = new Post();
          $post->name=$request->name;
          $post->content=$request->content;
          $post->user_id=Auth::id();
          $post->slug=$request->name;
        $post->save();
        return redirect()->route('users.create');
          // var_dump($post->user_id);
    }

}
