<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        # EAGER LOADING [ WILL REDUCE QUERY AND TIME LOADING ]
        $posts = Post::with(['user', 'likes'])->latest()->paginate(20); // Collection
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
           'body' => 'required'
        ]);
        $request->user()->posts()->create([
            #'user_id' automatically assigned
            'body' => $request->body
        ]);

        return back();
    }

    public function delete(Post $post)
    {
        $this->authorize('delete');
        $post->delete();
        return back();
    }
}
