<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $guarded= [
        'id', 'created_at',
    ];
    //ce que j'avais éffacer public static function boot($post){
    public static function boot(){
	parent::boot();
	self::created(function($post){
		$post->counts_comments=0;
	});
	self::deleted(function($post){
		$comments=$post->comments;
		foreach ($comments as $comment) {
			$comment->delete();
		}
	});
	return true;
}

     public function user(){
    	return $this->belongsTo('App\User');
    }
     public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
