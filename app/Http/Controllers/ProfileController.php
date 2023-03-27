<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = $this->userValidationCheck($request);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        User::where('id', Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess' => 'Admin Account Updated!']);
    }

    // direct change password page
    public function directPasswordChange()
    {
        return view('admin.profile.changePassword');
    }

    // change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
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
            'updated_at' => Carbon::now(),
        ];
    }

    // user validation check
    private function userValidationCheck($request)
    {
        return Validator::make($request->all(), [
            'adminName' => 'required',
            'adminEmail' => 'required',
        ], [
            'adminName.required' => 'Name is required!',
            'adminEmail.required' => 'Email is required!',
        ]);

    }

    // password validation check
    private function passwordValidationCheck($request)
    {
        return Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ])->validate();
    }
}
