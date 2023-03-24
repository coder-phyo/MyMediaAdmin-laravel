<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // direct profile page
    public function index()
    {
        return view('admin.profile.index');
    }
}
