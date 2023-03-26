<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // direct profile page
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::select('name', 'email', 'phone', 'address', 'gender')->where('id', $id)->first();
        return view('admin.profile.index', compact('user'));
    }
}
