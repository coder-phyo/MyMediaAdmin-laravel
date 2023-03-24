<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // direct post page
    public function index()
    {
        return view('admin.post.index');
    }
}
