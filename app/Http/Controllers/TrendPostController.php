<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;

class TrendPostController extends Controller
{
    // direct trend post page
    public function index()
    {
        $post = ActionLog::select('action_logs.*', 'posts.*')
            ->leftJoin('posts', 'action_logs.post_id', 'posts.post_id')
            ->paginate(5);

        return view('admin.trend_post.index', compact('post'));
    }
}
