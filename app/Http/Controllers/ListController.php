<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class ListController extends Controller
{
    // direct admin list page
    public function index()
    {
        $userData = User::select('id', 'name', 'email', 'phone', 'address', 'gender')->get();
        return view('admin.list.index', compact('userData'));
    }

    // delete account
    public function deleteAccount($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'User Account Deleted!']);
    }
}
