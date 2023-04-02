<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // direct post list page
    public function index()
    {
        $category = Category::get();
        $post = Post::get();
        return view('admin.post.index', compact('category', 'post'));
    }

    // creat post
    public function createPost(Request $request)
    {
        $this->postValidationCheck($request);
        $data = $this->getPostData($request);

        if ($request->hasFile('postImage')) {
            $file = $request->file('postImage');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/postImage', $fileName);
            $data['image'] = $fileName;
        }

        Post::create($data);
        return back();
    }

    // delete post
    public function deletePost($id)
    {
        $dbImage = Post::where('post_id', $id)->first();
        $dbImage = $dbImage->image;

        if ($dbImage !== null) {
            Storage::delete('public/postImage/' . $dbImage);
        }
        Post::where('post_id', $id)->delete();
        return back();
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

    // get post data
    private function getPostData($request)
    {
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'category_id' => $request->postCategory,
        ];
    }
}
