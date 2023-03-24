<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // direct category page
    public function index()
    {
        return view('admin.category.index');
    }
}
