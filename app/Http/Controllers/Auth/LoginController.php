<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.auth.login");
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'userName' => 'required|string',
            'password' => 'required|min:8',
        ], [
            'userName.required' => 'User name is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }


        if (!Auth::attempt($req->only('userName', 'password'))) {
            return response()->json([
                'message' => 'Invalid user name or password'
            ], 401);
        }

        $req->session()->regenerate();

        return response()->json([
            'message' => 'Login successful',
            'redirect' => '/dashboard'
        ]);
    }
}
