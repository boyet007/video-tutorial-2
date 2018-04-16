<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // $comment->post

    public function post(){

		//return $this->belongsTo('App\Post', 'post_id', 'id');

		return $this->belongsTo(Post::class);

    }

    //protected $fillable = ['body'];

    public function user(){ // $comment->user->name

		//return $this->belongsTo('App\Post', 'post_id', 'id');

		return $this->belongsTo(User::class);

    }

    
}
