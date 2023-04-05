<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // get all category list
    public function getAllCategory()
    {
        $category = Category::select('category_id', 'title', 'description')->get();

        return response()->json([
            'category' => $category,
        ]);
    }

    // search category
    public function postSearch(Request $request)
    {
        $post = Post::where('title', 'like', '%' . $request->key . '%')->get();
        return response()->json([
            'searchValue' => $post,
        ]);
    }
}
