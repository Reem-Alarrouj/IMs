<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use Auth;
use App\Post;
use App\Notifications\NewComment;
use Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
       {

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();

        $post = Post::where('id', $request->post_id)->first();
        $user = $post->user;
        $user->notify(new NewComment($comment));

        if ($request->ajax()) {
            $comment->user_id = $comment->user->name;
            return Response::json($comment);
        }else {
            return redirect(route('posts.show', $comment->post_id));
        }
    
   }


}
