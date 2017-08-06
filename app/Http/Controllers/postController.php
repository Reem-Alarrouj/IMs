<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Auth;
use App\tag;
class PostController extends Controller
{

   public function index()
   {
    $posts = Post::all();
    
      return view('posts.index', ['posts' => $posts]);
   }
   public function create()
   {
    $tags=tag::all();


    return view('posts.create', ['tags'=>$tags]);
   }
  public function show($id){

        $post = Post::where('id', '=', $id)->first();
        $tags = $post->tags;
    return view('posts.show', ['post'=> $post, 'tags' => $tags]);

   }
   public function store(Request $request)
   {

      $post = new Post();
      $post->title = $request->title;
      $post->text = $request->text;
      $post->user_id = Auth::user()->id;
      $post->status = 'new';
      $post->save();

      $post->tags()->attach($request->tags);

      return redirect(route('posts.show', $post->id));
    
   }


    public function edit($id)
    {
        $post = Post::where('id', '=', $id)->first();

        return view('posts.edit', ['post'=> $post]);
   }

   public function update(Request $request)
   {

      $post = Post::where('id', '=', $request->post_id)->first();
      $post->title = $request->title;
      $post->text = $request->text;
      $post->save();

      return redirect()->route('posts.show', $post->id);
   }

   public function destroy(Request $request)
   {

      $post = Post::where('id', '=', $request->post_id)->first();
      $post->delete();

            return redirect(route('posts.index'));


   }

}