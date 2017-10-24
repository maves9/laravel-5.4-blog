<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\post_reply;
use Illuminate\Http\Request;
use DB;
use Auth;

class CommentController extends Controller
{
    public function postReply(Request $request, $id)
    {
        $user = User::find($id);
        $post = Post::find($id);
       // return 'hi'. $request. $id;
        $post_reply = new post_reply();
        $post_reply->name = Auth::user()->name;
        $post_reply->email = Auth::user()->email;
        $post_reply->comment = $request->comment;
        $post_reply->approved = true;
        $post_reply->post()->associate($post);
        $post_reply->save();
        $post_replies = post_reply::all();

        return back()->withInput([$post_replies]);
    }
}
