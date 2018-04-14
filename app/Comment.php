<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // $comment->post

    public function post(){

		//return $this->belongsTo('App\Post', 'post_id', 'id');

		return $this->belongsTo(Post::class);

    }

    
}
