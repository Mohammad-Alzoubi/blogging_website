<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'description', 'seo_desc'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function allPosts()
    {

        if (auth()->user()->id == 1){
            return Post::latest()->get();
        } else {
            return Post::where('user_id', '=', auth()->user()->id)->latest()->get();
        }
    }


    public function storePost($data)
    {
        Post::create([
            'user_id'     => auth()->user()->id,
            'title'       => $data['title'],
            'slug'        => make_slug($data['title']),
            'description' => $data['description'],
        ]);
        return true;
    }

    public function findPost($id)
    {
        $post = Post::find($id);
        return $post === null ? abort(404) : $post;
    }

    public function updatePost($request, $id)
    {
        $post = Post::find($id);
        $post->title       =  $request->title;
        $post->slug        =  make_slug($request->title);
        $post->description =  $request->description;
        $post->save();
        return $post;
    }

    public function deletePost($request)
    {
        return Post::find($request->id_post)->delete();
    }





}
