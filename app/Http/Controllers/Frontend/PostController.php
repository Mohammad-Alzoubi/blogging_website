<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('frontend.index', compact('posts'));
    }


    public function detailsPost($slug)
    {
        $post          = Post::where('slug', $slug)->first();
        $posts_most    = Post::select('slug', 'title')->where('user_id', $post->user_id)->where('id' , '!=', $post->id)->limit(5)->get();
        $posts_related = Post::where('id' , '!=', $post->id)->select('slug', 'title')->get()->random(5);
        return view('frontend.post_details', compact('post', 'posts_most', 'posts_related'));
    }
}
