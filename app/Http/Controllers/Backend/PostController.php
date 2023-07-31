<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware(['permission:post.all']);
//    }

    static $viewPath = 'backend.pages.article.post.';
    /**
     * Display a listing of the Posts.
     */
    public function index()
    {
        $posts = (new Post)->allPosts();
        return view(self::$viewPath . 'index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view(self::$viewPath . 'create');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
        ]);
        $data = $this->validateForm($request);
        $post = (new Post)->storePost($data);

        return redirect()->route('backend.post.index')->with('message', 'Post Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = (new Post)->findPost($id);

        if ($post->user_id == Auth::user()->id || Auth::user()->id == 1)
        {
            return view(self::$viewPath . 'edit', compact( 'post'));
        }else {
            abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->validateForm($request);
        $post = (new Post)->updatePost($request, $id);
        return redirect()->route('backend.post.index')->with('message', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $post = (new Post)->deletePost($request);
        return redirect()->route('backend.post.index')->with('message', 'Post Delete Successfully');
    }


    public function validateForm($request)
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required',
        ]);
    }



}

