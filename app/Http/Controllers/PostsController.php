<?php

namespace App\Http\Controllers;


 
use Illuminate\Http\Request;

use App\Post;

class PostsController extends Controller
{
    public function index(){

    	//$posts = Post::all();

    	$posts = Post::latest()->get(); //cari post paling terakhir diupdate

    	return view('posts.index', compact('posts'));

    }

    //public function show($id){

    public function show(Post $post){
    //$post samakan dari variable di route


    	//$post = Post::find($id);

    	return view('posts.show', compact('post'));

    }

    public function create(){

    	return view('posts.create');

    }

    public function store(){

        $this->validate(request(), [

        	'title' => 'required', 

        	'body' => 'required'

        ]);

    	//dd(request()->all());

    	//$post = new Post;

    	//$post->title = request('title');

    	//$post->body = request('body');

    	//$post->save();

    	Post::create([

    		'title' => request('title'),

    		'body' => request('body')

    	]);

    	return redirect('/');

    }
}
