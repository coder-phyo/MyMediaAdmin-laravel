<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TrendPostController extends Controller
{
    // direct trend post page
    public function index()
    {
        return view('admin.trend_post.index');
    }
}
