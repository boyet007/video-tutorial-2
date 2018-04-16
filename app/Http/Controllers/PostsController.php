<?php

namespace App\Http\Controllers;


 
use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);


    }

    public function index(){

    	//$posts = Post::all();

    	$posts = Post::latest()->get(); //cari post paling terakhir diupdate

        if ($month = request('month')){

            $posts->whereMonth('created_at', Carbon::parse($month)->month); //March => 3,May => 5

        }


        if ($year = request('year')){

            $posts->whereMonth('created_at', $year);

        }

        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month,count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

            //return $archives;


    	return view('posts.index', compact('posts', 'archives'));

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

        auth()->user()->publish(

            new Post(request(['title', 'body']))
        );

    	//Post::create([

    	//	'title' => request('title'),

    	//	'body' => request('body'),

          //  'user_id' => auth()->id()


    	//]);


        //Post::create(request(['title', 'body', 'user_id']));

    	return redirect('/');

    }
}
