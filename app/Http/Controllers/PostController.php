<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller {
    public function getDashboard() {
        $posts = POST::orderBy('created_at', 'desc')->get();
        return view('dashboard' , ['posts' => $posts]);
    }
    public function postCreatePost(Request $request) {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $message = "there was an error";
        $post= new Post();
        $post->body = $request['body'];
        if($request->user()->posts()->save($post)) {
            $message = "Post created with succes!";
        }
        return redirect()->route('dashboard')->with(['message' => $message]);

    }

    public function getDeletePost($post_id) {
        $post = Post::where('id', $post_id)->first();
        if(Auth::user() != $post->user) {
                return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Post delted succefuly']);
    }

    public function postEditPost(Request $request) {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = POST::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['message' => 'Post edited succefuly!'], 200);
    }
}