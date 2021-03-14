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
        return view('posts.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
           'body' => 'required'
        ]);
        $request->user()->posts()->create([
            #'user_id' automatically assigned
            'body' => $request->body
        ]);

        return view('posts.index');
    }
}
