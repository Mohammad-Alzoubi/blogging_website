<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        dd('index');
        $posts = (new Post)->allPosts();
        return view('backend.index', compact('posts'));
    }
}
