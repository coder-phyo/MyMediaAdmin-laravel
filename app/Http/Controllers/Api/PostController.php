<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // get all post list
    public function getAllPost()
    {
        $post = Post::get();

        return response()->json([
            'status' => 'success',
            'post' => $post,
        ]);
    }

    // post search
    public function postSearch(Request $request)
    {
        $post = Post::where('title', 'like', '%' . $request->key . '%')->get();
        return response()->json([
            'searchValue' => $post,
        ]);
    }

    // post details
    public function postDetails(Request $request)
    {
        $post = Post::where('post_id', $request->postId)->first();

        return response()->json([
            'post' => $post,
        ]);
    }
}
