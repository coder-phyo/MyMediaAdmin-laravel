<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    // get all category list
    public function getAllCategory()
    {
        $category = Category::get();

        return response()->json([
            'category' => $category,
        ]);
    }
}
