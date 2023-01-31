<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(Request $request) {
        $post = Post::create();
        $post->title = $request['title'];
        $post->text = $request['text'];
        $post->userToken = $request['userToken'];
        $post->imageUrl = $request['imageUrl'];
        $post->save();
        return response()->json($post);
    }

    public function get(Request $request, $id) {
        $post = Post::findOrFail($id);
        $author = Profile::firstWhere('token', $post->userToken);
        $post->author = $author->username.'#'.(string)$author->id;
        $post->date = $post->created_at->format('H:i d.m.Y');
        $post->likes = Like::where("postId", '=', $id)->count();
        return response()->json($post);
    }

    public function getAll() {
        $posts = Post::orderBy('created_at', 'desc')->get();
        foreach ($posts as &$post) {
            $author = Profile::firstWhere('token', $post->userToken);
            $post->author = $author->username.'#'.(string)$author->id;
            $post->date = $post->created_at->format('H:i d.m.Y');
        }
        return response()->json($posts);
    }
}
