<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    // get all post list
    public function getAllPost()
    {
        $post = Post::get();

        return response()->json([
            'post' => $post,
        ]);
    }
}
