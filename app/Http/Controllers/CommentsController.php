<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Profile;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function create(Request $request) {
        $comment = Comment::create();
        $comment->text = $request['text'];
        $comment->userToken = $request['userToken'];
        $comment->postId = $request['postId'];
        $comment->save();
        $author = Profile::firstWhere('token', $comment->userToken);
        $comment->author = $author->username.'#'.(string)$author->id;
        $comment->date = $comment->created_at->format('H:i d.m.Y');
        return response()->json($comment);
    }

    public function get(Request $request, $postId) {
        $comments = Comment::where("postId", '=', $postId)->orderBy('created_at', 'desc')->get();
        foreach($comments as &$comment) {
            $author = Profile::firstWhere('token', $comment->userToken);
            $comment->author = $author->username.'#'.(string)$author->id;
            $comment->date = $comment->created_at->format('H:i d.m.Y');
        }
        return response()->json($comments);
    }
}
