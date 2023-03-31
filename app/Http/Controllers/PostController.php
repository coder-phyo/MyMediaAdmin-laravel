<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // direct post list page
    public function index()
    {
        $category = Category::get();
        return view('admin.post.index', compact('category'));
    }

    // creat post
    public function createPost(Request $request)
    {
        $this->postValidationCheck($request);
        dd('ok');
    }

    // post validation check
    private function postValidationCheck($request)
    {
        return Validator::make($request->all(), [
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postCategory' => 'required',
        ])->validate();
    }
}
