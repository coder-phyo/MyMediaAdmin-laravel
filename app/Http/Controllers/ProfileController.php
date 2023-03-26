<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

    // admin account update
    public function adminAccountUpdate(Request $request)
    {
        $userData = $this->getUserData($request);

        User::where('id', Auth::user()->id)->update($userData);
        return back();
    }

    // get user data
    private function getUserData($request)
    {
        return [
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'phone' => $request->adminPhone,
            'address' => $request->adminAddress,
            'gender' => $request->adminGender,
        ];
    }
}
