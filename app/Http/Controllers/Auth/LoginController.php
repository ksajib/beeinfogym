<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class LoginController extends Controller
{
    public function index()
    {
        return view("pages.auth.login");
    }

    public function store(Request $req)
    {
        try {

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
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // 🔐 Attempt login
            if (!Auth::attempt($req->only('userName', 'password'))) {
                return response()->json([
                    'message' => 'Invalid user name or password'
                ], 401);
            }

            // 🔁 Regenerate session (security)
            $req->session()->regenerate();

            $user = Auth::user();

            // 🎯 Role-based redirect
            $redirect = match ($user->userType) {
                'admin' => '/admin/dashboard',
                default => '/user/dashboard',
            };

            return response()->json([
                'message' => 'Login successful',
                'redirect' => $redirect,
                'user' => $user
            ]);
        } catch (Throwable $e) {

            return response()->json([
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}