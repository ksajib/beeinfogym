<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view("pages.auth.register");
    }

    public function store(Request $req)
    {
        $validate = Validator::make($req->all(), [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:8",
            "phone" => "required|string|min:11|max:14|unique:users,phone",
            "userName" => "required|string|unique:users,userName",
        ], [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Email is required to continue.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password cannot be empty.',
            'password.min' => 'Password must be at least 8 characters.',
            'phone.required' => 'Phone number is required.',
            'phone.min' => 'Phone number must be at least 11 digits.',
            'phone.max' => 'Phone number cannot exceed 14 digits.',
            'phone.unique' => 'This number is already taken.',
            'userName.required' => 'Username is required.',
            'userName.unique' => 'This username is already taken. Please choose another one.',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'errors' => $validate->errors()
            ], 422);
        }

        DB::beginTransaction();

        try {

            // Create User
            $user = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'userName' => $req->userName, // PostgreSQL-safe column name
                'password' => Hash::make($req->password),
            ]);

            // Create Profile
            Profile::create([
                'user_id' => $user->id,
                'first_name' => $user->name,
                'email' => $user->email,
                'primary_mobile' => $user->phone,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'User created successfully',
                'redirect' => '/login'
            ], 200);
        } catch (\Throwable $th) {

            DB::rollBack();

            return response()->json([
                'message' => $th->getMessage()
            ], 500);
        }
    }
}