<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function create(Request $request) {
        $like = Like::where('postId', $request['postId'])->where('userToken', $request['userToken']);
        if ($like->exists()) {
            $like->delete();
        }
        else {
            $like = Like::create();
            $like->postId = $request['postId'];
            $like->userToken = $request['userToken'];
            $like->save();
        }
        $likesCount = Like::where("postId", '=', $request['postId'])->count();
        return response()->json($likesCount);
    }
}
