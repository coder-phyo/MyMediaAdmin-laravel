<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    // direct admin list page
    public function index()
    {
        return view('admin.list.index');
    }
}
